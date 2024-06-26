@extends('admin.layout')
@section('title', 'Danh sách danh mục')
@section('admin')

    <div class="" style="margin-top: 10px;">
        <div class="product-status mg-b-30">
            <div class="container-fluid">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>Danh mục sản phẩm</h4>
                            <div class="add-product">
                                <a href="{{ route('CategoryAdd') }}">Thêm danh mục</a>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Sắp xếp</th>
                                        <th>Ẩn - hiện</th>
                                        <th>Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($categorys))
                                        @foreach ($categorys as $category)
                                            <tr>
                                                <td>{{ $category->name }}</td>
                                                <td>1</td>
                                                <td>
                                                    @if ($category->hidden == 1)
                                                        Hiện
                                                    @else
                                                        Ẩn
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="" style="display: flex">
                                                        <button class="pd-setting-ed btn btn-dark text-white">
                                                            <a href="{{ route('categoryEdit', ['id' => $category->id]) }}">
                                                                <i class="bi bi-pencil-square" style="color: #fff;"></i>
                                                            </a>
                                                        </button>
                                                        <form
                                                            action="{{ route('deleteCategory', ['id' => $category->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit" data-toggle="tooltip" title="Trash"
                                                                class="pd-setting-ed"><i class="bi bi-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            {!! $categorys->appends(request()->query())->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
