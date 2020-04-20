@extends('app.base')
@section('content')
    @if($empty)
        @include('app.partials.empty')
    @else
    <nav class="sensors">
        @foreach($sensors as $sensor)
            <a href="{{ route('sensor_data', $sensor->id) }}" class="{{ $sensor->isOnline() ? 'online' : 'offline' }} {{ $dataSensor->id === $sensor->id ? 'active' : '' }}">
                {{ $sensor->name }}
            </a>
        @endforeach
    </nav>
    @include('app.partials.dashboard')
@endif
@endsection
