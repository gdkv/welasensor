@extends('app.base')
@section('content')
    <h1>Your sensors</h1>

    <div class="sensors-wrapper">
        <div class="sensors-list">
            <div class="add-sensor_form">
                <h1>Add sensor</h1>
                <div class="form-content">
                    <form class="" action="{{ route('sensor_add') }}">
                        <div class="form-row">
                            <input placeholder="Mac address" type="text" name="mac" />
                            <span class="input-badge input-badge_bg">
                                ?
                            </span>
                        </div>
                        <p>You can easely find sensor’s MAC address on backside of corpus, or just scan QR code, and this fild will be autofilled</p>
                        <div class="form-row">
                            <input placeholder="Sensor name" type="text" name="name" />
                        </div>

                        <button type="submit">Add</button>
                    </form>
                </div>
            </div>
            @foreach($sensors as $sensor)
                <div class="item">
                    <div class="welasensor">
                        <div class="corpus">
                            <div class="indicator"></div>
                        </div>
                        <div class="plug"></div>
                    </div>
                    <div class="welasensor-info">
                        <div class="welasensor-info-mac">{{ $sensor->mac }}</div>
                        <div class="welasensor-info-name">
                            {{ $sensor->name }}
                        </div>
                        <div class="welasensor-info-time">
                            Last data update {{ $sensor->lastUpdate() }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
