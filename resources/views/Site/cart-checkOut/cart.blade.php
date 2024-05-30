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
                                                <a href="#">{{ $item->product->name }}</a>
                                            </p>
                                            <p class="product-des cart-truncate">{{ $item->product->short_description }}</p>
                                        </td>
                                        <td class="price" data-title="Price">
                                            <span>{{ $item->product->sale_price > 0 ? number_format($item->product->sale_price, 0, ',', '.') : number_format($item->product->price, 0, ',', '.') }}
                                                ₫</span>
                                        </td>
                                        <td class="qty" data-title="Qty">
                                            <div class="input-group">
                                                <div class="button minus">
                                                    <button type="button" class="btn btn-primary btn-number"
                                                        data-type="minus" data-field="quant[{{ $key }}]">
                                                        <i class="bi bi-dash"></i>
                                                    </button>
                                                </div>
                                                <input type="text" name="quant[{{ $key }}]" class="input-number"
                                                    data-item-id="{{ $item->id }}" data-min="1" data-max="100"
                                                    value="{{ $item->quantity }}"
                                                    onchange="updateQuantityInput({{ $item->id }}, this.value)">
                                                <input type="hidden" id="csrf_token" value="{{ csrf_token() }}">
                                                <div class="button plus">
                                                    <button type="button" class="btn btn-primary btn-number"
                                                        data-type="plus" data-field="quant[{{ $key }}]">
                                                        <i class="bi bi-plus-lg"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="total-amount" data-title="Total">
                                            <span>{{ number_format($item->total_price, 0, ',', '.') }} ₫</span>
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
                                        <li>Tạm tính<span>{{ number_format($total, 0, ',', '.') }} ₫</span></li>
                                        <li>Phí ship<span>Free</span></li>
                                        {{-- <li>Giảm giá<span>$20.00</span></li> --}}
                                        <li class="last">Tổng tiền<span>{{ number_format($total, 0, ',', '.') }} ₫</span>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to update the input value
            function updateQuantity(button, action) {
                var input = button.closest('.input-group').querySelector('.input-number');
                var currentValue = parseInt(input.value);
                var minValue = parseInt(input.getAttribute('data-min'));
                var maxValue = parseInt(input.getAttribute('data-max'));

                if (isNaN(currentValue)) {
                    currentValue = minValue; // Set default value if current value is not a number
                }

                if (action === 'plus') {
                    if (currentValue < maxValue) {
                        input.value = currentValue + 1;
                    }
                } else if (action === 'minus') {
                    if (currentValue > minValue) {
                        input.value = currentValue - 1;
                    }
                }

                // Disable/Enable buttons based on value
                var newValue = parseInt(input.value);
                var minusButton = button.closest('.input-group').querySelector('.btn-number[data-type="minus"]');
                var plusButton = button.closest('.input-group').querySelector('.btn-number[data-type="plus"]');

                if (newValue === minValue) {
                    minusButton.setAttribute('disabled', true);
                } else {
                    minusButton.removeAttribute('disabled');
                }

                if (newValue === maxValue) {
                    plusButton.setAttribute('disabled', true);
                } else {
                    plusButton.removeAttribute('disabled');
                }
            }

            // Remove existing event listeners to prevent double triggering
            document.querySelectorAll('.btn-number').forEach(function(button) {
                var newButton = button.cloneNode(true);
                button.parentNode.replaceChild(newButton, button);
            });

            // Event listeners for buttons
            document.querySelectorAll('.btn-number').forEach(function(button) {
                button.addEventListener('click', function(event) {
                    var action = button.getAttribute('data-type');
                    updateQuantity(button, action);

                    // Prevent double triggering of the click event
                    event.stopPropagation();
                    event.preventDefault();
                });
            });

            // Initialize button states on page load
            document.querySelectorAll('.input-group').forEach(function(container) {
                var input = container.querySelector('.input-number');
                var minValue = parseInt(input.getAttribute('data-min'));
                var maxValue = parseInt(input.getAttribute('data-max'));
                var currentValue = parseInt(input.value);

                if (isNaN(currentValue)) {
                    currentValue = minValue; // Set default value if current value is not a number
                }

                var minusButton = container.querySelector('.btn-number[data-type="minus"]');
                var plusButton = container.querySelector('.btn-number[data-type="plus"]');

                if (currentValue === minValue) {
                    minusButton.setAttribute('disabled', true);
                }

                if (currentValue === maxValue) {
                    plusButton.setAttribute('disabled', true);
                }
            });
        });

        // update quantity
        function updateQuantityInput() {
            console.log(424);
        }
        // document.addEventListener("DOMContentLoaded", function() {
        var quantityInputs = document.querySelectorAll('.input-number');
        var csrfToken = document.getElementById('csrf_token').value;

        quantityInputs.forEach(function(input) {
            input.addEventListener('input', function() {
                console.log(575);
                var itemId = this.getAttribute('data-item-id');
                var newQuantity = this.value;
                console.log(itemId,
                    newQuantity); // Log ra itemId và newQuantity khi giá trị của input thay đổi

                // Gửi yêu cầu AJAX tới server
                $.ajax({
                    url: "{{ route('updateQuantity') }}",
                    type: "POST",
                    data: {
                        _token: csrfToken,
                        item_id: itemId,
                        new_quantity: newQuantity
                    },
                    success: function(response) {
                        // Xử lý phản hồi thành công nếu cần
                    },
                    error: function(xhr, status, error) {
                        // Xử lý phản hồi lỗi nếu cần
                    }
                });
            });
        });
        // });
    </script>
@endsection
