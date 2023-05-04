<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\FeaturedProduct;

class CartController extends Controller
{
    public function index()
    {
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

        return view('cart', [
            'cart' => $cart,
            'subtotal' => number_format($subtotal, 2),
            'totalSF' => number_format($totalSF, 2),
            'discount' => number_format($discount, 2),
            'total' => number_format($total, 2),
        ]);
    }

    public function store(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $id = $product->id;

        $cart = $request->session()->get('cart');

        if ($cart) {
            // check if this product exist then increment quantity
            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
            // if item not exist in cart then add to cart with quantity = 1
                $cart[$id] = [
                    'item' => $product,
                    'quantity' => 1,
                ];
            }

            $request->session()->put('cart', $cart);
        } else {
            // cart empty add first item
            $item = [
                $id => [
                    'item' => $product,
                    'quantity' => 1,
                ]
            ];

            $request->session()->put('cart', $item);
        }

        return response()->json([
            'message' => 'Product added to cart successfully!', 
            'cart' => $request->session()->get('cart'),
        ]);
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = $request->session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            $request->session()->put('cart', $cart);

            // use collections here; temp loop
            $subtotal = 0;
            $totalSF = 0;
            $discount = session('discount', 0);

            $updatedCart = $request->session()->get('cart');
            $itemTotal = ($updatedCart[$request->id]['item']['price'] + $updatedCart[$request->id]['item']['shipping_fee']) * $updatedCart[$request->id]['quantity'];

            foreach ($updatedCart as $item) {
                $subtotal += $item['item']['price'] * $item['quantity'];
                $totalSF += $item['item']['shipping_fee'] * $item['quantity'];
            }

            $total = ($subtotal + $totalSF) - $discount;

            return response()->json([
                'message' => 'Cart updated successfully!', 
                'cart' => $updatedCart,
                'subtotal' => number_format($subtotal, 2),
                'totalSF' => number_format($totalSF, 2),
                'discount' => number_format($discount, 2),
                'total' => number_format($total, 2),
                'itemTotal' => number_format($itemTotal, 2),
            ]);
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = $request->session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                $request->session()->put('cart', $cart);
            }

            // clear if last item
            if (count($request->session()->get('cart')) <= 0) {
                $request->session()->forget(['cart', 'discount', 'coupon']);

                return response()->json([
                    'message' => 'Your cart is empty!', 
                    'cart' => [],
                ]);
            }

            // use collections here; temp loop
            $subtotal = 0;
            $totalSF = 0;
            $discount = session('discount', 0);

            foreach ($cart as $item) {
                $subtotal += $item['item']['price'] * $item['quantity'];
                $totalSF += $item['item']['shipping_fee'] * $item['quantity'];
            }

            $total = ($subtotal + $totalSF) - $discount;

            return response()->json([
                'message' => 'Cart item has been removed!', 
                'cart' => $request->session()->get('cart'),
                'subtotal' => number_format($subtotal, 2),
                'totalSF' => number_format($totalSF, 2),
                'discount' => number_format($discount, 2),
                'total' => number_format($total, 2),
            ]);
        }
    }

    public function destroy(Request $request)
    {
        $request->session()->forget(['cart', 'discount', 'coupon']);
        return response()->json(['message' => 'Your cart is empty.']);
    }

    public function promo(Request $request)
    {
        // check sa database if meron and valid
        // $coupon = Coupon::where('code', $request->coupon)
        //             ->where('status', 1)
        //             ->first();

        // if (!$coupon) {
        //     return redirect()->back()->withInput()
        //         ->withErrors(['Unable to process request. Promocode is invalid.']);
        // }
        
        // $request->session()->put('coupon', $coupon->code);
        // $request->session()->put('discount', $coupon->discount ?? 0);

        // demo only
        $code = $request->coupon;
        if ($code != 'MYPANINDA') {
            return redirect()->back()->withInput()
                ->withErrors(['Unable to process request. Promocode is invalid.']);
        }

        $discount = 100;
        $request->session()->put('coupon', $code);
        $request->session()->put('discount', $discount);

        return redirect()->route('cart')
            ->with('message', 'The code you entered has been accepted.');
    }

    public function featured(Request $request)
    {
        $featured = FeaturedProduct::updateOrCreate(
            ['product_id' => $request->product_id, 'user_id' => $request->user()->id],
            ['status' => 1]
        );

        return $featured;
    }
}
