@extends('Site.layout')

@section('title', 'orderConfirmation')
@section('content')

    <div class="container p-5">
        <div id="ui-view" data-select2-id="ui-view">
            <div>
                <div class="card">
                    <div class="card-header align-items-center d-flex justify-content-between">
                        <div class="">
                            Mã đơn hàng:
                            <strong>#ASBF02</strong>
                        </div>
                        <div class="">
                            <a class="btn text-white btn-outline-dark float-right mr-1 d-print-none" href="#"
                                onclick="javascript:window.print();" data-abc="true">
                                <i class="bi bi-printer"></i> Print</a>
                            <a class="btn btn-outline-light text-white btn-info float-right mr-1 d-print-none"
                                href="#" data-abc="true">
                                <i class="bi bi-download"></i> Save</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-4">
                                <h6 class="mb-3 text-uppercase">Người đặt:</h6>
                                <div>
                                    <strong>BBBootstrap.com</strong>
                                </div>
                                <div>42, Awesome Enclave</div>
                                <div>New York City, New york, 10394</div>
                                <div>Email: admin@bbbootstrap.com</div>
                                <div>Phone: +48 123 456 789</div>
                            </div>
                        </div>

                        <div class="table-responsive-sm table-order_confirm">
                            <table class="table table-striped table-order-header">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>Sản phẩm</th>
                                        <th>Mô tả</th>
                                        <th class="center">Giá</th>
                                        <th class="right">Số lượng</th>
                                        <th class="right">Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="center">1</td>
                                        <td class="left">Iphone 10</td>
                                        <td class="left">Apple iphoe 10 with extended warranty</td>
                                        <td class="center">16</td>
                                        <td class="right">$999,00</td>
                                        <td class="right">$999,00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-sm-5">
                                <p style="font-weight:600;">Lời nhắn</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo modi vero quisquam dolor
                                    maxime voluptatum adipisci soluta voluptatem doloribus, odio commodi dolorem libero. Non
                                    corrupti voluptas culpa minus quas quasi!</p>
                            </div>
                            <div class="col-lg-4 col-sm-5 ml-auto">
                                <table class="table table-clear" style="height:auto;">
                                    <tbody>
                                        <tr class="text-end">
                                            <td class="left">
                                                <strong>Tổng phụ</strong>
                                            </td>
                                            <td class="right text-center">$8.497,00</td>
                                        </tr>
                                        <tr class="text-end">
                                            <td class="left" >
                                                <strong>VAT (0%)</strong>
                                            </td>
                                            <td class="right text-center">0</td>
                                        </tr>
                                        <tr class="text-end">
                                            <td class="left">
                                                <strong>Tổng tiền</strong>
                                            </td>
                                            <td class="right text-center">
                                                <strong>$7.477,36</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-success text-white w-100 mx-1 text-center px-0"
                                        href="{{ route('shop') }} " data-abc="true">
                                        <i class="bi bi-bag-plus mx-1"></i>Mua sắm</a>
                                    <a class="btn btn-success text-white w-100 mx-1 text-center px-0"
                                        href="{{ route('home') }} " data-abc="true">
                                        <i class="bi bi-check-circle mx-1"></i> Xác nhận</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
