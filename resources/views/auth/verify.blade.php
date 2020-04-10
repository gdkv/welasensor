@extends('base')
@section('content')
    @include('partials.title', [
        'header' => 'Verify your email address',
        'description' => 'A fresh verification link has been sent to your email address.',
        'showSensor' => true
    ])
    {{ __('Before proceeding, please check your email for a verification link.') }}
    {{ __('If you did not receive the email') }},
    <div class="form-wrapper">
        <div class="form form-aside">
            <div class="form-content">
                <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit">Click here to request another</button>
                </form>
            </div>
        </div>
    </div>
@endsection
