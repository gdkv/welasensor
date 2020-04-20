@extends('app.base')
@section('content')
    <section class="dashboard">
        <h1>
            {{ $sensor->name }}
            <div class="info-line">
                {{ $sensor->lastUpdate() }}
            </div>
        </h1>

        <div class="setting-line">
            <div class="setting-section">
                <h3>Settings</h3>

                <div class="form-content">
                    <form action="{{ route('sensor_view', $sensor->id) }}" method="POST">
                        @csrf
                        <div class="custom-select">
                            <select>
                                <option value="0">Zone</option>
                                <option value="1">Hall</option>
                                <option value="2">Kitchen</option>
                                <option value="3">Living room</option>
                                <option value="4">Bath</option>
                                <option value="5">Toilet</option>
                            </select>
                        </div>
                        <p>If you got more then one sensor in one room you can group it by zone, ex., Kitchen, and then name sensor like Near TV</p>
                        <input placeholder="Name" type="text" name="name" value="{{ $sensor->name }}">
                        <input placeholder="Mac address" type="text" name="mac" value="{{ $sensor->mac }}">
                        <button type="submit" class="btn btn-blue">
                            Edit
                        </button>

                    </form>

                </div>
            </div>

        </div>

        <div class="setting-line">
            <div class="setting-section">
                <h3>Limits <span class="badge">0/5</span></h3>

                <div class="form-content">
                    <form action="">
                        @csrf
                        <div class="limit wrapper">
                            @include('app.partials.limit', ['title' => 'Temperature', 'max' => 99, 'min' => 1, ])
                            @include('app.partials.limit', ['title' => 'Humidity', 'max' => 99, 'min' => 1, ])
                            @include('app.partials.limit', ['title' => 'Pressure', 'max' => 99, 'min' => 1, ])

                            @include('app.partials.limit', ['title' => 'Noise level', 'max' => 99, 'min' => 1, ])
                            @include('app.partials.limit', ['title' => 'Lux', 'max' => 99, 'min' => 1, ])
                            @include('app.partials.limit', ['title' => 'CO2', 'max' => 99, 'min' => 1, ])
                        </div>
                        <button type="submit" class="btn btn-blue">
                            Set limits
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="setting-line danger">
            <div class="setting-section">
                <h3>Danger zone</h3>
                <p>All information related to the sensor such as climate data and limits will also be deleted.</p>
                <p>
                    <a class="toogle " href="#delete-block" class="question-title">
                        Yes, I'm agree, I want to delete sensor
                    </a>
                </p>

                <div class="toogle-block delete-form" id="delete-block">
                    <div class="form-content">
                        <form action="{{ route('sensor_delete', $sensor->id) }}" method="POST">
                            @csrf
                            <input type="text" name="check" placeholder="Enter: I agree" required="required">
                            <button type="submit">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
