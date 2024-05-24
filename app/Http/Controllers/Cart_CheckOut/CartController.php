<?php

namespace App\Http\Controllers\Cart_CheckOut;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;

class CartController extends Controller
{
    public function cart() {

        return view('Site.cart-checkOut.cart');
    }

    public function AddCart(string $id) {   
        
        try{

        }catch(\Throwable $error){
            
        }
        return redirect()->route('cart');    }
}
