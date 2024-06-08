@extends('Site.layout')

@section('title', 'Chi tiết đơn hàng')
@section('content')

    <div class="container py-5">
        <div id="ui-view" data-select2-id="ui-view">
            <div>
                <div class="card">
                    <div class="card-header align-items-center d-flex justify-content-between">
                        <div class="">
                            Mã đơn hàng:
                            <strong>#ASBF0{{ $order->id }}</strong>
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
                                <div>{{ $order->user->name }}</div>
                                <div>{{ $order->ship_address1 }}</div>
                                @if (($order->ship_address2))
                                    <div>{{ $order->ship_address2 }}</div>
                                @endif
                                <div>{{ $order->email }}</div>
                                <div>{{ $order->phone }}</div>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="mb-3 text-uppercase">Người nhận:</h6>
                                <div>{{ $order->user->name }}</div>
                                <div>{{ $order->ship_address1 }}</div>
                                @if ($order->ship_address2)
                                    <div>{{ $order->ship_address2 }}</div>
                                @endif
                                <div>{{ $order->email }}</div>
                                <div>{{ $order->phone }}</div>
                            </div>
                        </div>

                        <div class="table-responsive-sm table-order_confirm">
                            <table class="table table-striped table-order-header">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>Sản phẩm</th>
                                        <th>Mô tả</th>
                                        <th class="text-center">Giá</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-center">Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($order->orderDetail as $key => $orderItem)
                                        <tr>
                                            <td class="center">{{ $key + 1 }}</td>
                                            <td class="text-left text-truncate" style="max-width: 150px;">
                                                {{ $orderItem->product->name }}</td>
                                            <td class="text-left text-truncate" style="max-width: 150px;">
                                                {{ $orderItem->product->short_description }}</td>
                                            <td class="text-center">{{ number_format($orderItem->unit_price) }}₫</td>
                                            <td class="text-center">{{ $orderItem->quantity }}</td>
                                            <td class="text-center">{{ number_format($orderItem->sub_price) }}₫</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-sm-5">
                                <p style="font-weight:600;">Lời nhắn</p>
                                <p>{{ $order->customer_notes }}</p>
                            </div>
                            <div class="col-lg-4 col-sm-5 ml-auto">
                                <table class="table table-clear" style="height:auto;">
                                    <tbody>
                                        <tr class="text-end">
                                            <td class="left">
                                                <strong>Tổng phụ</strong>
                                            </td>
                                            <td class="right text-center">{{ number_format($order->pay_amount) }}₫</td>
                                        </tr>
                                        <tr class="text-end">
                                            <td class="left">
                                                <strong>VAT (0%)</strong>
                                            </td>
                                            <td class="right text-center">0</td>
                                        </tr>
                                        <tr class="text-end">
                                            <td class="left">
                                                <strong>Tổng tiền</strong>
                                            </td>
                                            <td class="right text-center">
                                                <strong>{{ number_format($order->pay_amount) }}₫</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-success text-white w-100 mx-1 text-center px-0"
                                        href="{{ route('orderHistory') }} " data-abc="true">
                                        <i class="bi bi-box-arrow-left mx-2"></i>Quay lại</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
