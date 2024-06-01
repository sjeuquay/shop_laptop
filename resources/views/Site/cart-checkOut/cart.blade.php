@extends('Site.layout')

@section('title', 'cart')
@section('content')

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ route('home') }}">Trang chủ<i class="bi bi-chevron-right"></i></a></li>
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
                            @php
                                $total = 0;
                            @endphp
                            @if (session()->has('cart' . Auth::id()) && !empty(session('cart' . Auth::id())))
                                @foreach (session('cart' . Auth::id()) as $key => $item)
                                    @php
                                        $total += $item->total_price;
                                        $sub_price = 0;
                                        $price =
                                            $item->product->sale_price > 0
                                                ? $item->product->sale_price
                                                : $item->product->price;
                                        $sub_price = $item->quantity * $price;
                                    @endphp
                                    <tr>
                                        <td class="image" data-title="No">
                                            <div class="cart-box_img">
                                                <img src="{{ asset('images/product/' . $item->product->image) }}"
                                                    alt="#">
                                            </div>
                                        </td>
                                        <td class="product-des" data-title="Description">
                                            <p class="product-name cart-name-truncate mb-3">
                                                <a
                                                    href="{{ route('product', ['id' => $item->product->id]) }}">{{ $item->product->name }}</a>
                                            </p>
                                            <p class="product-des cart-truncate">{{ $item->product->short_description }}</p>
                                        </td>
                                        <td class="price" data-title="Price">
                                            <span>{{ number_format($price) }}
                                                ₫</span>
                                        </td>
                                        <form action="{{ route('updateCart') }}" method="POST">
                                            @csrf
                                            <td class="qty" data-title="Qty">
                                                <div class="input-group">
                                                    <div class="button minus">
                                                        <button type="button" class="btn btn-primary btn-number"
                                                            data-type="minus" data-field="quant[{{ $key }}]"
                                                            data-index="{{ $key }}">
                                                            <i class="bi bi-dash"></i>
                                                        </button>
                                                    </div>
                                                    <input type="text" name="quant[{{ $key }}]"
                                                        class="input-number" data-item-id="{{ $item->id }}"
                                                        data-min="1" data-max="{{ $item->product->quantity_available }}"
                                                        data-index="{{ $key }}" value="{{ $item->quantity }}">
                                                    <div class="button plus">
                                                        <button type="button" class="btn btn-primary btn-number"
                                                            data-type="plus" data-field="quant[{{ $key }}]"
                                                            data-index="{{ $key }}">
                                                            <i class="bi bi-plus-lg"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </form>

                                        <td class="total-amount" data-title="Total">
                                            <span class="sub_price">{{ number_format($sub_price) }} ₫</span>
                                        </td>
                                        <td class="action" data-title="Remove">
                                            <form
                                                action="{{ route('deleteCart', ['id' => $key, 'id_cart' => $item->id]) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn-sm" style="outline: none;'"><i
                                                        class="bi bi-trash3"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

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
                                        <li>Tạm tính<span>{{ number_format($total) }} ₫</span></li>
                                        <li>Phí ship<span>Free</span></li>
                                        {{-- <li>Giảm giá<span>$20.00</span></li> --}}
                                        <li class="last">Tổng tiền<span>{{ number_format($total) }} ₫</span>
                                        </li>
                                    </ul>
                                    <div class="button5">
                                        @if (auth()->check())
                                            @if (session()->has('cart' . Auth::id()) && count(session()->get('cart' . Auth::id())))
                                                <a href="{{ route('checkout') }}" class="btn">Thanh toán</a>
                                            @endif
                                        @endif
                                        <a href="{{ route('shop') }}" class="btn">Tiếp tục mua sắm</a>
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
    @push('quantity')
        <script>
            $(document).ready(function() {
                $('.btn-number').click(function(e) {
                    e.preventDefault();

                    var fieldName = $(this).attr('data-field');
                    var type = $(this).attr('data-type');
                    var index = $(this).attr('data-index');
                    var input = $("input[name='" + fieldName + "']");
                    var currentVal = parseInt(input.val());

                    if (!isNaN(currentVal)) {
                        if (type == 'minus') {
                            if (currentVal > input.attr('data-min')) {
                                input.val(currentVal - 1);
                                $(".btn-number[data-type='plus'][data-index='" + index + "']").removeAttr(
                                    'disabled');
                            }
                            if (parseInt(input.val()) <= input.attr('data-min')) {
                                $(this).attr('disabled', true);
                            }
                        } else if (type == 'plus') {
                            if (currentVal < input.attr('data-max')) {
                                input.val(currentVal + 1);
                                $(".btn-number[data-type='minus'][data-index='" + index + "']").removeAttr(
                                    'disabled');
                            }
                            if (parseInt(input.val()) >= input.attr('data-max')) {
                                $(this).attr('disabled', true);
                            }
                        }
                        updateQuantity(input, index); // Gọi hàm với chỉ mục
                    } else {
                        input.val(0);
                    }
                });

                function updateQuantity(input, index) {
                    var itemId = input.data('item-id');
                    var quantity = input.val();

                    console.log(itemId, quantity, index); // Log để kiểm tra các giá trị

                    $.ajax({
                        url: '{{ route('updateCart') }}',
                        method: 'POST',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            id: itemId,
                            quantity: quantity,
                            index: index // Gửi chỉ mục đến máy chủ
                        },
                        success: function(response) {
                            if (response.success) {
                                // Cập nhật tổng giá trị trên trang
                                var total_price_element = $('#total-price-' +
                                index); // Đặt id cho phần tử hiển thị tổng giá trị
                                total_price_element.text(response.total_price);

                                updateSubPrice(input);
                            } else {
                                console.error('Lỗi máy chủ:', response);
                                alert('Đã xảy ra lỗi khi cập nhật giỏ hàng');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Lỗi AJAX:', error);
                            alert('Đã xảy ra lỗi khi cập nhật giỏ hàng');
                        }
                    });
                }

                $('.input-number').on('input', function() {
                    $(this).off('change');

                    var input = $(this);
                    var index = input.data('index'); // Lấy chỉ mục
                    setTimeout(function() {
                        updateQuantity(input, index); // Gọi hàm với chỉ mục
                    }, 500); // Đặt một độ trễ để gọi updateQuantity sau khi người dùng dừng nhập
                });

                function updateSubPrice(input) {
                    var quantity = parseInt(input.val()); // Chuyển đổi quantity thành số nguyên
                    var priceText = input.closest('tr').find('.price span').text();
                    var price = parseFloat(priceText.replace(/\D/g,
                    '')); // Lấy giá trị của price và chuyển đổi thành số thực

                    // Kiểm tra nếu quantity và price là số hợp lệ
                    if (!isNaN(quantity) && !isNaN(price)) {
                        var sub_price = quantity * price; // Tính toán sub_price

                        // Định dạng sub_price với tiền tệ của Việt Nam và không có số lẻ
                        var formatted_sub_price = number_format(sub_price) + ' ₫';

                        // Hiển thị formatted_sub_price
                        input.closest('tr').find('.total-amount span').text(formatted_sub_price);

                        updateTotal();
                    } else {
                        console.log("Lỗi: quantity hoặc price không hợp lệ.");
                    }
                }

                function updateTotal() {
                    var total = 0;

                    $('.sub_price').each(function() {
                        var subPriceValue = parseFloat($(this).text().replace(/[,|.|\s]/g, ''));
                        total += subPriceValue;
                    });

                    // Cập nhật cả hai phần "Tạm tính" và "Tổng tiền" với giá trị total
                    $('ul li:nth-child(1) span').text(number_format(total) + ' ₫');
                    $('ul li.last span').text(number_format(total) + ' ₫');
                }

                function number_format(number) {
                    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }
            });
        </script>
    @endpush

@endsection
