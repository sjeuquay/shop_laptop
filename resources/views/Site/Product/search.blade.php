@extends('Site.layout')

@section('title', 'search')
@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div id="customErrorModal" class="custom-modal">
            <div class="custom-modal-content">
                <span class="custom-close">&times;</span>
                <p>{{ session('error') }}</p>
            </div>
        </div>
    @endif
    <section>
        <div class="container">
            <div class="py-5">
                <h6 style="font-weight: 600;letter-spacing:2px;line-height:30px;">Tìm thấy
                    {{ !empty($search) ? count($search) : 0 }} sản phẩm
                </h6>
                <div class="pt-4">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <!-- Shop Top -->
                                <div class="shop-top">
                                    <div class="shop-shorter">
                                        <div class="single-shorter d-flex align-items-center" style="width: 100%;gap:20px;">
                                            <label>Sắp xếp :</label>
                                            <select>
                                                <option selected="selected">Tất cả</option>
                                                <option>Giá tăng dần</option>
                                                <option>Giá giảm dần</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Shop Top -->
                            </div>
                        </div>
                        <div class="row">
                            {{-- {{dd($products)}} --}}
                            @if (isset($search))
                                @foreach ($search as $p)
                                    @if ($p->is_stock !== 0)
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                            <form action="{{ route('addcart', ['id' => $p->id]) }}" method="POST">
                                                @csrf
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="{{ route('product', ['id' => $p->id]) }}">
                                                            <img class="default-img"
                                                                src="{{ asset('images/product/' . $p->image) }}"
                                                                alt="#">
                                                            <img class="hover-img"
                                                                src="{{ asset('images/product/' . $p->image) }}"
                                                                alt="#">
                                                        </a>
                                                        <div class="button-head">
                                                            <div class="product-action">
                                                                <a data-toggle="modal" data-target="#exampleModal"
                                                                    title="Quick View"
                                                                    onclick="openHomeModal({{ $p->id }})"><i
                                                                        class="bi bi-eye"></i><span>Chi tiết</span></a>
                                                                <a title="Wishlist" href="#"><i
                                                                        class="bi bi-heart"></i><span>Yêu
                                                                        thích</span></a>
                                                            </div>
                                                            <div class="product-action-2">
                                                                @if (auth()->check())
                                                                    <button class="border-0" type="submit"
                                                                        style="background-color:transparent;outline:none;"><a
                                                                            title="Add to cart">Thêm vào giỏ
                                                                            hàng</a></button>
                                                                @else
                                                                    <button class="addToCartButton border-0 addToCart"
                                                                        type="button"
                                                                        style="background-color:transparent;outline:none;"><a
                                                                            title="Add to cart">Thêm vào giỏ
                                                                            hàng</a></button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <h3><a>{{ $p->name }}</a></h3>
                                                        <div class="product-price">
                                                            <span>{{ $p->sale_price > 0 ? number_format($p->sale_price) : number_format($p->price) }}
                                                                ₫</span>
                                                            @if ($p->sale_price > 0)
                                                                <del class=""
                                                                    style="opacity:0.5;">{{ number_format($p->price) }}
                                                                    ₫</del>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            {!! $search->appends(request()->query())->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('Site.Product.modal')
    <script>
        // Get the modal
        // var modal = document.getElementById("customErrorModal");

        // // Get the <span> element that closes the modal
        // var span = document.getElementsByClassName("custom-close")[0];

        // // When the user clicks on <span> (x), close the modal
        // span.onclick = function() {
        //     modal.style.display = "none";
        // }

        // // Automatically close the modal after 3 seconds
        // setTimeout(function() {
        //     modal.style.display = "none";
        // }, 3000);
    </script>
@endsection
