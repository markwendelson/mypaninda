<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ShippingAddress;
use App\Models\Settings;
use App\Models\Seller;
use App\Models\User;

class CheckoutController extends Controller
{
    public function index()
    {
        $address = Address::where('user_id', Auth::id())->first();

        $cart = session('cart', []);

        // use collections here; temp loop
        $subtotal = 0;
        $totalSF = 0;
        $discount = session('discount', 0);

        foreach ($cart as $item) {
            $subtotal += $item['item']['price'] * $item['quantity'];
            $totalSF += $item['item']['shipping_fee'] * $item['quantity'];
        }

        $total = ($subtotal + $totalSF) - $discount;

        return view('checkout', [
            'cart' => $cart,
            'subtotal' => number_format($subtotal, 2),
            'totalSF' => number_format($totalSF, 2),
            'discount' => number_format($discount, 2),
            'total' => number_format($total, 2),
            'address' => $address
        ]);
    }

    public function process(Request $request)
    {
        // get cart session
        $cart = $request->session()->get('cart', []);
        if (count($cart) <= 0) {
            return redirect()->route('cart');
        }

        // get settings sa db or config env
        $rates = Settings::firstWhere('id', '>', 0);
        $tfRate = $rates->transaction_fee ?? 0.0277;
        $vatRate = $rates->vat ?? 0.12;
        $ascRate = $rates->affiliate_commission ?? 0.10;
        $sscRate = $rates->sponsor_commission ?? 0.05;

        // use collections here; temp loop
        $subtotal = 0;
        $totalSF = 0;
        $discount = $request->session()->get('discount', 0);
        $coupon = $request->session()->get('coupon');

        foreach ($cart as $item) {
            $subtotal += $item['item']['price'] * $item['quantity'];
            $totalSF += $item['item']['shipping_fee'] * $item['quantity'];
        }

        $total = ($subtotal + $totalSF) - $discount;
        $paymentCode = (string) Str::uuid();

        // store to order
        $order = new Order;
        $order->user_id = $request->user()->id;
        $order->subtotal = $subtotal;
        $order->shipping_fee = $totalSF;
        $order->coupon = $coupon;
        $order->discount = $discount;
        $order->total = $total;
        $order->payment_code = $paymentCode;
        $order->status = 'pending';
        $order->save();

        $currentUrl = url()->current();
		$domain = '.'.env('APP_DOMAIN');
        $username = Str::between($currentUrl, '://', $domain);
        $affiliate = User::where('username', $username)->select('id')->first();
        $affiliateId = $affiliate->id ?? 0;

        // iterate cart items
        foreach ($cart as $item) {
            $sponsor = Seller::where('user_id', $item['item']['user_id'])->select('sponsor_id')->first();
            $sponsorId = $sponsor->sponsor_id ?? 0;

            $total = ($item['item']['price'] + $item['item']['shipping_fee']) * $item['quantity'];
            $sellerCharge = round($total * $tfRate, 2);
            $sellerNet = $total - $sellerCharge;

            $vat = round($sellerCharge * $vatRate);
            $transactionFee = $sellerCharge - $vat;

            // credit only if available 
			// HINDI DAPAT MAGKAROON NG AFFILIATE COMMISH IF SARILI NIYANG PRODUCT
            $affiliateSalesCommission = 0; // 
            if ($affiliateId != 0) {
                if ($affiliateId != $item['item']['user_id']) {
                    $affiliateSalesCommission = round($transactionFee * $ascRate, 2);
                }
            }

            // credit only if available
            $sponsorSalesCommission = ($sponsorId > 0) ? round($transactionFee * $sscRate, 2) : 0;

            $companyNet = $transactionFee - ($affiliateSalesCommission + $sponsorSalesCommission);

            // store to order items
            $orderItem = new OrderItem;
            $orderItem->order_id = $order->id;
            $orderItem->reference_number = (string) Str::uuid();
            $orderItem->product_id = $item['item']['id'];
            $orderItem->title = $item['item']['title'];
            $orderItem->price = $item['item']['price'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->subtotal = $item['item']['price'] * $item['quantity'];
            $orderItem->shipping_fee = $item['item']['shipping_fee'] * $item['quantity'];
            $orderItem->total = $total;
            $orderItem->seller_id = $item['item']['user_id'];
            $orderItem->affiliate_id = $affiliateId;
            $orderItem->sponsor_id = $sponsorId;
            $orderItem->seller_charge = $sellerCharge;
            $orderItem->seller_net = $sellerNet;
            $orderItem->vat = $vat;
            $orderItem->transaction_fee = $transactionFee;
            $orderItem->affiliate_commission = $affiliateSalesCommission;
            $orderItem->sponsor_commission = $sponsorSalesCommission;
            $orderItem->company_net = $companyNet;
            $orderItem->status = 'pending';
            $orderItem->save();
        }

        // store shipping address
        $shipping = new ShippingAddress;
        $shipping->order_id = $order->id;
        $shipping->first_name = $request->first_name;
        $shipping->last_name = $request->last_name;
        $shipping->email = $request->email;
        $shipping->phone = $request->phone;
        $shipping->address_line1 = $request->address_line1;
        $shipping->address_line2 = $request->address_line2;
        $shipping->province = $request->province;
        $shipping->city = $request->city;
        $shipping->postal_code = $request->postal_code;
        $shipping->landmark = $request->landmark;
        $shipping->save();

        // clear session cart
        $request->session()->forget(['cart', 'discount', 'coupon']);

        // assumed payments made, redirect to confirmation page
        return redirect()->route('checkout.complete', ['id' => $order->id]);
    }

    public function complete(Request $request)
    {
        $order = Order::findOrFail($request->id);
        if ($request->user()->id != $order->user_id) {
            abort(404);
        }

        return view('complete', compact('order'));
    }
}
