@extends('Site.layout')

@section('title', 'checkout')
@section('content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index1.html">Trang chủ<i class="bi bi-chevron-right"></i></a></li>
                            <li class="active"><a href="blog-single.html">Thanh toán</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
    @if (session('error'))
        <div class="container">
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        </div>
    @endif
    <!-- Start Checkout -->
    <section class="shop checkout section">
        <div class="container">
            <form class="form" method="POST" action="#">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="checkout-form">
                            <h2 class="text-uppercase">Hoàn tất thanh toán tại đây</h2>
                            <p>Vui lòng đăng ký để thanh toán nhanh chóng hơn</p>
                            <!-- Form -->
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Họ và Tên<span>*</span></label>
                                        <input type="text" name="name" placeholder=""
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name', auth()->user()->name) }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Địa chỉ email<span>*</span></label>
                                        <input type="text" name="email" placeholder=""
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email', auth()->user()->email) }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Số điện thoại<span>*</span></label>
                                        <input type="text" name="phone" placeholder=""
                                            class="form-control @error('phone') is-invalid @enderror"
                                            value="{{ old('phone', auth()->user()->phone) }}">
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Mã bưu điện<span>*</span></label>
                                        <input type="text" name="zip" placeholder=""
                                            class="form-control @error('zip') is-invalid @enderror"
                                            value="{{ old('zip') }}">
                                        @error('zip')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Địa chỉ 1<span>*</span></label>
                                        <input type="text" name="ship_address1" placeholder=""
                                            class="form-control @error('ship_address1') is-invalid @enderror"
                                            value="{{ old('ship_address1', auth()->user()->address) }}">
                                        @error('ship_address1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Địa chỉ 2<span></span></label>
                                        <input type="text" name="ship_address2" placeholder=""
                                            class=" @error('ship_address2') is-invalid @enderror"
                                            value="{{ old('ship_address2') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label>Ghi chú<span></span></label>
                                        <textarea class="form-control" name="customer_notes" id="" cols="30" rows="6"
                                            class=" @error('customer_notes') is-invalid @enderror" value="{{ old('customer_notes') }}"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Form -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="order-details">
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>TỔNG ĐƠN HÀNG</h2>
                                <div class="content">
                                    <ul>
                                        @if (session()->has('cartTotal' . Auth::id()))
                                            @php
                                                $cart = session('cartTotal' . Auth::id());
                                            @endphp
                                            <li>Tổng phụ<span>{{ number_format($cart->total_price) }}₫</span></li>
                                            <li class="last">Tổng<span>{{ number_format($cart->total_price) }}₫</span>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <!--/ End Order Widget -->

                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>Thanh toán</h2>
                                <div class="content">
                                    <div class="d-flex flex-column py-3 px-4">
                                        <label for="1" class="d-flex">
                                            <input style="width: auto;background-color:transparent;outline:none;"
                                                name="paymentMethod" id="1"
                                                class="form-control @error('paymentMethod') is-invalid @enderror"
                                                type="radio" value="Thanh toán cổng thanh toán"> Thanh toán cổng thanh
                                            toán
                                        </label>
                                        <label for="2" class="d-flex">
                                            <input style="width: auto" name="paymentMethod" id="2" type="radio"
                                                class="form-control @error('paymentMethod') is-invalid @enderror"
                                                value="Thanh toán khi nhận hàng">Thanh toán khi nhận
                                            hàng
                                        </label>
                                        {{-- <label class="checkbox-inline" for="3"><input name="news" id="3"
                                                type="checkbox"> PayPal</label> --}}
                                    </div>
                                </div>
                            </div>
                            <!--/ End Order Widget -->

                            <!-- Button Widget -->
                            <div class="single-widget get-button">
                                <div class="content">
                                    <div class="button">
                                        <button href="#" class="btn">Tiến hành thanh toán</button>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Button Widget -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!--/ End Checkout -->
@endsection
