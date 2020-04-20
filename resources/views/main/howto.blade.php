@extends('base')
@section('content')
    @include('partials.title', [
        'header' => 'How to',
        'description' => '',
        'showSensor' => false
    ])

    <section class="accordion">
        <div class="questions">

            <div class="question">
                <a href="#answer-1" class="toogle question-title">How to connect my Welasensor to my Wi-Fi</a>
                <div class="toogle-block answer" id="answer-1">
                    <p>Get the latest version of <a href="/downloads">WSTools.exe</a>, connect sensor to your computer USB hub, then push mini
                        button with clip, then you see Welasensor settings.</p>
                </div>
            </div>

            <div class="question">
                <a href="#answer-2" class="toogle question-title">How to add my Welasensor to my cloud app account</a>
                <div class="toogle-block answer" id="answer-2">
                    <p>Get the latest version of WSTools.exe, connect sensor to your computer USB hub, then push mini
                        button with clip, then you see Welasensor settings.</p>
                </div>
            </div>

            <div class="question">
                <a href="#answer-3" class="toogle question-title">How to get reports to my email address</a>
                <div class="toogle-block answer" id="answer-3">
                    <p>Get the latest version of WSTools.exe, connect sensor to your computer USB hub, then push mini
                        button with clip, then you see Welasensor settings.</p>
                </div>
            </div>

            <div class="question">
                <a href="#answer-4" class="toogle question-title">I don't get any data to my cloud app, but sensor is added and it is active</a>
                <div class="toogle-block answer" id="answer-4">
                    <p>Get the latest version of WSTools.exe, connect sensor to your computer USB hub, then push mini
                        button with clip, then you see Welasensor settings.</p>
                </div>
            </div>

        </div>
    </section>
@endsection
