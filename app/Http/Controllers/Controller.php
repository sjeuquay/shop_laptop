<?php

namespace App\Http\Controllers;

use App\Models\Cart_Checkout\Cart;
use App\Models\Cart_Checkout\CartItem;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

abstract class Controller
{
    public function __construct()
    {
        View::composer('Site.header', function ($view) {
            $category = Category::take(4)->get();
            $user = Auth::user();
            $cartAmount = 0;
            $amountProduct = 0;
            $cart = [];
            $total = 0;
            if ($user) {
                $cart = Cart::where('user_id', $user->id)->first();
                $amountProduct = $cart->cartItem->count();
                foreach ($cart->cartItem as $item) {
                    $cartAmount += $item->quantity;
                    $total += $item->total_price;
                }
            }
            \view()->share([
                'amount' => $cartAmount,
                'amountProduct' => $amountProduct,
                'cart' => $cart,
                'total' => $total
            ]);
            $view->with('category', $category);
        });
    }
}
