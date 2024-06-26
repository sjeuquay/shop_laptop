<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Category;
use App\Models\Product\Customer;
use App\Models\Product\Thumnail;
use Illuminate\Support\Facades\DB;
use App\Models\Product\Specifications;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function home(Request $request)
    {
        try {
            $id = $request->id;
            $productsDemo = null;
            $thumbnail = null;
            $products = Product::orderBy('time_up', 'desc')->limit(12)->get();
            $productsHot = Product::where('hot', 1)->limit(12)->get();

            $productsView = Product::orderBy('view', 'desc')->limit(12)->get();

            if ($id) {
                $productsDemo = Product::findOrFail($id);
                $thumbnail = Thumnail::where('product_id', $productsDemo->id)->get();
            }
        } catch (\Throwable $error) {
            // Xử lý ngoại lệ nếu có
        }

        return view('Site.home', compact('products', 'productsView', 'productsHot', 'productsDemo', 'thumbnail'));
    }

    public function shop(string $id = null)
    {
        try {
            $products = Product::orderBy('time_up', 'desc')->paginate(12);
            $category = Category::all();
            $similar = Product::where('category_id', $id)
                ->paginate(12);
        } catch (\Throwable $error) {
        }
        return view('Site.Product.shop', compact('products', 'similar', 'category'));
    }
    public function sort(Request $request)
    {
        try {
            // Lấy tiêu chí sắp xếp từ query string
            $criteria = $request->input('criteria');

            // Xử lý sắp xếp sản phẩm dựa trên tiêu chí
            if ($criteria == 'price_asc') {
                $products = Product::orderBy('sale_price', 'asc')->paginate(12);
            } elseif ($criteria == 'price_desc') {
                $products = Product::orderBy('sale_price', 'desc')->paginate(12);
            } else {
                // Nếu không có tiêu chí hoặc tiêu chí không hợp lệ, hiển thị tất cả sản phẩm
                $products = Product::orderBy('time_up', 'desc')->paginate(12);
            }

            // Lấy danh sách danh mục
            $category = Category::all();

            // Trả về view với danh sách sản phẩm đã sắp xếp và danh sách danh mục
            return view('Site.Product.shop', compact('products', 'category'));
        } catch (\Throwable $error) {
        }
    }
    public function product(string $id)
    {
        try {
            $product = Product::findOrFail($id);
            $specifications = Specifications::where('product_id', $product->id)->first();
            // $thumbnail = Thumnail::where('product_id', $product->id)->get();
            $similar = Product::where('category_id', $product->category_id)
                ->where('id', '!=', $product->id)
                ->limit(10)
                ->get();
            $customer = Customer::where('user_id', auth::id())
                                ->where('product_id', $id)
                                ->paginate(5);
        } catch (\Throwable) {
        }
        return view('Site.Product.product', compact('customer','product', 'similar', 'specifications'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('search');
        if ($keyword !== '') {
            $search = Product::where('name', 'like', "%$keyword%")
                ->paginate(12);
        } else {
            $search = null;
        }
        return view('Site.Product.search', compact('search', 'keyword'));
    }

    public function customer(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'comment' => 'required',
            'email' => [
                'required',
                'regex:/^.+@.+\..+$/i'
            ],
            [
                'name.reuqired' => 'Vui lòng nhập tên',
                'comment.reuqired' => 'Vui lòng nhập nội dung đánh giá',
                'email.reuqired' => 'Vui lòng nhập email',
                'email.regex' => 'Vui lòng nhập đúng định dạng email'
            ]
        ]);

        $userId = Auth::id();

        $customer = new Customer();
        $customer->fill($request->all());
        $customer->user_id = $userId;
        $customer->product_id = $id;
        $customer->content = $request->comment;
        $customer->save();

        return redirect()->back();
    }
}
