@extends('Site.layout')

@section('title', 'product')
@section('content')

    <!-- Main Style CSS -->
    @push('product')
    <link rel="stylesheet" href="{{ asset('css/Site/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Site/plugins.css') }}">
    @endpush

    <div class="py-5">
        <!--product details start-->
        <div class="product_details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <div class="product-details-tab">
                            <div id="img-1" class="zoomWrapper single-zoom">
                                <a href="#">
                                    <img id="zoom1" src="{{ asset('images/product/' . $product->image) }}"
                                        data-zoom-image="{{ asset('images/product/' . $product->image) }}"
                                        class="img-main_product">
                                </a>
                            </div>

                            @if (!empty($thumbnail))
                                <div class="thumbnail-container">
                                    <ul class="px-0">
                                        <li class="thumbnail-items">
                                            <a href="#" class="thumbnail-link"
                                                data-image="{{ asset('images/product/' . $product->image) }}">
                                                <img src="{{ asset('images/product/' . $product->image) }}" alt=""
                                                    class="thumbnail-img">
                                            </a>
                                        </li>
                                    </ul>
                                    @foreach ($thumbnail as $n)
                                        <ul class="px-0">
                                            <li class="thumbnail-items">
                                                <a href="#" class="thumbnail-link"
                                                    data-image="{{ asset('images/product/' . $n->img_thumnail) }}">
                                                    <img src="{{ asset('images/product/' . $n->img_thumnail) }}"
                                                        alt="" class="thumbnail-img">
                                                </a>
                                            </li>
                                        </ul>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="product_d_right">
                            <form action="{{ route('addcart', ['id' => $product->id]) }}" method="POST">
                                @csrf
                                <h1 class="text-uppercase"
                                    style="color: #000;opacity:1;font-weight:600;letter-spacing:3px;font-size:26px;">
                                    {{ $product->name }}</h1>
                                <div class=" product_ratting">
                                    <ul class="px-0">
                                        <li><a href="#"><i class="bi bi-star-fill"></i></a></li>
                                        <li><a href="#"><i class="bi bi-star-fill"></i></a></li>
                                        <li><a href="#"><i class="bi bi-star-fill"></i></a></li>
                                        <li><a href="#"><i class="bi bi-star-fill"></i></a></li>
                                        <li><a href="#"><i class="bi bi-star-fill"></i></a></li>
                                        <li class="review"><a href="#"> 1 đánh giá</a></li>
                                    </ul>
                                </div>
                                <div class="product_price">
                                    <span class="current_price"
                                        style="font-size: 30px;">{{ number_format($product->sale_price) }} VND</span>
                                    <span class="current_price" style="font-size: 20px">
                                        <del style="opacity:0.5;">{{ number_format($product->price) }} VND</del>
                                    </span>
                                </div>
                                <div class="product_desc">
                                    <p>{{ $product->short_description }} </p>
                                </div>

                                <div class="product_variant color">
                                    <h3>Bảo hành 1 năm kể từ ngày mua</h3>
                                </div>
                                <div class="product_variant quantity">
                                    <button class="button" type="submit" name="action" value="buy_now">Mua ngay</button>
                                    <button id="addToCartButton" class="button addToCartButton" type="submit">Thêm vào giỏ
                                        hàng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--product details end-->

        <!--product info start-->
        <div class="product_d_info">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_d_inner">
                            <div class="product_info_button">
                                <ul class="nav" role="tablist">
                                    <li>
                                        <a class="active" data-toggle="tab" href="#info" role="tab"
                                            aria-controls="info" aria-selected="false">Mô tả</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"
                                            aria-selected="false">Thông số kỹ thuật</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                            aria-selected="false">Đánh giá</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="info" role="tabpanel">
                                    <div class="product_info_content">
                                        <p>{{ $product->description }}</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="sheet" role="tabpanel">
                                    <div class="product_d_table">
                                        <form action="#">
                                            <table>
                                                <tbody>
                                                    @if (isset($specifications))
                                                        <tr>
                                                            <td class="first_child">Hãng</td>
                                                            <td>{{ $specifications->company }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="first_child">Dòng máy</td>
                                                            <td>{{ $specifications->type }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="first_child">Ram</td>
                                                            <td>{{ $specifications->ram }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="first_child">Dung lượng</td>
                                                            <td>{{ $specifications->Capacity }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="first_child">Kích thước màn hình</td>
                                                            <td>{{ $specifications->screen_size }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="first_child">card màn hình</td>
                                                            <td>{{ $specifications->card_screen }}</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <div class="product_review_form">
                                        <form action="#">
                                            <h2>Gửi đánh giá của bạn</h2>
                                            <p>Địa chỉ email của bạn sẽ được bảo mật</p>
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="review_comment">Đánh giá của bạn</label>
                                                    <textarea name="comment" id="review_comment"></textarea>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="author">Tên</label>
                                                    <input id="author" type="text">

                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="email">Email </label>
                                                    <input id="email" type="text">
                                                </div>
                                            </div>
                                            <button type="submit">Gửi</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--product info end-->

        <!-- Start Most Popular -->
        <div class="product-area most-popular section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2 class="text-uppercase">Các dòng máy tương tự</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="owcarousell- popular-slider">
                            <!-- Start Single Product -->
                            @if ($similar)
                                @foreach ($similar as $p)
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="{{ route('product', ['id' => $p->id]) }}">
                                                <img class="default-img" src="{{ asset('images/product/' . $p->image) }}"
                                                    alt="#">
                                                <img class="hover-img" src="{{ asset('images/product/' . $p->image) }}"
                                                    alt="#">
                                            </a>
                                            <div class="button-head">
                                                <div class="product-action">
                                                    <a data-toggle="modal" data-target="#exampleModal" title="Quick View"
                                                        href="{{ route('product', ['id' => $p->id]) }}"><i
                                                            class="bi bi-eye"></i><span>Chi tiết</span></a>
                                                    <a title="Wishlist" href="#"><i
                                                            class="bi bi-heart"></i><span>Yêu
                                                            thích</span></a>
                                                </div>
                                                <div class="product-action-2">
                                                    <a title="Add to cart" href="#">Thêm vào giỏ
                                                        hàng</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h3><a>{{ $p->name }}</a></h3>
                                            <div class="product-price">
                                                <span>{{ number_format($p->sale_price) }} VND</span>
                                                <del class="" style="opacity:0.5;">{{ number_format($p->price) }}
                                                    VND</del>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Most Popular Area -->
    </div>

    <link rel="stylesheet" href="{{ asset('js/Site/plugins.js') }}">
    <link rel="stylesheet" href="{{ asset('js/Site/main.js') }}">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var thumbnails = document.querySelectorAll('.thumbnail-link');
            var mainImage = document.getElementById('zoom1');

            thumbnails.forEach(function(thumbnail) {
                // Lắng nghe sự kiện click
                thumbnail.addEventListener('click', function(event) {
                    event.preventDefault(); // Ngăn chặn hành động mặc định của thẻ a
                    var newImageSrc = this.getAttribute(
                        'data-image'); // Lấy đường dẫn ảnh từ thuộc tính data-image
                    mainImage.src = newImageSrc; // Thay đổi đường dẫn ảnh của thẻ chính
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Chọn nút "Thêm vào giỏ hàng"
            var addToCartButton = document.getElementById('addToCartButton');

            // Bắt sự kiện click trên nút "Thêm vào giỏ hàng"
            addToCartButton.addEventListener('click', function(event) {
                // Ngăn chặn hành vi mặc định của sự kiện click
                event.preventDefault();

                // Thực hiện xử lý của bạn, chẳng hạn thêm sản phẩm vào giỏ hàng

                // Sau khi xử lý, chuyển hướng người dùng đến trang sản phẩm hoặc trang mục tiêu khác
                window.location.href =
                "{{ route('product', ['id' => $product->id]) }}"; // Điều này giả định rằng bạn muốn chuyển hướng người dùng đến trang sản phẩm sau khi họ thêm vào giỏ hàng
            });
        });
    </script>

    <!-- Main JS -->
@endsection
