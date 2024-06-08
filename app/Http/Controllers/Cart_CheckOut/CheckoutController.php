<?php

namespace App\Http\Controllers\Cart_CheckOut;

use App\Http\Controllers\Controller;
use App\Models\Cart_Checkout\Cart;
use App\Models\Cart_Checkout\CartItem;
use App\Models\Order\orderDetail;
use App\Models\Order\Orders;
use App\Models\Product\Product;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $cartItem = CartItem::all();
        $cartTotal = 0;
        foreach ($cartItem as $item) {
            $cartTotal += $item->total_price;
        }
        session()->put('cartTotal' . Auth::id(), $cartTotal);
        return view('Site.cart-checkOut.checkout');
    }

    public function postCheckout(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => [
                    'required',
                    'regex:/^.+@.+\..+$/i',
                ],
                'phone' => [
                    'required',
                    'regex:/^[0-9]{10}$/'
                ],
                'zip' => [
                    'required',
                    'regex:/^[0-9]{6}$/'
                ],
                'ship_address1' => 'required',
            ],
            [
                'name.required' => 'Vui lòng nhập Họ tên.',
                'email.required' => 'Vui lòng nhập địa chỉ email.',
                'email.regex' => 'Địa chỉ email không hợp lệ.',
                'phone.required' => 'Vui lòng nhập số điện thoại.',
                'phone.regex' => 'Vui lòng nhập đúng số điện thoại.',
                'zip.required' => 'Vui lòng nhập mã bưu điện.',
                'zip.regex' => 'Vui lòng nhập đúng mã bưu điện.',
                'ship_address1.required' => 'Vui lòng nhập địa chỉ.',
            ]
        );
        try {
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return redirect()->back()->withErrors(['email' => 'Email không tồn tại'])->withInput($request->only('email'));
            }
            if ($request->paymentMethod == null) {
                return redirect()->back()->with('error', 'Vui lòng chọn phương thức thanh toán');
            }
            $user = Auth::user();
            $paymentMethod = $request->input('paymentMethod');

            $amount = 0;
            $pay_amount = session('cartTotal' . auth::id());
            foreach (session('cart' . auth::id()) as $item) {
                $amount += $item->quantity;
            }

            $cartItems = session('cart'.auth::id());

            if ($user) {
                $orders =  Orders::create([
                    'user_id' => $user->id,
                    'status_id' => 1,
                    'paymentMethod' => $paymentMethod,
                    'amount' => $amount,
                    'pay_amount' => $pay_amount,
                    'zip' => $request->zip,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'name' => $request->name,
                    'ship_address1' => $request->ship_address1,
                    'ship_address2' => $request->ship_address2,
                    'customer_notes' => $request->customer_notes
                ]);
                
                foreach($cartItems as $cartitem) {
                    orderDetail::create([
                        'order_id' => $orders->id,
                        'product_id' => $cartitem->product_id,
                        'quantity' => $cartitem->quantity,
                        'unit_price' => $cartitem-> price,
                        'sub_price' => $cartitem->total_price
                    ]);
                    $product = Product::find($cartitem->product_id);
                    $product->quantity_available -= $cartitem->quantity;
                    if ($product->quantity_available == 0) {
                        $product->is_stock = 0;
                    }
                    $product->save();
                }
            }
            $cart =  Cart::where('user_id', $user->id)->first();
            CartItem::where('cart_id', $cart->id)->delete();
    
            // Xóa giỏ hàng khỏi session
            session()->forget('cart' . Auth::id());
            session()->forget('cartTotal' . Auth::id());

            return redirect()->route('OrderConfirmation',['id' => $orders->id])->with('success', 'Đặt đơn hàng thành công! Đơn hàng đang chờ xử lý');
        } catch (\Throwable $error) {
            dd($error);
        }
    }

    public function OrderConfirmation(string $id) {
        $order = Orders::where('id', $id)->first();
        return view('Site.cart-checkOut.OrderConfirmation', compact('order'));
    }
}
