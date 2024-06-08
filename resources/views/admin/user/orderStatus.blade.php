@switch($status->id)
    @case(1)
        <button class="pd-setting" style="outline:none !important;background-color:rgba(236, 236, 236, 0.59) !important;">
            <small class="text-white ms-2">{{$status->name}}</small>
        </button>
    @break

    @case(2)
        <button class="pd-setting" style="outline:none !important;background-color:rgb(255, 166, 0) !important;">
            <small class="text-white ms-2">{{$status->name}}</small>
        </button>
    @break
    @case(3)
        <button class="pd-setting" style="outline:none !important;background-color:rgb(58, 85, 235) !important;">
            <small class="text-white ms-2">{{$status->name}}</small>
        </button>
    @break
    @case(4)
        <button class="pd-setting" style="outline:none !important;background-color:rgb(48, 181, 4) !important;">
            <small class="text-white ms-2">{{$status->name}}</small>
        </button>
    @break
    @case(5)
        <button class="pd-setting" style="outline:none !important;background-color:red !important;">
            <small class="text-white ms-2">{{$status->name}}</small>
        </button>
    @break
@endswitch
