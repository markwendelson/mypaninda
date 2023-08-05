<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Str;

use App\Models\User;
use App\Models\FeaturedProduct;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $currentUrl = url()->current();
        $username = Str::between($currentUrl, '://', '.'.env('APP_DOMAIN'));
        $user = User::where('username', $username)->where('type', 'seller')->select('id')->first();

        $limit = 12;
        $featuredProducts = Product::where('stocks', '>', 0)->where('status', 1)
                            ->inRandomOrder()->limit($limit)->get();

        if ($user) {
            $featured = FeaturedProduct::where('user_id', $user->id)->get();
            if (count($featured) > 0) {
                $ids = $featured->pluck('product_id');
                $featuredProducts = Product::whereIn('id', $ids)
                                    ->where('stocks', '>', 0)->where('status', 1)
                                    ->inRandomOrder()->limit($limit)->get();
            }
        }

        return view('home', compact('featuredProducts'));
    }
}
