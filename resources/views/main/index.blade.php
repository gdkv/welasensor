@extends('base')
@section('content')
@include('partials.title', [
    'header' => 'When house stay on sync with you',
    'description' => 'Humidity and temperature play an important role in the room where you and your loved ones spend most of your time. With the help of Velasensor you can set limits, receive reports and notifications if indicators go beyond the limits.',
    'showSensor' => true
])
@include('partials.items', ['items' => $plans,])
@endsection
