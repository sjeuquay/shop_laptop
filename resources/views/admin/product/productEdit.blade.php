@extends('admin.layout')
@section('title', 'Sửa sản phẩm')
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
                                        Thông tin sản phẩm</a></li>
                                <li><a href="#reviews"><i class="bi bi-card-image"></i> Ảnh</a>
                                </li>
                                <li><a href="#INFORMATION"><i class="bi bi-gear"></i> Thông số kỹ thuật</a>
                                </li>
                            </ul>
                            <form action="{{ route('postProductEdit', ['id' => $product->id]) }}" method="POST"
                                enctype="multipart/form-data">
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
                                                            placeholder="Tên sản phẩm" value="{{ $product->name }}">
                                                    </div>
                                                    @error('name')
                                                        <div class="invalid-feedback" style="color: red;margin-bottom:10px;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i
                                                                class="bi bi-body-text"></i></span>
                                                        <input type="text" name="description"
                                                            class="form-control @error('description') is-invalid @enderror"
                                                            placeholder="Mô tả" value="{{ $product->description }}">
                                                    </div>
                                                    @error('description')
                                                        <div class="invalid-feedback" style="color: red;margin-bottom:10px;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <select name="hot"
                                                        class="form-control pro-edt-select form-control-primary @error('hot') is-invalid @enderror"
                                                        style="margin-bottom: 15px">
                                                        <option value="0">Sản phẩm thường</option>
                                                        <option value="1">Sản phẩm Hot</option>
                                                    </select>
                                                    @error('hot')
                                                        <div class="invalid-feedback" style="color: red;margin-bottom:10px;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <select name="is_stock"
                                                        class="form-control pro-edt-select form-control-primary @error('is_stock') is-invalid @enderror">
                                                        <option value="1">Hiện sản phẩm</option>
                                                        <option value="0">Ẩn sản phẩm</option>
                                                    </select>
                                                    @error('is_stock')
                                                        <div class="invalid-feedback" style="color: red;margin-bottom:10px;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i
                                                                class="bi bi-currency-dollar"></i></span>
                                                        <input name="price" type="text"
                                                            class="form-control @error('price') is-invalid @enderror"
                                                            placeholder="Giá" value="{{ $product->price }}">
                                                    </div>
                                                    @error('price')
                                                        <div class="invalid-feedback" style="color: red;margin-bottom:10px;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i
                                                                class="bi bi-box-seam"></i></span>
                                                        <input name="quantity_available" type="text"
                                                            class="form-control @error('quantity_available') is-invalid @enderror"
                                                            placeholder="Số lượng tồn kho"
                                                            value="{{ $product->quantity_available }}">
                                                    </div>
                                                    @error('quantity_available')
                                                        <div class="invalid-feedback" style="color: red;margin-bottom:10px;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <select name="category_id"
                                                        class="form-control pro-edt-select form-control-primary @error('category_id') is-invalid @enderror"
                                                        style="margin-bottom: 15px">
                                                        <option value="">Danh mục sản phẩm</option>
                                                        @if ($categorys)
                                                            @foreach ($categorys as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    @error('category_id')
                                                        <div class="invalid-feedback" style="color: red;margin-bottom:10px;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i
                                                                class="bi bi-bookmark"></i></span>
                                                        <input name="sale_price" type="text"
                                                            class="form-control @error('sale_price') is-invalid @enderror"
                                                            placeholder="Giá giảm" value="{{ $category->sale_price }}">
                                                    </div>
                                                    @error('sale_price')
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
                                                    <a href="{{ route('productList') }}"
                                                        class="btn btn-ctl-bt waves-effect waves-light">Hủy
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-tab-list tab-pane fade" id="reviews">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="pro-edt-img">
                                                                <img src="{{ isset($product->image) ? asset('images/product/' . $product->image) : asset('images/product/5-small.jpg') }}"
                                                                    alt="" id="preview-img-main" />
                                                                <input type="file" id="file-input-main" name="image"
                                                                    style="display:none;">
                                                                <label for="file-input-main"
                                                                    class="custom-file-input">Chọn ảnh</label>
                                                            </div>
                                                            @error('image')
                                                                <div class="invalid-feedback"
                                                                    style="color: red;margin-bottom:10px;">
                                                                    {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="product-edt-pix-wrap">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon">TT</span>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Ảnh đại diện sản phẩm">
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="product-edt-remove">
                                                                                    <button type="button"
                                                                                        id="remove-img-button-main"
                                                                                        class="btn btn-ctl-bt waves-effect waves-light">Xóa
                                                                                        ảnh <i
                                                                                            class="bi bi-eraser"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                        @if ($product->specification)
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="review-content-section">
                                                        <div class="input-group mg-b-pro-edt">
                                                            <span class="input-group-addon"><i
                                                                    class="bi bi-hdd"></i></span>
                                                            <input type="text"
                                                                class="form-control @error('hard_disk') is-invalid @enderror"
                                                                name="hard_disk" placeholder="Ổ cứng"
                                                                value="{{ $product->specification->hard_disk }}">
                                                        </div>
                                                        @error('hard_disk')
                                                            <div class="invalid-feedback"
                                                                style="color: red;margin-bottom:10px;">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <div class="input-group mg-b-pro-edt">
                                                            <span class="input-group-addon"><i
                                                                    class="bi bi-windows"></i></span>
                                                            <input type="text"
                                                                class="form-control @error('OS') is-invalid @enderror"
                                                                name="OS" placeholder="Hệ điều hành"
                                                                value="{{ $product->specification->OS }}">
                                                        </div>
                                                        @error('OS')
                                                            <div class="invalid-feedback"
                                                                style="color: red;margin-bottom:10px;">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <div class="input-group mg-b-pro-edt">
                                                            <span class="input-group-addon"><i
                                                                    class="bi bi-memory"></i></span>
                                                            <input type="text"
                                                                class="form-control @error('ram') is-invalid @enderror"
                                                                name="ram" placeholder="Ram"
                                                                value="{{ $product->specification->ram }}">
                                                        </div>
                                                        @error('ram')
                                                            <div class="invalid-feedback"
                                                                style="color: red;margin-bottom:10px;">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="review-content-section">
                                                        <div class="input-group mg-b-pro-edt">
                                                            <span class="input-group-addon"><i
                                                                    class="bi bi-fullscreen"></i></span>
                                                            <input type="text"
                                                                class="form-control @error('capacity') is-invalid @enderror"
                                                                name="capacity" placeholder="Dung lượng"
                                                                value="{{ $product->specification->capacity }}">
                                                        </div>
                                                        @error('capacity')
                                                            <div class="invalid-feedback"
                                                                style="color: red;margin-bottom:10px;">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <div class="input-group mg-b-pro-edt">
                                                            <span class="input-group-addon"><i
                                                                    class="bi bi-aspect-ratio"></i></span>
                                                            <input type="text"
                                                                class="form-control @error('screen_size') is-invalid @enderror"
                                                                name="screen_size" placeholder="Kích thước màn hình"
                                                                value="{{ $product->specification->screen_size }}">
                                                        </div>
                                                        @error('screen_size')
                                                            <div class="invalid-feedback"
                                                                style="color: red;margin-bottom:10px;">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <div class="input-group mg-b-pro-edt">
                                                            <span class="input-group-addon"><i
                                                                    class="bi bi-gpu-card"></i></span>
                                                            <input type="text"
                                                                class="form-control @error('card_screen') is-invalid @enderror"
                                                                name="card_screen" placeholder="Card màn hình"
                                                                value="{{ $product->specification->card_screen }}">
                                                        </div>
                                                        @error('card_screen')
                                                            <div class="invalid-feedback"
                                                                style="color: red;margin-bottom:10px;">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('file-input-main').addEventListener('change', function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview-img-main');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        });

        document.getElementById('remove-img-button-main').addEventListener('click', function() {
            var defaultImgSrc = "{{ asset('images/product/5-small.jpg') }}";
            var previewImg = document.getElementById('preview-img-main');
            previewImg.src = defaultImgSrc;
            document.getElementById('file-input-main').value = "";
        });
    </script>


@endsection
