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
        $seller = User::where('username', $username)->select('id')->first();

        $limit = 12;

        if ($seller) {
            $featured = FeaturedProduct::where('user_id', $seller->id)->get();
            if (count($featured) == 0) {
                $featuredProducts = Product::inRandomOrder()->limit($limit)->get();
            } else {
                $ids = $featured->pluck('product_id');
                $featuredProducts = Product::whereIn('id', $ids)->inRandomOrder()->limit($limit)->get();
            }
        } else {
            $featuredProducts = Product::inRandomOrder()->limit($limit)->get();
        }

        return view('home', compact('featuredProducts'));
    }
}
