<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin() {

        return view('admin.dashboard');
    }

    public function productList() {
        $products = Product::paginate(10);
        return view('admin.product.productList', compact('products'));
    }
}
