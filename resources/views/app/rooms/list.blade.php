@extends('app.base')
@section('content')
    <h1>Your rooms</h1>

    <div class="sensors-wrapper">
        <div class="sensors-list">
            <div class="add-sensor_form">
                @include('app.partials.add_room')
            </div>
            @foreach($zones as $zone)
                <div class="item">
                    <div class="room-block">
                        <div class="room-block_header">
                            {{ $zone->name }}
                        </div>
                        <div class="room-block_content">
                            {{ $zone->description}}
                        </div>

                        <div class="clear-button"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
