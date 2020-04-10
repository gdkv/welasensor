@extends('base')
@section('content')
    @include('partials.title', [
        'header' => 'Verify your email address',
        'description' => 'A fresh verification link has been sent to your email address. Before proceeding, please check your email for a verification link. If you did not receive the email press button below.',
        'showSensor' => true
    ])

    <div>
        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button class="btn btn-left" type="submit">Click here to request another</button>
        </form>
    </div>
@endsection
