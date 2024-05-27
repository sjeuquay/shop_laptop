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
                            <div id="img-1" class="zoom Wrapper single-zoom">
                                <a href="#" class="d-flex justify-content-center" style="">
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
                                    style="color: #000;opacity:1;font-weight:600;letter-spacing:3px;font-size:26px;line-height:30px;">
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
                                        style="font-size: 30px;">{{ number_format($product->sale_price) }} ₫</span>
                                    <span class="current_price" style="font-size: 20px">
                                        <del style="opacity:0.5;">{{ number_format($product->price) }} ₫</del>
                                    </span>
                                </div>
                                <div class="product_desc">
                                    <p>{{ $product->short_description }} </p>
                                </div>

                                <div class="product_variant color">
                                    <h3>Bảo hành 1 năm kể từ ngày mua</h3>
                                </div>
                                <div class="product_variant quantity">
                                    {{-- <button id="buyNowButton" class="button" type="submit" name="action" value="buy_now">Mua ngay</button> --}}
                                    @if (auth()->check())
                                        <button class="button addToCartButton" type="submit">Thêm vào giỏ
                                            hàng</button>
                                    @else
                                        <button id="addToCartButton" class="button addToCartButton" type="button">Thêm vào
                                            giỏ
                                            hàng</button>
                                    @endif
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
                                                <span>{{ number_format($p->sale_price) }} ₫</span>
                                                <del class="" style="opacity:0.5;">{{ number_format($p->price) }}
                                                    ₫</del>
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

    <div id="cartModal" class="modal">
        <div class="modal-content h-100 border-0">
            <span id="closeModal" class="close">&times;</span>
            <div class="h-100 d-flex flex-column align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#ff6a28"
                    class="bi bi-handbag" viewBox="0 0 16 16">
                    <path
                        d="M8 1a2 2 0 0 1 2 2v2H6V3a2 2 0 0 1 2-2m3 4V3a3 3 0 1 0-6 0v2H3.36a1.5 1.5 0 0 0-1.483 1.277L.85 13.13A2.5 2.5 0 0 0 3.322 16h9.355a2.5 2.5 0 0 0 2.473-2.87l-1.028-6.853A1.5 1.5 0 0 0 12.64 5zm-1 1v1.5a.5.5 0 0 0 1 0V6h1.639a.5.5 0 0 1 .494.426l1.028 6.851A1.5 1.5 0 0 1 12.678 15H3.322a1.5 1.5 0 0 1-1.483-1.723l1.028-6.851A.5.5 0 0 1 3.36 6H5v1.5a.5.5 0 1 0 1 0V6z" />
                </svg>
                <p class="py-4">Vui lòng đăng nhập để mua hàng và thanh toán dễ dàng hơn</p>
                <div class="d-flex">
                    <div class="mx-2">
                        <a href="{{ route('register') }}" class="btn btn-outline-dark btn-register_product">Đăng Ký</a>
                    </div>
                    <div class="mx-2">
                        <a href="{{ route('login') }}" class="btn text-white btn-dark btn-login_product">Đăng Nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Overlay -->
    <div id="modalOverlay" class="overlay"></div>

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


        document.addEventListener('DOMContentLoaded', function() {
            var addToCartButton = document.getElementById('addToCartButton');
            var modal = document.getElementById('cartModal');
            var overlay = document.getElementById('modalOverlay');
            var closeModal = document.getElementById('closeModal');

            // Show modal and overlay when "Thêm vào giỏ hàng" button is clicked
            addToCartButton.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default action
                modal.classList.add('show');
                overlay.style.display = 'block';
            });

            // Hide modal and overlay when the close button is clicked
            closeModal.addEventListener('click', function() {
                modal.classList.remove('show');
                overlay.style.display = 'none';
            });

            // Hide modal and overlay when the overlay is clicked
            overlay.addEventListener('click', function() {
                modal.classList.remove('show');
                overlay.style.display = 'none';
            });
        });
    </script>
    <!-- Main JS -->
@endsection
