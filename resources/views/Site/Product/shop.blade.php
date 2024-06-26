@extends('Site.layout')

@section('title', 'shop')
@section('content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ route('home') }}">Trang chủ<i class="bi bi-chevron-right"></i></a></li>
                            <li class="active"><a href="{{ route('shop') }}">cửa hàng
                                    @if (count($similar))
                                        {{ $similar[0]->category->name }}
                                    @endif
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Product Style -->
    <section class="product-area shop-sidebar shop section" style="padding-top: 50px">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="shop-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget category">
                            <h3 class="title">Danh mục</h3>
                            <ul class="categor-list">
                                @if ($category)
                                    @foreach ($category as $c)
                                        <li><a href="{{ route('shop', ['id' => $c->id]) }}">{{ $c->name }}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Shop By Price -->
                        <div class="single-widget range">
                            <h3 class="title">Giá</h3>
                            <div class="price-filter">
                                <div class="price-filter-inner">
                                    <div id="slider-range"></div>
                                    <div class="price_slider_amount">
                                        <div class="label-input">
                                            <span>Range:</span><input type="text" id="amount" name="price"
                                                placeholder="Add Your Price" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="check-box-list">
                                <li>
                                    <label class="checkbox-inline" for="1"><input name="news" id="1"
                                            type="checkbox">$20 - $50<span class="count">(3)</span></label>
                                </li>
                                <li>
                                    <label class="checkbox-inline" for="2"><input name="news" id="2"
                                            type="checkbox">$50 - $100<span class="count">(5)</span></label>
                                </li>
                                <li>
                                    <label class="checkbox-inline" for="3"><input name="news" id="3"
                                            type="checkbox">$100 - $250<span class="count">(8)</span></label>
                                </li>
                            </ul>
                        </div>
                        <!--/ End Shop By Price -->
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <!-- Shop Top -->
                            <div class="shop-top">
                                <div class="shop-shorter">
                                    <div class="single-shorter">
                                        <form id="sortForm" action="{{ route('shop.sort') }}" method="GET">
                                            @csrf
                                            <label>Sắp xếp :</label>
                                            <select name="criteria" onchange="document.getElementById('sortForm').submit()">
                                                <option value="">Tất cả</option>
                                                <option value="price_asc"
                                                    {{ request('criteria') == 'price_asc' ? 'selected' : '' }}>Giá tăng dần
                                                </option>
                                                <option value="price_desc"
                                                    {{ request('criteria') == 'price_desc' ? 'selected' : '' }}>Giá giảm dần
                                                </option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!--/ End Shop Top -->
                        </div>
                    </div>
                    <div class="row">
                        @if (count($similar))
                            @foreach ($similar as $p)
                                @if ($p->is_stock !== 0)
                                    <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                        <form action="{{ route('addcart', ['id' => $p->id]) }}" method="POST">
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
                                    </div>
                                @endif
                            @endforeach
                            <div class="" style="width: 100%">
                                {!! $similar->appends(request()->query())->links() !!}
                            </div>
                        @else
                            @foreach ($products as $p)
                                @if ($p->is_stock !== 0)
                                    <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                        <form action="{{ route('addcart', ['id' => $p->id]) }}" method="POST">
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
                                    </div>
                                @endif
                            @endforeach
                            <div class="" style="width: 100%">
                                {!! $products->appends(request()->query())->links() !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-modal name="Thêm vào giỏ hàng thành công"></x-modal>
    @include('Site.Product.modal')
    <!--/ End Product Style 1  -->
@endsection
