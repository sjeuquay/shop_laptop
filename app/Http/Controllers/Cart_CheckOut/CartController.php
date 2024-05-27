<?php

namespace App\Http\Controllers\Cart_CheckOut;


use App\Http\Controllers\Controller;
use App\Models\Cart_Checkout\Cart;
use App\Models\Cart_Checkout\CartItem;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart() {

        return view('Site.cart-checkOut.cart');
    }

    public function AddCart(Request $request, string $id) {
        
        try {
            $user = Auth::user();
            $product = Product::where('id', $id)->first();
            // Kiểm tra xem giỏ hàng đã tồn tại hay chưa
            $cart = Cart::where('user_id', $user->id)->first();
            
            if (!$cart) {
                 // Nếu giỏ hàng không tồn tại, tạo giỏ hàng mới
                 $cart = Cart::create([
                    'user_id' => $user->id,
                ]);
                
            } 
            $cartItem = CartItem::where('cart_id', $cart->id)
                                ->where('product_id', $id)
                                ->first();
            if($cartItem){
                $cartItem->quantity += 1;
                $cartItem->total_price = $cartItem->quantity * $cartItem->price;
                $cartItem->save();
            }else {
                CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $id,
                    'quantity' => 1,
                    'price' => $product->sale_price,
                    'total_price' => $product->sale_price
                ]);
            }
        } catch (\Throwable $error) {
            // Xử lý lỗi nếu có
        }
        return redirect()->route('product', ['id' => $product->id]);
    }

}
