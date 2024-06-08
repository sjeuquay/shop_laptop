@switch($status->id)
    @case(1)
        <button class="badge bg-body-secondary text-dark px-3" style="height:30px; outline:none !important;">
            {{ $status->name }}
        </button>
    @break

    @case(2)
        <button class="badge bg-warning text-white px-3" style="height:30px; outline:none !important;">
            {{ $status->name }}
        </button>
    @break

    @case(3)
        <button class="badge bg-primary text-white px-3" style="height:30px; outline:none !important;">
            {{ $status->name }}
        </button>
    @break

    @case(4)
        <button class="badge bg-success text-white px-3" style="height:30px; outline:none !important;">
            {{ $status->name }}
        </button>
    @break

    @case(5)
        <button class="badge bg-danger text-white px-3" style="height:30px; outline:none !important;">
            {{ $status->name }}
        </button>
    @break
@endswitch
