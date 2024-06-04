<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order\orderDetail;
use App\Models\Order\Orders;
use App\Models\Product\Product;
use App\Models\User\User;
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
    public function productAdd() {
        return view('admin.product.productAdd');
    }
    
    public function CategoryList() {
        $categorys = Category::paginate(5);
        return view('admin.product.categoryList', compact('categorys'));
    }
    public function userList() {
        $users = User::paginate(5);
        return view('admin.user.userList', compact('users'));
    }
    public function ordersList() {
        $orders = Orders::paginate(5);
        return view('admin.user.ordersList', compact('orders'));
    }
}
