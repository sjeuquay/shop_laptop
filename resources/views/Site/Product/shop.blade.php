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
                                                <option value="price_asc" {{ request('criteria') == 'price_asc' ? 'selected' : '' }}>Giá tăng dần</option>
                                                <option value="price_desc" {{ request('criteria') == 'price_desc' ? 'selected' : '' }}>Giá giảm dần</option>
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
                                <div class="col-xl-3 col-lg-4 col-md-4 col-12">
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
                                                        onclick="openHomeModal({{ $p->id }})"><i
                                                            class="bi bi-eye"></i><span>Chi tiết</span></a>
                                                    <a title="Wishlist" href="#"><i class="bi bi-heart"></i><span>Yêu
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
                                </div>
                            @endforeach
                            <nav aria-label="Page navigation example" style="width:100%">
                                <ul class="pagination d-flex justify-content-center">
                                    <!-- Liên kết đến trang trước đó -->
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $similar->previousPageUrl() }}"
                                            aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>

                                    <!-- Hiển thị các trang -->
                                    @for ($i = 1; $i <= $similar->lastPage(); $i++)
                                        <li class="page-item {{ $similar->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $similar->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    <!-- Liên kết đến trang kế tiếp -->
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $similar->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        @else
                            @foreach ($products as $p)
                                <div class="col-xl-3 col-lg-4 col-md-4 col-12">
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
                                                        onclick="openHomeModal({{ $p->id }})"><i
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
                                </div>
                            @endforeach
                            <nav aria-label="Page navigation example" style="width:100%">
                                <ul class="pagination d-flex justify-content-center">
                                    <!-- Liên kết đến trang trước đó -->
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $products->previousPageUrl() }}"
                                            aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>

                                    <!-- Hiển thị các trang -->
                                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                                        <li class="page-item {{ $products->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    <!-- Liên kết đến trang kế tiếp -->
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Product Style 1  -->
@endsection
