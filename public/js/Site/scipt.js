// add to cart
document.addEventListener('DOMContentLoaded', function () {
    var thumbnails = document.querySelectorAll('.thumbnail-link');
    var mainImage = document.getElementById('zoom1');

    thumbnails.forEach(function (thumbnail) {
        // Lắng nghe sự kiện click
        thumbnail.addEventListener('click', function (event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của thẻ a
            var newImageSrc = this.getAttribute(
                'data-image'); // Lấy đường dẫn ảnh từ thuộc tính data-image
            mainImage.src = newImageSrc; // Thay đổi đường dẫn ảnh của thẻ chính
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    var addToCartButton = document.getElementById('addToCartButton');
    var modal = document.getElementById('cartModal');
    var overlay = document.getElementById('modalOverlay');
    var closeModal = document.getElementById('closeModal');

    // Show modal and overlay when "Thêm vào giỏ hàng" button is clicked
    addToCartButton.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the default action
        modal.classList.add('show');
        overlay.style.display = 'block';
    });

    // Hide modal and overlay when the close button is clicked
    closeModal.addEventListener('click', function () {
        modal.classList.remove('show');
        overlay.style.display = 'none';
    });

    // Hide modal and overlay when the overlay is clicked
    overlay.addEventListener('click', function () {
        modal.classList.remove('show');
        overlay.style.display = 'none';
    });
});

// không cho thêm giỏ hàng nhiều 
document.addEventListener('DOMContentLoaded', function () {
    var addToCartButtons = document.querySelectorAll('.addToCart');
    var modal = document.getElementById('cartModal');
    var overlay = document.getElementById('modalOverlay');
    var closeModal = document.getElementById('closeModal');

    // Lắng nghe sự kiện click trên các nút "Thêm vào giỏ hàng"
    addToCartButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của nút submit
            modal.classList.add('show');
            overlay.style.display = 'block';
        });
    });

    // Ẩn modal và overlay khi nhấn nút đóng
    closeModal.addEventListener('click', function () {
        modal.classList.remove('show');
        overlay.style.display = 'none';
    });

    // Ẩn modal và overlay khi nhấp vào overlay
    overlay.addEventListener('click', function () {
        modal.classList.remove('show');
        overlay.style.display = 'none';
    });
});