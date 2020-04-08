@extends('base')
@section('content')
@include('partials.title', [
    'header' => 'Ready to buy new&nbsp;astonishing powerful sensors',
    'description' => 'Sensors will help you see your apartment\'s micro climate, help to correct the ideal temperature and humidity of the room and stay in touch with it',
    'showSensor' => false
])
@include('partials.items', [ 'items' => $sensors, ])
@endsection
