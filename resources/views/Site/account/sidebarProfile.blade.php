<ul class="nav flex-column sidebar" style="height: 100%;">
    <li class="nav-item">
        <a class="nav-link {{ request()->is('profile') ? 'active' : ''}}" href="{{ route('profile') }}">
            <i class="bi bi-person-video2"></i>
            Thông Tin Cá Nhân
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('change_password') ? 'active' : '' }}" href="{{ route('changePassword') }}">
            <i class="bi bi-pencil-square"></i>
            Đổi Mật Khẩu
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('order_history') ? 'active' : '' }}" href="{{ route('orderHistory') }}">
            <i class="bi bi-box-seam"></i>
            Lịch Sử Đơn Hàng
        </a>
    </li>
</ul>
