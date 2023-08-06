<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class WebhookController extends Controller
{
    public function paymentStatus(Request $request)
    {
        // update db status
        // restore product stocks if status is expired or failed
    }

    public function deliveryStatus(Request $request)
    {
        // update db status
    }
}
