<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(ViewController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/category', 'category')->name('category');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/blog/{id}', 'singleblog')->name('blog.single');
    Route::get('/elements', 'elements')->name('elements');
    Route::get('/tracking', 'tracking')->name('tracking');
    Route::get('/checkout', 'checkout')->name('checkout');
    Route::get('/product/{id}', 'product')->name('product.single');
    Route::get('/cart', 'cart')->name('cart');

    // Auth pages
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
});



// Pages
// Route::get('/products', [ViewController::class, 'products'])->name('products.index');
Route::get('/category', [ViewController::class, 'category'])->name('category');

// Route::get('/wishlist', [ViewController::class, 'wishlist'])->name('wishlist.index');
// Route::get('/cart', [ViewController::class, 'cart'])->name('cart.index');
// Route::get('/login', [ViewController::class, 'login'])->name('login');
// Route::get('/register', [ViewController::class, 'register'])->name('register');
