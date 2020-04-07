@extends('base')
@section('content')
@include('partials.title', [
    'header' => 'Ready to buy new&nbsp;astonishing powerful sensors',
    'description' => 'Sensors will help you see your apartment\'s micro climate, help to correct the ideal temperature and humidity of the room and stay in touch with it',
    'showSensor' => false
])
@include('partials.items', [ 'items' => [
        ['title' => 'Basic', 'text' => '<p>A small Welasensor the size of a matchbox, which can be connected anywhere in the house where there is a charger, and it is also compatible with work from powerbank.</p>Get temperature, humidity,  pressure, luminosity, noise level<p><p>You can choose corpuse material from plastic or wood</p><p>Free cloud web application</p>', 'price' => '€ 39', 'itemBig' => true ],
        ['title' => 'CO2', 'text' => '<p class="red">All in basic</p> <p>Get CO2 level</p> <p>You can choose corpus material from plastic, wood and waterproof metal for outside use</p>', 'price' => '€ 49', ],
   ],
])
@endsection
