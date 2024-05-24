@extends('Site.layout')

@section('title', 'cart')
@section('content')

	<!-- Preloader -->
	{{-- <div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div> --}}
	<!-- End Preloader -->

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Trang chủ<i class="bi bi-chevron-right"></i></a></li>
                            <li class="active"><a href="#">Giỏ hàng</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Shopping Summery -->
                    <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th class="text-uppercase">Ảnh</th>
                                <th class="text-uppercase">Sản phẩm</th>
                                <th class="text-center text-uppercase">Giá</th>
                                <th class="text-center text-uppercase">Số lượng</th>
                                <th class="text-center text-uppercase">Tổng tiền</th>
                                <th class="text-center text-uppercase"><i class="bi bi-trash3"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="image" data-title="No"><img src="https://via.placeholder.com/100x100"
                                        alt="#"></td>
                                <td class="product-des" data-title="Description">
                                    <p class="product-name"><a href="#">Women Dress</a></p>
                                    <p class="product-des">Maboriosam in a tonto nesciung eget distingy magndapibus.</p>
                                </td>
                                <td class="price" data-title="Price"><span>$110.00 </span></td>
                                <td class="qty" data-title="Qty"><!-- Input Order -->
                                    <div class="input-group">
                                        <div class="button minus">
                                            <button type="button" class="btn btn-primary btn-number" disabled="disabled"
                                                data-type="minus" data-field="quant[1]">
                                                <i class="bi bi-dash"></i>
                                            </button>
                                        </div>
                                        <input type="text" name="quant[1]" class="input-number" data-min="1"
                                            data-max="100" value="1">
                                        <div class="button plus">
                                            <button type="button" class="btn btn-primary btn-number" data-type="plus"
                                                data-field="quant[1]">
                                                <i class="bi bi-plus-lg"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!--/ End Input Order -->
                                </td>
                                <td class="total-amount" data-title="Total"><span>$220.88</span></td>
                                <td class="action" data-title="Remove"><a href="#"><i class="bi bi-trash3"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                    <!--/ End Shopping Summery -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-5 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Nhập mã giảm giá">
                                            <button class="btn">Áp dụng</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-7 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Tạm tính<span>$330.00</span></li>
                                        <li>Phí ship<span>Free</span></li>
                                        <li>Giảm giá<span>$20.00</span></li>
                                        <li class="last">Tổng tiền<span>$310.00</span></li>
                                    </ul>
                                    <div class="button5">
                                        <a href="#" class="btn">Thanh toán</a>
                                        <a href="#" class="btn">Tiếp tục mua sắm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->

@endsection
