@extends('app.base')
@section('content')
    <section class="dashboard">
        <h1>
            Reports
            <div class="info-line">
                Turn reports on/off or change report email you can on <a href="{{ route('notify') }}">notify settings page</a>
            </div>
        </h1>

        <div class="setting-line">
            <div class="setting-section">
                <h3>Periodicity</h3>

                <div class="limit wrapper">

                    @include('app.partials.plan', ['title' => 'All', 'description' => 'Monthly',  'suffix' => '', 'isCurrent' => true ])
                    @include('app.partials.plan', ['title' => 'Pro, Ultimate', 'description' => 'Biweekly',  'suffix' => '', 'isCurrent' => false ])
                    @include('app.partials.plan', ['title' => 'Ultimate only', 'description' => 'Weekly',  'suffix' => '', 'isCurrent' => false ])

                </div>
            </div>

        </div>

        <div class="setting-line">
            <div class="setting-section">
                <h3>Format</h3>

                <div class="limit wrapper">
                    @include('app.partials.plan', ['title' => 'All', 'description' => 'CSV',  'suffix' => '', 'isCurrent' => true ])
                    @include('app.partials.plan', ['title' => 'Pro, Ultimate', 'description' => 'XLS',  'suffix' => '', 'isCurrent' => false ])
                    @include('app.partials.plan', ['title' => 'Ultimate only', 'description' => 'PDF',  'suffix' => '', 'isCurrent' => false ])
                </div>
            </div>
        </div>


    </section>
@endsection
