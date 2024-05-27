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
                             @if (auth()->check())
                                 <li class="dropdown overlay-account">
                                     <i class="bi bi-person"></i>
                                     <a href="#" class="dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                         aria-expanded="false">{{ auth()->user()->name }}</a>
                                     <ul class="dropdown-menu" id="myDropdown">
                                         <li><a style="background-color: transparent" class="dropdown-item"
                                                 href="#">Thông tin tài khoản</a></li>
                                         <li><a style="background-color: transparent" class="dropdown-item"
                                                 href="#">Lịch sử mua hàng</a></li>
                                         <li><a style="background-color: transparent" class="dropdown-item"
                                                 href="#">Yêu thích</a></li>
                                         <li><a style="background-color: transparent" class="dropdown-item"
                                                 href="{{ route('logout') }}">Đăng xuất</a></li>
                                     </ul>
                                 </li>
                             @else
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
                         <div class="sinlge-bar shopping">
                             <a href="{{ route('cart') }}" class="single-icon"><i class="bi bi-bag"></i> <span
                                     class="total-count">
                                     {{ $amount }}
                                 </span></a>
                             <!-- Shopping Item -->
                             <div class="shopping-item d-block" style="display: block !important;">
                                 <div class="dropdown-cart-header">
                                     <span>{{ $amountProduct }} sản phẩm</span>
                                     <a href="{{ route('cart') }}">Giỏ hàng</a>
                                 </div>
                                 <ul class="shopping-list">
                                     @if (!empty($cart))
                                         @foreach ($cart->cartItem as $cartItem)
                                             <li>
                                                 <a href="#" class="remove" title="Remove this item"><i
                                                         class="bi bi-trash3"></i></a>
                                                 <a class="cart-img" href="#"><img
                                                         src="{{asset('images/product/'.$cartItem->product->image)}}" alt="#"></a>
                                                 <h4>
                                                    <a href="#" class="text-truncate text-overflow_truncate">{{$cartItem->product->name}}</a>
                                                </h4>
                                                 <p class="quantity">{{$cartItem->quantity}}x - <span class="amount">{{ number_format($cartItem->price, 0, ',', '.') }} ₫</span></p>
                                             </li>
                                         @endforeach
                                     @endif
                                 </ul>
                                 <div class="bottom">
                                     <div class="total">
                                         <span>Tổng tiền</span>
                                         <span class="total-amount">{{number_format($total, 0, ',', '.')}}₫</span>
                                     </div>
                                     <a href="checkout.html" class="btn animate">Thanh toán</a>
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
