@extends('admin.layout')
@section('title', 'Thêm danh mục')
@section('admin')
    <div class="single-product-tab-area mg-b-30" style="margin-top: 10px;">
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-tab-pro-inner">
                            <ul id="myTab3" class="tab-review-design">
                                <li class="active"><a href="#description"><i class="bi bi-pencil"></i>
                                        Thông tin danh mục</a></li>
                            </ul>
                            <form action="{{ route('postCategoryEdit', ['id' => $category->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row" style="margin-bottom:20px;">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="bi bi-pencil"></i></span>
                                                        <input name="name" type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            placeholder="Tên danh mục" value="{{$category->name}}">
                                                    </div>
                                                    @error('name')
                                                        <div class="invalid-feedback" style="color: red;margin-bottom:10px;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="bi bi-pencil"></i></span>
                                                        <input name="orderBy" type="text"
                                                            class="form-control @error('orderBy') is-invalid @enderror"
                                                            placeholder="Sắp xếp danh mục" value="{{$category->orderBy}}">
                                                    </div>
                                                    @error('orderBy')
                                                        <div class="invalid-feedback" style="color: red;margin-bottom:10px;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <select name="hidden"
                                                        class="form-control pro-edt-select form-control-primary @error('hidden') is-invalid @enderror"
                                                        style="margin-bottom: 15px">
                                                        <option value="1">Hiện danh mục</option>
                                                        <option value="0">Ẩn danh mục</option>
                                                    </select>
                                                    @error('hidden')
                                                        <div class="invalid-feedback" style="color: red;margin-bottom:10px;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="text-center custom-pro-edt-ds">
                                                    <button type="submit"
                                                        class="btn btn-ctl-bt waves-effect waves-light m-r-10">Thay đổi
                                                    </button>
                                                    <a href="{{ route('CategoryList') }}"
                                                        class="btn btn-ctl-bt waves-effect waves-light">Hủy
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
