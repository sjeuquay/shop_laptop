@switch(true)
    @case($quantity > 0)
        <button class="pd-setting">
            <small class="text-white ms-2">Còn hàng</small>
        </button>
    @break

    @case($quantity <= 0)
        <button class="pd-setting" style="background-color:red !important;">
            <small class="text-white ms-2">Hết hàng</small>
        </button>
    @break
@endswitch
