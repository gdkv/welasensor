@extends('app.base')
@section('content')
<nav class="sensors">
    @foreach($sensors as $sensor)
        <div class="{{ $sensor->isOnline() ? 'online' : 'offline' }} {{ $loop->first ? 'active' : '' }}">
            {{ $sensor->name }}
        </div>
    @endforeach
</nav>
@endsection
