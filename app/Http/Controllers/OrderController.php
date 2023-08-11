<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->paginate();

        return view('order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::where('user_id', Auth::id())->where('id', $id)->firstOrFail();

        return view('order.show', compact('order'));
    }

    public function cancel(Request $request, $id)
    {
        $order = Order::where('user_id', Auth::id())->where('id', $id)->firstOrFail();

        if ($order->status == 'pending') {
            $order->status = 'cancelled';
            $order->save();

            // update order items
            OrderItem::where('order_id', $id)->update(['status' => 'cancelled']);

            // restore product stocks
            $items = OrderItem::where('order_id', $id)->select('id', 'order_id', 'product_id', 'quantity')->get();
            foreach ($items as $item) {
                Product::find($item->product_id)->increment('stocks', $item->quantity);
            }

            return redirect()->route('orders.show', ['id' => $order])
                ->with('message', 'Your order has been cancelled.');
        } else {
            return redirect()->back()->withInput()->withErrors(['Unable to cancel order.']);
        }
    }

    public function payment(Request $request, $id)
    {
        $order = Order::where('user_id', Auth::id())->where('id', $id)->firstOrFail();

        if ($request->hasFile('payment')) {
            if ($request->file('payment')->isValid()) {
                $fileName = $order->id . '-' . time() . '.' . $request->payment->extension();
                $request->payment->move(public_path('storage/payments'), $fileName);

                $order->payment_file = $fileName;
                $order->payment_date = date('Y-m-d');
                $order->status = 'pending';
                $order->payment_notes = '';
                $order->save();

                return redirect()->route('orders.show', ['id' => $order])
                    ->with('message', 'Your payment has been submitted.');
            }
        }

        return redirect()->back()->withInput()->withErrors(['Error uploading payment.']);

    }
}
