@extends('app.base')
@section('content')
    <h1>Your sensors</h1>

    <div class="sensors-wrapper">
        <div class="sensors-list">
            <div class="add-sensor_form">
                @include('app.partials.add_sensor')
            </div>
            @foreach($sensors as $sensor)
                <div class="item">
                    <a href="{{ route('sensor_view', $sensor->id) }}">
                        <div class="welasensor">
                            <div class="corpus">
                                <div class="indicator"></div>
                            </div>
                            <div class="plug"></div>
                        </div>
                    </a>
                    <div class="welasensor-info">
                        <div class="welasensor-info-mac">{{ $sensor->mac }}</div>
                        <div class="welasensor-info-name">
                            {{ $sensor->name }}
                        </div>
                        <div class="welasensor-info-time">
                            {{ $sensor->lastUpdate() }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
