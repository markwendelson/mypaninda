<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop');
Route::get('/search', [App\Http\Controllers\ShopController::class, 'search'])->name('search');
Route::get('/item/{id}', [App\Http\Controllers\ShopController::class, 'item'])->name('item');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [App\Http\Controllers\CartController::class, 'store'])->name('cart.add');
Route::put('/cart/update', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
Route::delete('/cart/destroy', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/cart/promo', [App\Http\Controllers\CartController::class, 'promo'])->name('cart.promo');
Route::post('/cart/featured', [App\Http\Controllers\CartController::class, 'featured'])->name('cart.featured');

Route::name('page.')->prefix('pages')->group(function () {
    Route::get('/about', [App\Http\Controllers\PageController::class, 'about'])->name('about');
    Route::get('/contacts', [App\Http\Controllers\PageController::class, 'contact'])->name('contacts');
});

Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');
Route::middleware('auth')->group(function () {
    Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/complete/{id}', [App\Http\Controllers\CheckoutController::class, 'complete'])->name('checkout.complete');
    Route::get('me', [App\Http\Controllers\OrderController::class, 'index'])->name('me');
    Route::post('orders/payment/{id}', [App\Http\Controllers\OrderController::class, 'payment'])->name('orders.upload-payment');
    Route::post('orders/cancel/{id}', [App\Http\Controllers\OrderController::class, 'cancel'])->name('orders.cancel');
    Route::get('orders/{id}', [App\Http\Controllers\OrderController::class, 'show'])->name('orders.show');
    // // Route::resource('wishlists', 'App\Http\Controllers\WishlistController::class');
    
    Route::get('profiles/address', [App\Http\Controllers\AddressController::class, 'index'])->name('addresses.index');
    Route::post('profiles/address', [App\Http\Controllers\AddressController::class, 'store'])->name('addresses.store');
    Route::get('profiles/address/{id}', [App\Http\Controllers\AddressController::class, 'show'])->name('addresses.show');
    Route::put('profiles/address', [App\Http\Controllers\AddressController::class, 'update'])->name('addresses.update');
    Route::delete('profiles/address', [App\Http\Controllers\AddressController::class, 'destroy'])->name('addresses.destroy');
    
    Route::get('profiles', [App\Http\Controllers\ProfileController::class, 'index'])->name('profiles.index');
    Route::post('profiles', [App\Http\Controllers\ProfileController::class, 'update'])->name('profiles.update');
    
    Route::get('profiles/password', [App\Http\Controllers\ProfileController::class, 'password'])->name('profiles.password');
    Route::post('profiles/password', [App\Http\Controllers\ProfileController::class, 'reset'])->name('profiles.reset');
    
    Route::get('profiles/upgrade', [App\Http\Controllers\ProfileController::class, 'upgrade'])->name('profiles.upgrade');
    Route::post('profiles/upgrade', [App\Http\Controllers\ProfileController::class, 'requestUpgrade'])->name('profiles.request-upgrade');    
});
