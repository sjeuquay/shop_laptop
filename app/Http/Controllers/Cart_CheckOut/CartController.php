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
            if ($cartItem) {
                $cartItem->quantity += 1;
                $cartItem->total_price = $cartItem->quantity * $cartItem->price;
                $cartItem->save();
            } else {
                if ($product->sale_price > 0) {
                    $priceProduct = $product->sale_price;
                } else {
                    $priceProduct = $product->price;
                }
                CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $id,
                    'quantity' => 1,
                    'price' => $priceProduct,
                    'total_price' => $priceProduct
                ]);
            }


            $cartItems = CartItem::where('cart_id', $cart->id)->get();

            foreach ($cartItems as $item) {
                $cart->total_price += $item->total_price;
            };

            session()->put('cart' . Auth::id(), $cartItems);
            session()->put('cartTotal' . Auth::id(), $cart);
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

    public function updateQuantity(Request $request)
    {
        dd($request->all());
        $itemId = $request->input('item_id');
        $newQuantity = $request->input('new_quantity');

        // Update session
        $cart = session()->get('cart' . Auth::id());
        $cart[$itemId]->quantity = $newQuantity;
        session()->put('cart' . Auth::id(), $cart);

        // Update database
        CartItem::where('id', $itemId)
            ->update(['quantity' => $newQuantity]);

        return redirect()->back();
    }
}
