@extends('admin.layout')
@section('title', 'Danh sách sản phẩm')
@section('admin')

    <div class="" style="margin-top: 10px;">
        <div class="product-status mg-b-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>Products List</h4>
                            <div class="add-product">
                                <a href="">Add Product</a>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Ảnh</th>
                                        <th>Tên</th>
                                        <th>Trạng thái</th>
                                        <th>Số lượng</th>
                                        <th>Giá giảm</th>
                                        <th>Ẩn - hiện</th>
                                        <th>Giá</th>
                                        <th>Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($products))
                                        @foreach ($products as $product)
                                            <tr>
                                                <td><img src="{{ asset('images/product/' . $product->image) }}"
                                                        alt="" /></td>
                                                <td>{{ $product->name }}</td>
                                                <td>
                                                    @if ($product->quantity_available >= 0)
                                                        @include('admin.product.filedStatus', [
                                                            'quantity' => $product->quantity_available,
                                                        ])
                                                    @else
                                                        <button class="pd-setting" style="background-color:red !important;">
                                                            <small class="text-white ms-2">Lỗi số lượng</small>
                                                        </button>
                                                    @endif
                                                </td>
                                                <td>{{ $product->quantity_available }}</td>
                                                <td>{{ number_format($product->sale_price) }}₫</td>
                                                <td>
                                                    @if ($product->is_stock == 1)
                                                        Hiện
                                                    @else
                                                        Ẩn
                                                    @endif
                                                </td>
                                                <td>{{ number_format($product->price) }}₫</td>
                                                <td>
                                                    <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i
                                                            class="bi bi-pencil-square"></i></button>
                                                    <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i
                                                            class="bi bi-trash"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            {{-- <div class="custom-pagination">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $products->previousPageUrl() }}">Previous</a></li>
                                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                                        <li class="page-item {{ $products->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $products->nextPageUrl() }}">Next</a>
                                    </li>
                                </ul>
                            </div> --}}

                            <nav aria-label="Page navigation example" style="width:100%">
                                <ul class="pagination pagi-list">
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $products->previousPageUrl() }}">Previous</a></li>
                                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                                        <li class="page-item {{ $products->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $products->nextPageUrl() }}">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
