<section class="top">
    <div class="left">
        <h1>
            {!! $header !!}
        </h1>
        <p>
           {!! $description !!}
        </p>
    </div>
    <div class="right">
        @if($showSensor)
        <div class="welasensor">
            <div class="corpus">
                <div class="indicator"></div>
            </div>
            <div class="plug">

            </div>
        </div>
        @endif
    </div>
</section>
