<div class="variant">
    <div class="">
        <div class="title">
            {{$title}}
        </div>
        <div class="price">
            {{ $price ?? "$ 0" }}
        </div>
    </div>
    <div class="button">
        @if(isset($price))
            <a class="btn btn-red" href="https://securepay.tinkoff.ru/rest/Authorize/1B63Y1" target="_blank">
                Buy
            </a>
        @else
            <form action="{{ route('settings') }}" method="POST">
                @csrf

                <input type="hidden" name="plan" value="1" />
                <button type="submit" class="btn btn-red">
                    Change
                </button>
            </form>
        @endif
    </div>
</div>
