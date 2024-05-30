@props([
    'name' => ''
])

<!-- modal thanh toán thành công  -->
<div id="cartSuccessModal" class="custom-modal">
    <div class="modal-content border-0" style="height:100%;">
        <div class="text-center">
            <p style="font-size: 20px;color:green;"><i class="bi bi-bag-check"></i></p>
            <p class="text-success">{{$name}}</p>
        </div>
    </div>
</div>
