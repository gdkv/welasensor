@extends('base')
@section('content')
    @include('partials.title', [
        'header' => 'Who we are',
        'description' => '',
        'showSensor' => false
    ])

    <section>
        <div class="section">
            <div class="section-title">
                Hello world ✌
            </div>
            <div class="section-description">
                <p>We are small team from the north of Moscow region and we create
                    a real cool things.</p><p>When we design a welasensor, first of all we create it for us. So you can be
                    sure, you will get a product that will be stable and work for a long time.</p><p>
                    Anyway if you still have questions or complaints about the operation of the sensor or the cloud service,
                    then write to us by mail at <a href="mailto:support@welasensor.ru">support@welasensor.ru</a></p>
            </div>
        </div>
    </section>
@endsection
