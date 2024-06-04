@extends('admin.layout')
@section('title', 'Danh sách sản phẩm')
@section('admin')

    <div class="" style="margin-top: 10px;">
        <div class="product-status mg-b-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>Danh sách người dùng</h4>
                            {{-- <div class="add-product">
                                <a href="">Thêm sản phẩm</a>
                            </div> --}}
                            <table>
                                <thead>
                                    <tr>
                                        <th>Ảnh</th>
                                        <th>Tài khoản</th>
                                        <th>Email</th>
                                        <th>vai trò</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày tạo</th>
                                        <th>Cập nhật</th>
                                        <th>Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($users))
                                        @foreach ($users as $user)
                                            <tr>
                                                <td><img src="{{ asset('images/users/' . $user->img) }}" alt="" />
                                                </td>
                                                <td>{{ $user->user_name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if ($user->role == 1)
                                                        Người dùng
                                                    @else
                                                        Quản trị
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($user->is_active == 0)
                                                        <button class="pd-setting" style="background-color:red !important;">
                                                            <small class="text-white ms-2">Offline</small>
                                                        </button>
                                                    @else
                                                        <button class="pd-setting" style="background-color:green !important;">
                                                            <small class="text-white ms-2">Online</small>
                                                        </button>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($user->date_join)->format('d/m/Y - H:i:s') }}
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($user->date_update)->format('d/m/Y - H:i:s') }}</td>
                                                <td>
                                                    <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i
                                                            class="bi bi-pencil-square"></i></button>
                                                    <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i
                                                            class="bi bi-trash"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @if (!empty($users))
                                <nav aria-label="Page navigation example"
                                    style="width:100%;display:flex;justify-content:center;">
                                    <ul class="pagination pagi-list">
                                        <li class="page-item"><a class="page-link"
                                                href="{{ $users->previousPageUrl() }}">Previous</a></li>
                                        @for ($i = 1; $i <= $users->lastPage(); $i++)
                                            <li class="page-item {{ $users->currentPage() == $i ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $users->nextPageUrl() }}">Next</a>
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
