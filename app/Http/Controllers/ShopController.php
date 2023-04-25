<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->query('category');
        $category = Category::findOrFail($categoryId);
        $products = Product::where('category_id', $categoryId)->paginate(16)
            ->appends('category', $categoryId);

        return view('shop', compact('category', 'products'));
    }

    public function item($id)
    {
        $product = Product::findOrFail($id);
        $similarProducts = Product::inRandomOrder()->limit(4)->get();

        return view('item', compact('product', 'similarProducts'));
    }
}
