<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order\orderDetail;
use App\Models\Order\Orders;
use App\Models\Order\Status;
use App\Models\Product\Product;
use App\Models\Product\Specifications;
use App\Models\User\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {

        return view('admin.dashboard');
    }

    public function productList()
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);
        return view('admin.product.productList', compact('products'));
    }
    public function productAdd()
    {
        $categorys = Category::all();
        return view('admin.product.productAdd', compact('categorys'));
    }
    public function postProductAdd(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'sale_price' => 'nullable',
                'quantity_available' => 'required',
                'category_id' => 'required',
                'hot' => 'required',
                'is_stock' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'hard_disk' => 'required',
                'OS' => 'required',
                'ram' => 'required',
                'capacity' => 'required',
                'screen_size' => 'required',
                'card_screen' => 'required'
            ],
            [
                'name.required' => 'Tên sản phẩm không được bỏ trống',
                'description.required' => 'Mô tả không được bỏ trống',
                'price.required' => 'Giá không được bỏ trống',
                'quantity_available.required' => 'Số lượng tồn kho không được bỏ trống',
                'category_id.required' => 'Danh mục sản phẩm không được bỏ trống',
                'hot.required' => 'Bạn phải chọn sản phẩm hot hoặc thường',
                'is_stock.required' => 'Bạn phải chọn hiện hoặc ẩn sản phẩm',
                'image.required' => 'Ảnh không được bỏ trống',
                'image.image' => 'Tệp tải lên phải là hình ảnh',
                'image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif',
                'image.max' => 'Hình ảnh không được lớn hơn 2MB',
                'hard_disk.required' => 'Vui lòng nhập thông tin ổ cứng.',
                'OS.required' => 'Vui lòng nhập thông tin hệ điều hành.',
                'ram.required' => 'Vui lòng nhập thông tin RAM.',
                'capacity.required' => 'Vui lòng nhập thông tin dung lượng.',
                'screen_size.required' => 'Vui lòng nhập thông tin kích thước màn hình.',
                'card_screen.required' => 'Vui lòng nhập thông tin card đồ họa.'
            ]
        );
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('images/product'), $filename);
            $validated['image'] = $filename;  // Lưu đường dẫn tệp ảnh vào cơ sở dữ liệu
        }

        $product = Product::create($validated);
        $specificationsData = [
            'product_id' => $product->id,
            'hard_disk' => $validated['hard_disk'],
            'OS' => $validated['OS'],
            'ram' => $validated['ram'],
            'capacity' => $validated['capacity'],
            'screen_size' => $validated['screen_size'],
            'card_screen' => $validated['card_screen'],
        ];

        Specifications::create($specificationsData);

        return redirect()->route('productList')->with('success', 'Sản phẩm đã được thêm thành công.');
    }

    public function deleteProduct(Request $request, string $id)
    {
        if ($request->isMethod('delete')) {
            Product::where('id', $id)->delete();
            return redirect()->route('productList')->with('success', 'Xóa sản phẩm thành công.');
        } else {
            return redirect()->back()->withErrors(['msg' => 'Invalid request method.']);
        }
    }

    public function productEdit(string $id)

    {
        $product = Product::find($id);
        $categorys = Category::all();
        return view('admin.product.productEdit', compact('product', 'categorys'));
    }
    public function postProductEdit(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'sale_price' => 'nullable',
                'quantity_available' => 'required',
                'category_id' => 'required',
                'hot' => 'required',
                'is_stock' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'hard_disk' => 'required',
                'OS' => 'required',
                'ram' => 'required',
                'capacity' => 'required',
                'screen_size' => 'required',
                'card_screen' => 'required'
            ],
            [
                'name.required' => 'Tên sản phẩm không được bỏ trống',
                'description.required' => 'Mô tả không được bỏ trống',
                'price.required' => 'Giá không được bỏ trống',
                'quantity_available.required' => 'Số lượng tồn kho không được bỏ trống',
                'category_id.required' => 'Danh mục sản phẩm không được bỏ trống',
                'hot.required' => 'Bạn phải chọn sản phẩm hot hoặc thường',
                'is_stock.required' => 'Bạn phải chọn hiện hoặc ẩn sản phẩm',
                'image.required' => 'Ảnh không được bỏ trống',
                'image.image' => 'Tệp tải lên phải là hình ảnh',
                'image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif',
                'image.max' => 'Hình ảnh không được lớn hơn 2MB',
                'hard_disk.required' => 'Vui lòng nhập thông tin ổ cứng.',
                'OS.required' => 'Vui lòng nhập thông tin hệ điều hành.',
                'ram.required' => 'Vui lòng nhập thông tin RAM.',
                'capacity.required' => 'Vui lòng nhập thông tin dung lượng.',
                'screen_size.required' => 'Vui lòng nhập thông tin kích thước màn hình.',
                'card_screen.required' => 'Vui lòng nhập thông tin card đồ họa.'
            ]
        );
        $product = Product::find($request->id);
        if (!$product) {
            return redirect()->route('productList')->with('error', 'Sản phẩm không tồn tại');
        }
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu tồn tại
            if ($product->image && file_exists(public_path('images/product/' . $product->image))) {
                unlink(public_path('images/product/' . $product->image));
            }

            // Lưu ảnh mới
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('images/product'), $filename);
            $validated['image'] = $filename;
        }

        // Cập nhật thông tin sản phẩm
        $product->update($validated);

        $product->specification->update([
            'hard_disk' => $request->hard_disk,
            'OS' => $request->OS,
            'ram' => $request->ram,
            'capacity' => $request->capacity,
            'screen_size' => $request->screen_size,
            'card_screen' => $request->card_screen
        ]);

        return redirect()->route('productList')->with('success', 'Thay đổi thông tin sản phẩm thành công');
    }

    public function CategoryList()
    {
        $categorys = Category::paginate(10);
        return view('admin.product.categoryList', compact('categorys'));
    }
    public function CategoryAdd()
    {
        return view('admin.product.categoryAdd');
    }
    public function postCategoryAdd(Request $request)
    {
        $valided =  $request->validate(
            [
                'name' => 'required|max:20',
                'hidden' => 'required'
            ],
            [
                'name.required' => 'Vui lòng nhập tên danh mục',
                'name.max' => 'Tên danh mục tối đa 20 ký tự',
                'hidden.required' => 'Vui lòng nhập ẩn hiện danh mục'
            ]
        );

        Category::create($valided);
        return redirect()->route('CategoryList')->with('success', 'Thêm danh mục thành công');
    }

    public function categoryEdit(string $id)
    {
        $category = Category::find($id);
        return view('admin.product.cateogryEdit', compact('category'));
    }
    public function postCategoryEdit(Request $request)
    {
        $valided =  $request->validate(
            [
                'name' => 'required|max:20',
                'hidden' => 'required'
            ],
            [
                'name.required' => 'Vui lòng nhập tên danh mục',
                'name.max' => 'Tên danh mục tối đa 20 ký tự',
                'hidden.required' => 'Vui lòng nhập ẩn hiện danh mục'
            ]
        );
        $category = Category::find($request->id);
        $category->update($valided);
        return  redirect()->route('CategoryList', compact('category'))->with('success', 'Thay đổi danh mục thành công');
    }


    public function deleteCategory(string $id)
    {
        Category::find($id)->delete();
        return redirect()->route('CategoryList')->with('success', 'Xóa danh mục thành công');
    }

    public function userList()
    {
        $users = User::paginate(5);
        return view('admin.user.userList', compact('users'));
    }
    public function deleteUser(string $id)
    {
        User::find($id)->delete();
        return redirect()->route('userList')->with('success', 'Xóa tài khoản thành công');
    }
    public function ordersList()
    {
        $orders = Orders::paginate(5);
        $statuses = Status::all();
        return view('admin.user.ordersList', compact('orders', 'statuses'));
    }
    public function deleteOrder(string $id)
    {
        Orders::find($id)->delete();
        return redirect()->route('ordersList')->with('success', 'Xóa đơn hàng thành công');
    }
    public function orderEdit(string $id)
    {
        $order = Orders::find($id);
        $statuses = Status::all();
        return view('admin.user.orderEdit', compact('order', 'statuses'));
    }
    public function postOrderEdit(Request $request, $id)
    {
        $order = Orders::find($id);
        if ($order) {
            $order->status_id = $request->input('status_id');
            $order->save();
            return redirect()->route('ordersList')->with('success', 'Cập nhật trạng thái thành công!');
        }
        return redirect()->route('ordersList')->with('error', 'Có lỗi xảy ra!');
    }
}
