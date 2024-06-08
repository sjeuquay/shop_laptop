@extends('Site.layout')

@section('title', 'Home')
@section('content')
    <!-- Slider Area -->
    <section class="hero-slider">
        <!-- Single Slider -->
        <div class="single-slider">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-9 col-12">
                        <div class="text-inner">
                            <div class="row">
                                <div class="col-lg-7 col-12">
                                    <div class="hero-text">
                                        <h1 class="text-uppercase"><span>Giảm giá 100% </span>khi mua 50 máy</h1>
                                        <div class="button">
                                            <a href="{{ route('shop') }}" class="btn">Đến shop</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Single Slider -->
    </section>
    <!--/ End Slider Area -->

    <!-- Start Product Area -->
    <div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="text-uppercase">Sản Phẩm Mới</h2>
                        <p>Các dòng máy được mua nhiều nhất tại cửa hàng</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-info">
                        <div class="nav-main">
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <!-- Start Single Tab -->
                            <div class="tab-pane fade show active" id="man" role="tabpanel">
                                <div class="tab-single">
                                    @if (!empty($products))
                                        <div class="row">
                                            @foreach ($products as $p)
                                                @if ($p->is_stock !== 0)
                                                    <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                                        <form action="{{ route('addcart', ['id' => $p->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="single-product">
                                                                <div class="product-img">
                                                                    <a href="{{ route('product', ['id' => $p->id]) }}">
                                                                        <img class="default-img"
                                                                            style="width: 235px;height:200px"
                                                                            src="{{ asset('images/product/' . $p->image) }}"
                                                                            alt="#">
                                                                        <img class="hover-img"
                                                                            style="width: 235px;height:200px"
                                                                            src="{{ asset('images/product/' . $p->image) }}"
                                                                            alt="#">
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
                                                                                <button
                                                                                    class="addToCartButton border-0 addToCart"
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
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Area -->

    <!-- view product -->
    <div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="text-uppercase">Sản Phẩm Nhiều lượt xem</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-info">
                        <div class="nav-main">
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <!-- Start Single Tab -->
                            <div class="tab-pane fade show active" id="man" role="tabpanel">
                                <div class="tab-single">
                                    @if (!empty($productsView))
                                        <div class="row">
                                            @foreach ($productsView as $p)
                                                @if ($p->is_stock !== 0)
                                                    <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                                        <form action="{{ route('addcart', ['id' => $p->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="single-product">
                                                                <div class="product-img">
                                                                    <a href="{{ route('product', ['id' => $p->id]) }}">
                                                                        <img class="default-img"
                                                                            src="{{ asset('images/product/' . $p->image) }}"
                                                                            alt="#">
                                                                        <img class="hover-img"
                                                                            src="{{ asset('images/product/' . $p->image) }}"
                                                                            alt="#">
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
                                                                                <button
                                                                                    class="addToCartButton border-0 addToCart"
                                                                                    type="button"
                                                                                    style="background-color:transparent;outline:none;"><a
                                                                                        title="Add to cart">Thêm vào giỏ
                                                                                        hàng</a></button>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="product-content">
                                                                    <h3><a>{{ $p->name }}</a>
                                                                    </h3>
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
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End view product -->

    <!-- Start Midium Banner  -->
    <section class="midium-banner">
        <div class="container">
            <div class="row">
                <!-- Single Banner  -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner">
                        <img style="max-height: 350px" src="{{ asset('images/top-view.jpg') }}" alt="#">
                        <div class="content">
                            <p>Siêu ưu đãi</p>
                            <h3>Mỗi máy tính <br>giảm<span> 50%</span></h3>
                            <a href="#">Đến shop</a>
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
                <!-- Single Banner  -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner">
                        <img style="max-height: 312px;"
                            src="{{ asset('images/1000_F_203928663_lDjpCjSmcupWGV8jLPHs0a9HsWe9A08m.jpg') }}"
                            alt="#">
                        <div class="content">
                            <p>Khuyến mãi</p>
                            <h3>Mua máy<br>tặng <span>Card 500gb</span></h3>
                            <a href="#" class="btn">Đến shop</a>
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
            </div>
        </div>
    </section>
    <!-- End Midium Banner -->

    <!-- Start Most Popular -->
    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Sản phẩm nổi bật</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owcarousell- popular-slider">
                        <!-- Start Single Product -->
                        @if ($productsHot)
                            @foreach ($productsHot as $p)
                                @if ($p->is_stock !== 0)
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
                                                                    title="Add to cart">Thêm vào giỏ hàng</a></button>
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
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Most Popular Area -->

    <!-- Start Shop Blog  -->
    <section class="shop-blog section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Bài viết</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog  -->
                    <div class="shop-single-blog">
                        <img src="https://via.placeholder.com/370x300" alt="#">
                        <div class="content">
                            <p class="date">22 July , 2020. Monday</p>
                            <a href="#" class="title">Sed adipiscing ornare.</a>
                            <a href="#" class="more-btn">Continue Reading</a>
                        </div>
                    </div>
                    <!-- End Single Blog  -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog  -->
                    <div class="shop-single-blog">
                        <img src="https://via.placeholder.com/370x300" alt="#">
                        <div class="content">
                            <p class="date">22 July, 2020. Monday</p>
                            <a href="#" class="title">Man’s Fashion Winter Sale</a>
                            <a href="#" class="more-btn">Continue Reading</a>
                        </div>
                    </div>
                    <!-- End Single Blog  -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog  -->
                    <div class="shop-single-blog">
                        <img src="https://via.placeholder.com/370x300" alt="#">
                        <div class="content">
                            <p class="date">22 July, 2020. Monday</p>
                            <a href="#" class="title">Women Fashion Festive</a>
                            <a href="#" class="more-btn">Continue Reading</a>
                        </div>
                    </div>
                    <!-- End Single Blog  -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Blog  -->

    <x-modal name="Thêm vào giỏ hàng thành công"></x-modal>

    @include('Site.Product.modal')
@endsection
