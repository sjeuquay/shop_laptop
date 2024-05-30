{{-- không cho đặt hàng --}}
<div id="cartModal" class="modal">
    <div class="modal-content h-100 border-0">
        <span id="closeModal" class="close">&times;</span>
        <div class="h-100 d-flex flex-column align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#ff6a28" class="bi bi-handbag"
                viewBox="0 0 16 16">
                <path
                    d="M8 1a2 2 0 0 1 2 2v2H6V3a2 2 0 0 1 2-2m3 4V3a3 3 0 1 0-6 0v2H3.36a1.5 1.5 0 0 0-1.483 1.277L.85 13.13A2.5 2.5 0 0 0 3.322 16h9.355a2.5 2.5 0 0 0 2.473-2.87l-1.028-6.853A1.5 1.5 0 0 0 12.64 5zm-1 1v1.5a.5.5 0 0 0 1 0V6h1.639a.5.5 0 0 1 .494.426l1.028 6.851A1.5 1.5 0 0 1 12.678 15H3.322a1.5 1.5 0 0 1-1.483-1.723l1.028-6.851A.5.5 0 0 1 3.36 6H5v1.5a.5.5 0 1 0 1 0V6z" />
            </svg>
            <p class="py-4">Vui lòng đăng nhập để mua hàng và thanh toán dễ dàng hơn</p>
            <div class="d-flex">
                <div class="mx-2">
                    <a href="{{ route('register') }}" class="btn btn-register_product">Đăng Ký</a>
                </div>
                <div class="mx-2">
                    <a href="{{ route('login') }}" class="btn text-white btn-dark btn-login_product">Đăng Nhập</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Overlay -->
<div id="modalOverlay" class="overlay"></div>


@push('modal')
    @if (session('success'))
        <script>
            $(document).ready(function() {
                // Hiển thị modal
                $('#cartSuccessModal').show();

                // Tự động ẩn modal sau 3 giây
                setTimeout(function() {
                    $('#cartSuccessModal').hide();
                }, 3000);
            });

            // Hàm để ẩn modal
            function hideModal() {
                $('#cartSuccessModal').hide();
            }
        </script>
    @endif
@endpush
