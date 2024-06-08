@extends('Site.account.layoutProfile')

@section('title', 'Thông tin người dùng')
@section('profile')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="table-responsive">
        <div class="custom-table">
            <table class="table border">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Ngày Đặt Hàng</th>
                        <th scope="col" class="text-center">Số Lượng</th>
                        <th scope="col" class="text-center">Tổng Tiền</th>
                        <th scope="col" class="text-center">Trạng Thái</th>
                        <th scope="col">Ghi Chú</th>
                        <th scope="col" class="text-center">Hành Động</th>
                    </tr>
                </thead>
                <tbody class="align-middle text-center">
                    @if ($orders)
                        @foreach ($orders as $order)
                            <tr>
                                <td class="align-middle">{{ $order->id }}</td>
                                <td class="align-middle">
                                    {{ \Carbon\Carbon::parse($order->date_created)->format('d/m/Y - H:i:s') }}</td>
                                <td class="align-middle">{{ $order->amount }}</td>
                                <td class="align-middle">{{ number_format($order->pay_amount) }}₫</td>
                                <td class="align-middle">
                                    @if ($order->status_id)
                                        @include('Site.account.statusfield', [
                                            'status' => $order->status,
                                        ])
                                    @else
                                        <button class="pd-setting" style="background-color:red !important;">
                                            <small class="text-white ms-2">Lỗi trạng thái</small>
                                        </button>
                                    @endif
                                </td>
                                <td class="align-middle text-truncate" style="max-width: 100px;">
                                    {{ $order->customer_notes }}</td>
                                <td class="align-middle">
                                    <div class="" style="height: 100%;display:flex;gap:5px;justify-content: center;">
                                        <a href="{{ route('ordeDetail', ['id' => $order->id]) }}"
                                            class="btn btn-primary text-white p-0 p-2" style="font-size: 13px;">Chi
                                            Tiết</a>
                                        @if ($order->status_id == 1)
                                            <form action="{{ route('destroy', ['id' => $order->id]) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-danger p-0 p-2"
                                                    style="background-color: red;font-size: 13px;height:40px;"
                                                    type="submit">Hủy đơn</button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            {!! $orders->appends(request()->query())->links() !!}
        </div>
    </div>
@endsection
