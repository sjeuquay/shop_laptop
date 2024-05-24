<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Cart_CheckOut\CartController;
use App\Http\Controllers\User\UserController;
use App\Models\User\User;

Route::get('/', [ProductController::class, 'home'])->name('home');
Route::fallback(function () {
    return redirect()->route('home');
});

Route::get('/checkout', function () {
    return view('Site.Product.checkout');
})
;
Route::get('/product/{id}', [ProductController::class, 'product'])->name('product');

Route::get('/shop/{id?}', [ProductController::class, 'shop'])->name('shop');
Route::get('/shop/sort', [ProductController::class, 'sort'])->name('shop.sort');

Route::post('/cart/{id?}', [CartController::class, 'AddCart'])->name('addcart');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    
Route::get('/search', [ProductController::class, 'search'])->name('search');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'Postlogin'])->name('Postlogin');

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'Postregister'])->name('Postregister');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');
