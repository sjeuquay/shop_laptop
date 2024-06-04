@extends('admin.layout')
@section('title', 'Danh sách danh mục')
@section('admin')

    <div class="" style="margin-top: 10px;">
        <div class="product-status mg-b-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>Danh mục sản phẩm</h4>
                            <div class="add-product">
                                <a href="">Thêm danh mục</a>
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
                                            href="{{ $category->previousPageUrl() }}">Previous</a></li>
                                    @for ($i = 1; $i <= $category->lastPage(); $i++)
                                        <li class="page-item {{ $category->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $category->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $category->nextPageUrl() }}">Next</a>
                                    </li>
                                </ul>
                            </div> --}}
                            @if (!empty($categorys))

                                <nav aria-label="Page navigation example"
                                    style="width:100%;display:flex;justify-content:center;">
                                    <ul class="pagination pagi-list">
                                        <li class="page-item"><a class="page-link"
                                                href="{{ $categorys->previousPageUrl() }}"><i
                                                    class="bi bi-chevron-left"></i></a></li>
                                        @for ($i = 1; $i <= $categorys->lastPage(); $i++)
                                            <li class="page-item {{ $categorys->currentPage() == $i ? 'active' : '' }}">
                                                <a class="page-link"
                                                    href="{{ $categorys->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $categorys->nextPageUrl() }}"><i
                                                    class="bi bi-chevron-right"></i></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
