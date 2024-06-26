<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Cart_CheckOut\CartController;
use App\Http\Controllers\Cart_CheckOut\CheckoutController;
use App\Http\Controllers\User\UserController;
use App\Http\Middleware\FlashMessageMiddleware;
use App\Models\User\User;

Route::get('/', [ProductController::class, 'home'])->name('home');
Route::fallback(function () {
    return redirect()->route('home');
});

Route::get('/checkout', function () {
    return view('Site.Product.checkout');
});
Route::get('/product/{id}', [ProductController::class, 'product'])->name('product')->middleware(FlashMessageMiddleware::class);

Route::get('/shop/{id?}', [ProductController::class, 'shop'])->name('shop');
Route::get('/shop/sort', [ProductController::class, 'sort'])->name('shop.sort');

Route::post('/cart/{id?}', [CartController::class, 'AddCart'])->name('addcart');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart/{id?}/{id_cart?}', [CartController::class, 'remove'])->name('deleteCart');
Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity'])->name('updateQuantity');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('updateCart');

Route::get('/search', [ProductController::class, 'search'])->name('search');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'Postlogin'])->name('Postlogin');

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'Postregister'])->name('Postregister');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/change_password', [UserController::class, 'changePassword'])->name('changePassword');
Route::get('/order_history', [UserController::class, 'orderHistory'])->name('orderHistory');
Route::get('/order_detail/{id?}', [UserController::class, 'ordeDetail'])->name('ordeDetail');
Route::post('/destroy/{id?}', [UserController::class, 'destroy'])->name('destroy');

Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'postCheckout'])->name('postCheckout');

Route::get('/orderconfirmation/{id?}', [CheckoutController::class, 'OrderConfirmation'])->name('OrderConfirmation');

Route::post('/product/{id?}', [ProductController::class, 'customer'])->name('customer');


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'admin'])->name('adminDashboard');
    Route::fallback(function () {
        return redirect()->route('adminDashboard');
    });

    Route::get('/product-list', [AdminController::class, 'productList'])->name('productList');
    Route::delete('/product-list/{id}', [AdminController::class, 'deleteProduct'])->name('deleteProduct');
    Route::get('/product-add', [AdminController::class, 'productAdd'])->name('productAdd');
    Route::post('/product-add', [AdminController::class, 'postProductAdd'])->name('postProductAdd');
    Route::get('/product-edit/{id?}', [AdminController::class, 'productEdit'])->name('productEdit');
    Route::post('/product-edit', [AdminController::class, 'postProductEdit'])->name('postProductEdit');
    
    Route::get('/category-list', [AdminController::class, 'CategoryList'])->name('CategoryList');
    Route::post('/category-list/{id?}', [AdminController::class, 'deleteCategory'])->name('deleteCategory');
    Route::get('/category-add', [AdminController::class, 'CategoryAdd'])->name('CategoryAdd');
    Route::post('/category-add', [AdminController::class, 'postCategoryAdd'])->name('postCategoryAdd');
    Route::get('/category-edit/{id?}', [AdminController::class, 'categoryEdit'])->name('categoryEdit');
    Route::post('/category-edit', [AdminController::class, 'postCategoryEdit'])->name('postCategoryEdit');
    
    Route::get('/user-list', [AdminController::class, 'userList'])->name('userList');
    Route::post('/user-list/{id?}', [AdminController::class, 'deleteUser'])->name('deleteUser');
    Route::get('/user-edit/{id?}', [AdminController::class, 'userEdit'])->name('userEdit');
    Route::post('/user-edit', [AdminController::class, 'postUserEdit'])->name('postUserEdit');
    
    Route::get('/order-list', [AdminController::class, 'ordersList'])->name('ordersList');
    Route::post('/order-list/{id?}', [AdminController::class, 'deleteOrder'])->name('deleteOrder');
    Route::get('/order-edit/{id?}', [AdminController::class, 'orderEdit'])->name('orderEdit');
    Route::post('/order-edit', [AdminController::class, 'postOrderEdit'])->name('postOrderEdit');
    Route::post('/order/edit/{id}', [AdminController::class, 'postOrderEdit'])->name('postOrderEdit');
});
