<?php

namespace App\Http\Controllers\Cart_CheckOut;


use App\Http\Controllers\Controller;
use App\Models\Cart_Checkout\Cart;
use App\Models\Cart_Checkout\CartItem;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function cart()
    {
        try {
        } catch (\Throwable $error) {
            dd($error);
        }
        return view('Site.cart-checkOut.cart');
    }

    public function AddCart(Request $request, string $id)
    {

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
            if ($product->sale_price > 0) {
                $priceProduct = $product->sale_price;
            } else {
                $priceProduct = $product->price;
            }
            if ($cartItem) {
                $cartItem->quantity += 1;
                $cartItem->total_price = $cartItem->quantity * $priceProduct;
                $cartItem->save();
            } else {
                CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $id,
                    'quantity' => 1,
                    'price' => $priceProduct,
                    'total_price' => $priceProduct
                ]);
            }


            $cartItems = CartItem::where('cart_id', $cart->id)->get();

            $cartTotal = 0;
            foreach ($cartItems as $item) {
                $cartTotal += $item->total_price;
            }

            session()->put('cart' . Auth::id(), $cartItems);
            session()->put('cartTotal' . Auth::id(), $cartTotal);
            return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng thành công!');
        } catch (\Throwable $error) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi thêm sản phẩm vào giỏ hàng.');
        }
    }
    public function remove(string $id, string $id_cart)
    {
        $cart = session()->get('cart' . Auth::id());

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart' . Auth::id(), $cart);
        }

        CartItem::where('id', $id_cart)
            ->delete();

        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();
        if ($cart) {
            $cartItems = CartItem::where('cart_id', $cart->id)->get();
            session()->put('cart' . Auth::id(), $cartItems);
        } else {
            session()->forget('cart' . Auth::id());
        }


        return redirect()->back();
    }
    public function updateCart(Request $request)
    {
        $user = Auth::user();
        // Kiểm tra xem giỏ hàng đã tồn tại hay chưa
        $cart = Cart::where('user_id', $user->id)->first();
        $itemId = $request->input('id');
        $index = $request->input('index');
        $quantity = $request->input('quantity');

        // Truy vấn dữ liệu hiện tại của mục giỏ hàng
        $cartItem = CartItem::where('id', $itemId)->first();
        $product = Product::where('id', $cartItem->product->id)->first();

        if ($cartItem) {
            if ($product->sale_price > 0) {
                $priceProduct = $product->sale_price;
            } else {
                $priceProduct = $product->price;
            }
            // Cập nhật thông tin mới
            $cartItem->quantity = $quantity;
            $cartItem->total_price = $quantity * $priceProduct; // Giả sử giá sản phẩm lấy từ mối quan hệ

            // Lưu thay đổi vào cơ sở dữ liệu
            $cartItem->save();

            // Cập nhật session
            $cart = session()->get('cart' . Auth::id(), []);

            if (isset($cart[$index])) {
                $cart[$index]['quantity'] = $quantity;
                $cart[$index]['total_price'] = $cartItem->total_price;
                session()->put('cart' . Auth::id(), $cart);
            }

            return response()->json([
                'success' => true,
                'message' => 'Cập nhật mục giỏ hàng thành công.',
                'total_price' => $cartItem->total_price // Trả về tổng giá trị đã cập nhật
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Không tìm thấy mục giỏ hàng.']);
    }
}
