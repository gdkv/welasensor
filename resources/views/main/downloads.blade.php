@extends('base')
@section('content')
    @include('partials.title', [
        'header' => 'Downloads',
        'description' => 'Get the last releases of WSTools and Cloud app',
        'showSensor' => false
    ])

    <section>
        <div class="section">
            <div class="section-title">
                WS Tools
            </div>
            <div class="section-description">
                <p>WS Tools is a Windows app for setup Wi-Fi connection for your Welasensor</p>
            </div>
        </div>
    </section>
    <section>
        <div class="section">
            <div class="section-title">
                WS Cloud app
            </div>
            <div class="section-description">
                <p>If you don't want to use our cloud application and want to setup our own VPS or maybe
                Raspberry Pi and run our app for our own, you can clone our project from Github</p>
            </div>
        </div>
    </section>
@endsection
