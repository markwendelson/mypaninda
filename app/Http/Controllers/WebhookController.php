<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class WebhookController extends Controller
{
    public function payment(Request $request)
    {
        // update db status, validate request
        // sample api payload {order_id, payment_code, status}
        $id = $request->order_id;
        $paymentCode = $request->payment_code;
        $status = $request->status;

        //whereNotIn applicable status
        $order = Order::where('id', $id)
            ->where('payment_code', $paymentCode)
            ->where('status', 'pending')
            ->firstOrFail();
        $order->status = strtolower($status);
        $order->save();

        // if status is expired, say unpaid within 24hours
        if ($status == 'expired') {
            OrderItem::where('order_id', $id)->update(['status' => 'expired']);
            $items = OrderItem::where('order_id', $id)->select('id', 'order_id', 'product_id', 'quantity')->get();
            foreach ($items as $item) {
                Product::find($item->product_id)->increment('stocks', $item->quantity);
            }
        }

        return response()->json([
            'status' => 'success',
            'order_id' => $id,
            'payment_code' => $paymentCode,
        ]);
    }

    public function delivery(Request $request)
    {
        // update db status
    }
}
