@extends('admin.layout')
@section('title', 'Chỉnh sửa đơn hàng')
@section('admin')

    <div class="single-product-tab-area mg-b-30" style="margin-top: 10px;">
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-tab-pro-inner">
                            <ul id="myTab3" class="tab-review-design">
                                <li class="active"><a href="#description"><i class="bi bi-pencil"></i>
                                        Thông tin đơn hàng</a></li>
                                <li><a href="#reviews"><i class="bi bi-boxes"></i> Đơn hàng</a>
                                </li>
                            </ul>
                            <form action="{{ route('postOrderEdit', ['id' => $order->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row" style="margin-bottom:20px;">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                    <div style="width:100%;"
                                                        class="group-admin-input input-group mg-b-pro-edt ">
                                                        <span class="input-group-addon">Mã đơn hàng</span>
                                                        <input name="id" type="text" disabled class="form-control"
                                                            style="color: #000 !important" value="{{ $order->id }}">
                                                    </div>
                                                    <div style="width:100%;"
                                                        class="group-admin-input input-group mg-b-pro-edt ">
                                                        <span class="input-group-addon">Người đặt</span>
                                                        <input name="name" type="text" disabled class="form-control"
                                                            style="color: #000 !important" value="{{ $order->name }}">
                                                    </div>
                                                    <div style="width:100%;"
                                                        class="group-admin-input input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Email</span>
                                                        <input type="text" name="email" disabled class="form-control"
                                                            style="color: #000 !important" value="{{ $order->email }}">
                                                    </div>
                                                    <div style="width:100%;"
                                                        class="group-admin-input input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Số điện thoại</span>
                                                        <input type="text" name="phone" disabled class="form-control"
                                                            style="color: #000 !important" value="{{ $order->phone }}">
                                                    </div>
                                                    <div style="width:100%;"
                                                        class="group-admin-input input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Ghi chú</span>
                                                        <textarea class="form-control" style="color: #000 !important" name="customer_notes" cols="30" rows="4"
                                                            disabled>{{ $order->customer_notes }}</textarea>
                                                    </div>
                                                    <div style="width:100%;"
                                                        class="group-admin-input input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Trạng thái</span>
                                                        <select name="status_id"  {!! $order->status->id >= 4 ? 'disabled style="color:#000"' : '' !!}
                                                            class="form-control pro-edt-select form-control-primary">
                                                            @foreach ($statuses as $status)
                                                                <option value="{{ $status->id }}"
                                                                    {{ $order->status_id == $status->id ? 'selected' : '' }}>
                                                                    {{ $status->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                    <div style="width:100%;"
                                                        class="group-admin-input input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Số lượng</span>
                                                        <input name="amount" type="text" disabled class="form-control"
                                                            style="color: #000 !important" value="{{ $order->amount }}">
                                                    </div>
                                                    <div style="width:100%;"
                                                        class="group-admin-input input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Tổng tiền</span>
                                                        <input name="pay_amount" type="text" disabled
                                                            class="form-control" style="color: #000 !important"
                                                            value="{{ $order->pay_amount }}">
                                                    </div>
                                                    <div style="width:100%;"
                                                        class="group-admin-input input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Phương thức thanh toán</span>
                                                        <input name="paymentMethod" type="text" disabled
                                                            class="form-control" style="color: #000 !important"
                                                            value="{{ $order->paymentMethod }}">
                                                    </div>
                                                    <div style="width:100%;"
                                                        class="group-admin-input input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Địa chỉ 1</span>
                                                        <input name="ship_address1" type="text" disabled
                                                            class="form-control" style="color: #000 !important"
                                                            value="{{ $order->ship_address1 }}">
                                                    </div>
                                                    <div style="width:100%;"
                                                        class="group-admin-input input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Địa chỉ 2</span>
                                                        <input name="ship_address2" type="text" disabled
                                                            class="form-control" style="color: #000 !important"
                                                            value="{{ $order->ship_address2 }}">
                                                    </div>
                                                    <div style="width:100%;"
                                                        class="group-admin-input input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Ngày đặt đơn</span>
                                                        <input name="date_created" type="text" disabled
                                                            class="form-control" style="color: #000 !important"
                                                            value="{{ \Carbon\Carbon::parse($order->date_created)->format('d/m/Y - H:i:s') }}">
                                                    </div>
                                                    <div style="width:100%;"
                                                        class="group-admin-input input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Ngày nhận đơn</span>
                                                        <input name="date_updated" type="text" disabled
                                                            class="form-control" style="color: #000 !important"
                                                            value="{{ \Carbon\Carbon::parse($order->date_updated)->format('d/m/Y - H:i:s') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="text-center custom-pro-edt-ds">
                                                    <button type="submit"
                                                        class="btn btn-ctl-bt waves-effect waves-light m-r-10">Thay đổi
                                                    </button>
                                                    <a href="{{ route('ordersList') }}"
                                                        class="btn btn-ctl-bt waves-effect waves-light">Hủy
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-tab-list tab-pane fade" id="reviews">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="custom-table-container"
                                                        style="max-height: 400px; overflow-y: auto;">
                                                        <table border="1"
                                                            class="table table-secondary table-order-admin"
                                                            style="color:#fff;position: relative;">
                                                            <thead class="custom-thead"
                                                                style="position: sticky;top:0;background-color:#000;">
                                                                <tr>
                                                                    <th class="center">#</th>
                                                                    <th>Sản phẩm</th>
                                                                    <th class="text-center">Mô tả</th>
                                                                    <th class="text-center">Giá</th>
                                                                    <th class="text-center">Số lượng</th>
                                                                    <th class="text-center">Tổng tiền</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="custom-tbody">
                                                                @foreach ($order->orderDetail as $key => $orderItem)
                                                                    <tr>
                                                                        <td class="center">{{ $key + 1 }}</td>
                                                                        <td class="text-left text-truncate"
                                                                            style="max-width: 150px;">
                                                                            {{ $orderItem->product->name }}
                                                                        </td>
                                                                        <td class="text-left text-truncate"
                                                                            style="max-width: 150px;">
                                                                            {{ $orderItem->product->short_description }}
                                                                        </td>
                                                                        <td class="text-center">
                                                                            {{ number_format($orderItem->unit_price) }}₫
                                                                        </td>
                                                                        <td class="text-center">{{ $orderItem->quantity }}
                                                                        </td>
                                                                        <td class="text-center">
                                                                            {{ number_format($orderItem->sub_price) }}₫
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
