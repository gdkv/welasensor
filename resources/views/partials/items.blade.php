<div class="items">
    @foreach($items as $item)
        <div class="item {{ $item->isBig ? 'item-2x' : '' }}">
            <div class="item-title">{{ $item->name }}</div>
            <div class="item-text">
                {!! $item->description !!}
            </div>
            <div class="item-price">
                {!! ($item->price ? "$ ".$item->price."<span>/mo</span>" : 'Free') !!}
            </div>
        </div>
    @endforeach
</div>
