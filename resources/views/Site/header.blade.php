 <!-- Header -->
 <header class="header shop">
     <!-- Topbar -->
     <div class="topbar">
         <div class="container">
             <div class="row">
                 <div class="col-lg-4 col-md-12 col-12">
                     <!-- Top Left -->
                     <div class="top-left">
                         <ul class="list-main">
                             <li>
                                 <i class="bi bi-headset"></i>
                                 +84 0961921909
                             </li>
                             <li>
                                 <i class="bi bi-envelope"></i>sjeuquay@gmail.com
                             </li>
                         </ul>
                     </div>
                     <!--/ End Top Left -->
                 </div>
                 <div class="col-lg-8 col-md-12 col-12">
                     <!-- Top Right -->
                     <div class="right-content">
                         <ul class="list-main d-flex align-items-center">
                             @if (!auth()->check())
                                 <li class="d-flex align-items-center">
                                     <i class="bi bi-power"></i>
                                     <a class="mx-1" href="{{ route('login') }}">Đăng nhập</a>
                                     |
                                     <a class="mx-1" href="{{ route('register') }}">Đăng ký</a>
                                 </li>
                             @endif
                         </ul>
                     </div>
                     <!-- End Top Right -->
                 </div>
             </div>
         </div>
     </div>
     <!-- End Topbar -->
     <div class="middle-inner">
         <div class="container">
             <div class="row">
                 <div class="col-lg-2 col-md-2 col-12">
                     <!-- Logo -->
                     <div class="logo">
                         <a href="{{ route('home') }}">
                             <h2
                                 style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);color:#000 !important;font-weight:700 !important;">
                                 GMSHOP</h2>
                         </a>
                     </div>
                     <!--/ End Logo -->
                     <!-- Search Form -->
                     <div class="search-top">
                         <div class="top-search"><a href="#0"><i class="bi bi-search"></i></a></div>
                         <!-- Search Form -->
                         <div class="search-top">
                             <form class="search-form" action="{{ route('search') }}" method="GET">
                                 @csrf
                                 <input type="text" placeholder="Tìm kiếm....." name="search">
                                 <button value="search" type="submit"><i class="ti-search"></i></button>
                             </form>
                         </div>
                         <!--/ End Search Form -->
                     </div>
                     <!--/ End Search Form -->
                     <div class="mobile-nav"></div>
                 </div>
                 <div class="col-lg-8 col-md-7 col-12">
                     <div class="search-bar-top">
                         <div class="search-bar">
                             <form class="w-100" action="{{ route('search') }}" method="GET">
                                 @csrf
                                 <input class="w-100" name="search" placeholder="Tìm kiếm....." type="text">
                                 <button class="btnn" type="submit"><i class="bi bi-search"></i></button>
                             </form>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-2 col-md-3 col-12">
                     <div class="right-bar">
                         <!-- Search Form -->
                         <div class="sinlge-bar">
                             <a href="#" class="single-icon"><i class="bi bi-heart"></i></a>
                         </div>
                         @if (auth()->check())
                             <div class="sinlge-bar dropdown overlay-account">
                                 <a href="#" class="single-icon"><i class="bi bi-person-circle"></i></a>
                                 <ul class="dropdown-menu">
                                     <li><a style="background-color: transparent" class="dropdown-item"
                                             href="#">Thông tin tài khoản</a></li>
                                     <li><a style="background-color: transparent" class="dropdown-item"
                                             href="#">Lịch sử mua hàng</a></li>
                                     <li><a style="background-color: transparent" class="dropdown-item"
                                             href="{{ route('logout') }}">Đăng xuất</a></li>
                                 </ul>
                             </div>
                         @endif
                         <div class="sinlge-bar shopping">
                             <a href="{{ route('cart') }}" class="single-icon"><i class="bi bi-bag"></i> <span
                                     class="total-count">
                                     @if (session()->has('cart' . Auth::id()) && !empty(session('cart' . Auth::id())))
                                         {{ session('cart' . Auth::id())->count() }}
                                     @else
                                         0
                                     @endif
                                 </span></a>
                             <!-- Shopping Item -->
                             <div class="shopping-item d-block" style="display: block !important;">
                                 <div class="dropdown-cart-header">
                                     <span>
                                         @if (session()->has('cart' . Auth::id()) && !empty(session('cart' . Auth::id())))
                                             {{ session('cart' . Auth::id())->count() }}
                                         @endif sản phẩm
                                     </span>
                                     <a href="{{ route('cart') }}">Giỏ hàng</a>
                                 </div>
                                 <ul class="shopping-list">
                                     @php
                                         $total = 0;
                                     @endphp
                                     @if (session()->has('cart' . Auth::id()) && !empty(session('cart' . Auth::id())))
                                         @foreach (session('cart' . Auth::id()) as $key => $item)
                                             @php
                                                 $total += $item->total_price;
                                             @endphp
                                             <li>
                                                 <form
                                                     action="{{ route('deleteCart', ['id' => $key, 'id_cart' => $item->id]) }}"
                                                     method="POST" style="display:inline;">
                                                     @csrf
                                                     <button type="submit" class="btn-sm btn-cart_trash"
                                                         style="outline: none;">
                                                         <i class="bi bi-trash3"></i>
                                                     </button>
                                                 </form>
                                                 <a class="cart-img" href="#"><img
                                                         src="{{ asset('images/product/' . $item->product->image) }}"
                                                         alt="#"></a>
                                                 <h4>
                                                     <a href="#"
                                                         class="text-truncate text-overflow_truncate">{{ $item->product->name }}</a>
                                                 </h4>
                                                 <p class="quantity">{{ $item->quantity }}x - <span
                                                         class="amount">{{ number_format($item->price, 0, ',', '.') }}
                                                         ₫</span></p>
                                             </li>
                                         @endforeach
                                     @endif
                                 </ul>
                                 <div class="bottom">
                                     <div class="total">
                                         <span>Tổng tiền</span>
                                         <span class="total-amount">{{ number_format($total, 0, ',', '.') }}₫</span>
                                     </div>
                                     @if (auth()->check())
                                         @if (session()->has('cart' . Auth::id()) && count(session()->get('cart' . Auth::id())))
                                             <a href="{{ route('checkout') }}" class="btn animate">Thanh toán</a>
                                         @else
                                             <a href="{{ route('shop') }}" class="btn animate">Mua sắm</a>
                                         @endif
                                     @else
                                         <a href="{{ route('login') }}" class="btn animate">Đăng nhập</a>
                                     @endif

                                 </div>
                             </div>
                             <!--/ End Shopping Item -->
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- Header Inner -->
     <div class="header-inner">
         <div class="container">
             <div class="cat-nav-head">
                 <div class="row">
                     <div class="col-lg-12 col-12">
                         <div class="menu-area">
                             <!-- Main Menu -->
                             <nav class="navbar navbar-expand-lg">
                                 <div class="navbar-collapse">
                                     <div class="nav-inner" style="width: 100% !important;">
                                         <ul class="nav main-menu menu navbar-nav justify-content-center">
                                             <li class="{{ request()->is('/') ? 'active' : '' }}"><a
                                                     href="{{ route('home') }}">Trang chủ</a></li>
                                             <li class="{{ request()->is('shop*') ? 'active' : '' }}"><a
                                                     href="{{ route('shop') }}">Cửa hàng <i
                                                         class="bi bi-chevron-down"></i></a>
                                                 <ul class="dropdown">
                                                     @if ($category)
                                                         @foreach ($category as $c)
                                                             <li><a
                                                                     href="{{ route('shop', ['id' => $c->id]) }}">{{ $c->name }}</a>
                                                             </li>
                                                         @endforeach
                                                     @endif
                                                 </ul>
                                             </li>
                                             <li class="{{ request()->is('about') ? 'active' : '' }}"><a
                                                     href="#">Giới thiệu</a></li>
                                             <li class="{{ request()->is('posts') ? 'active' : '' }}"><a
                                                     href="#">Bài viết</a>
                                             </li>
                                             <li class="{{ request()->is('contact') ? 'active' : '' }}"><a
                                                     href="contact.html">Liên hệ</a></li>
                                         </ul>
                                     </div>
                                 </div>
                             </nav>
                             <!--/ End Main Menu -->
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!--/ End Header Inner -->
 </header>
 <!--/ End Header -->
