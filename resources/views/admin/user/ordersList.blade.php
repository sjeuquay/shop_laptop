@extends('admin.layout')
@section('title', 'Danh sách sản phẩm')
@section('admin')

    <div class="" style="margin-top: 10px;">
        <div class="product-status mg-b-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>Danh sách đơn hàng</h4>
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Người đặt</th>
                                        <th>Số điện thoại</th>
                                        <th>Email</th>
                                        <th>Phương thức thanh toán</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày tạo</th>
                                        <th>Cập nhật</th>
                                        <th>Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($orders))
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->name }}</td>
                                                <td>{{ $order->phone }}</td>
                                                <td>{{ $order->email }}</td>
                                                <td>
                                                    {{ $order->paymentMethod }}
                                                </td>
                                                <td>
                                                    @if ($order->status_id)
                                                        @include('admin.user.orderStatus', [
                                                            'status' => $order->status,
                                                        ])
                                                    @else
                                                        <button class="pd-setting" style="background-color:red !important;">
                                                            <small class="text-white ms-2">Lỗi trạng thái</small>
                                                        </button>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($order->date_join)->format('d/m/Y - H:i:s') }}
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($order->date_update)->format('d/m/Y - H:i:s') }}
                                                </td>
                                                <td>
                                                    <div class="" style="display: flex">
                                                        <button class="pd-setting-ed btn btn-dark text-white">
                                                            <a href="{{ route('orderEdit', ['id' => $order->id]) }}">
                                                                <i class="bi bi-pencil-square" style="color: #fff;"></i>
                                                            </a>
                                                        </button>
                                                        <form action="{{ route('deleteOrder', ['id' => $order->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit" class="pd-setting-ed"><i
                                                                    class="bi bi-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @if (!empty($orders))
                                <nav aria-label="Page navigation example"
                                    style="width:100%;display:flex;justify-content:center;">
                                    <ul class="pagination pagi-list">
                                        <li class="page-item"><a class="page-link"
                                                href="{{ $orders->previousPageUrl() }}">Previous</a></li>
                                        @for ($i = 1; $i <= $orders->lastPage(); $i++)
                                            <li class="page-item {{ $orders->currentPage() == $i ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $orders->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $orders->nextPageUrl() }}">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
