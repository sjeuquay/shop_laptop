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
                                        style="font-size: 30px;">{{ $product->sale_price > 0 ? number_format($product->sale_price) : number_format($product->price) }}
                                        ₫</span>
                                    @if ($product->sale_price > 0)
                                        <span class="current_price" style="font-size: 20px">
                                            <del style="opacity:0.5;">{{ number_format($product->price) }} ₫</del>
                                        </span>
                                    @endif
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
                                        <button class="button addToCartButton w-75" type="submit">Thêm vào giỏ
                                            hàng</button>
                                    @else
                                        <button id="addToCartButton" class="button addToCartButton w-75" type="button">Thêm
                                            vào
                                            giỏ
                                            hàng</button>
                                    @endif
                                    <button class="button" style="font-size:20px;"><i class="bi bi-heart"></i></button>
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
                                    <form action="{{ route('addcart', ['id' => $p->id]) }}" method="POST">
                                        @csrf
                                        <div class="single-product">
                                            <div class="product-img">
                                                <a href="{{ route('product', ['id' => $p->id]) }}">
                                                    <img class="default-img"
                                                        src="{{ asset('images/product/' . $p->image) }}" alt="#">
                                                    <img class="hover-img"
                                                        src="{{ asset('images/product/' . $p->image) }}" alt="#">
                                                </a>
                                                <div class="button-head">
                                                    <div class="product-action">
                                                        <a title="Wishlist" href="#"><i
                                                                class="bi bi-heart"></i><span>Yêu
                                                                thích</span></a>
                                                    </div>
                                                    <div class="product-action-2">
                                                        @if (auth()->check())
                                                            <button class="border-0" type="submit"
                                                                style="background-color:transparent;outline:none;"><a
                                                                    title="Add to cart">Thêm vào giỏ
                                                                    hàng</a></button>
                                                        @else
                                                            <button class="addToCartButton border-0 addToCart"
                                                                type="button"
                                                                style="background-color:transparent;outline:none;"><a
                                                                    title="Add to cart">Thêm vào giỏ
                                                                    hàng</a></button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3><a>{{ $p->name }}</a></h3>
                                                <div class="product-price">
                                                    <span>{{ $p->sale_price > 0 ? number_format($p->sale_price) : number_format($p->price) }}
                                                        ₫</span>
                                                    @if ($p->sale_price > 0)
                                                        <del class=""
                                                            style="opacity:0.5;">{{ number_format($p->price) }}
                                                            ₫</del>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Most Popular Area -->
    </div>

    {{-- không cho đặt hàng --}}
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
                        <a href="{{ route('register') }}" class="btn  btn-register_product">Đăng Ký</a>
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

    <!-- modal thanh toán thành công  -->
    <div id="cartSuccessModal" class="custom-modal">
        <div class="modal-content border-0" style="height:100%;">
            <div class="text-center">
                <p style="font-size: 20px;color:green;"><i class="bi bi-bag-check"></i></p>
                <p class="text-success">Thêm vào giỏ hàng thành công</p>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="{{ asset('js/Site/plugins.js') }}">
    <link rel="stylesheet" href="{{ asset('js/Site/main.js') }}">
    {{-- modal thêm thành công --}}
    @push('modal')
        @if (session('success'))
            <script>
                $(document).ready(function() {
                    // Hiển thị modal
                    $('#cartSuccessModal').show();

                    // Tự động ẩn modal sau 3 giây
                    setTimeout(function() {
                        $('#cartSuccessModal').hide();
                    }, 3000);
                });

                // Hàm để ẩn modal
                function hideModal() {
                    $('#cartSuccessModal').hide();
                }
            </script>
        @endif
    @endpush
    <!-- Main JS -->
@endsection
