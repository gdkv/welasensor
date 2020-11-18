@extends('app.base')
@section('content')
    <h1>Your sensors</h1>

    <div class="sensors-wrapper">

        <div class="add-sensor_form">
            @include('app.partials.add_sensor')
        </div>

        <div class="sensors-list">

            @foreach($sensors as $sensor)
                <div class="item" data-sensor-id="{{$sensor->id}}" data-sensor-priority="{{$sensor->priority}}">
                    <div class="item-priority"></div>
                    <a href="{{ route('sensor_view', $sensor->id) }}">
                        <div class="welasensor">
                            <div class="corpus">
                                <div class="indicator"></div>
                                <div class="badge badge-co2">CO<sub>2</sub></div>
                                <div class="badge badge-no2">NO<sub>2</sub></div>
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
