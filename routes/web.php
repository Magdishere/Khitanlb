<?php

use App\Http\Livewire\CartComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\WishlistComponent;
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

Route::get('/', function () {
    return view('home');
});

Route::get('about', function () {
    return view('about');
});

Route::get('user_dashboard', function () {
    return view('Front.user_dashboard');
});

Route::get('/shop', ShopComponent::class)->name('shop');
Route::get('/cart', CartComponent::class)->name('shop.cart');
Route::get('/wishlist', WishlistComponent::class)->name('shop.wishlist');
Route::get('/contact', ContactComponent::class)->name('contact');
Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');

