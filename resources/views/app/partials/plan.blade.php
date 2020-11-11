<div class="plan item">
    <div class="room-block">
        <div class="room-block_header">
            {{ $title }}
        </div>
        <div class="room-block_content">
            {{ $description }}
            <span class="room-block_content__suffix">{{ $suffix }}</span>
        </div>

        @if ($isCurrent)
            <button class="btn btn-transparent current">
                Current
            </button>
        @else
            <a href="#{{ $id ?? '' }}" class="toogle btn btn-blue">
                Choose
            </a>
        @endif
    </div>
</div>
