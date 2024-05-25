<?php

namespace App\Http\Controllers\Cart_CheckOut;


use App\Http\Controllers\Controller;
use App\Models\Cart_Checkout\Cart;
use App\Models\Cart_Checkout\CartItem;
use Illuminate\Http\Request;
use App\Models\Product\Product;

class CartController extends Controller
{
    public function cart() {

        return view('Site.cart-checkOut.cart');
    }

    public function AddCart(Request $request, string $id) {
        try {
            // Kiểm tra xem giỏ hàng đã tồn tại hay chưa
            $cart = Cart::where('user_id', $id)->first();
            
            if ($cart) {
                // Nếu giỏ hàng tồn tại, thêm cart_item vào giỏ hàng đã tồn tại
                CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity,
                    // Các thuộc tính khác của cart_item
                ]);
            } else {
                // Nếu giỏ hàng không tồn tại, tạo giỏ hàng mới
                $cart = Cart::create([
                    'user_id' => $id,
                    // Các thuộc tính khác của cart
                ]);
    
                // Thêm cart_item vào giỏ hàng mới tạo
                CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity,
                    // Các thuộc tính khác của cart_item
                ]);
            }
        } catch (\Throwable $error) {
            // Xử lý lỗi nếu có
            // Bạn có thể ghi log hoặc thông báo lỗi cho người dùng
        }
    
        // Điều hướng người dùng về trang giỏ hàng
        return redirect()->route('cart');
    }
}
