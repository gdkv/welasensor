<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Welasensor</title>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{ mix('/assets/css/app.css') }}" type="text/css" />
</head>
<body class="{{ Auth::user()->darkTheme ? 'dark' : 'light' }}">
<main id="panel" class="app">
    <aside class="app-aside">
        <div class="top">
            <div class="logo">
                <a href="{{ route('app') }}">
                    <img src="/assets/images/LOGO-app.svg" alt="">
                </a>
            </div>
            <div class="plan">Ultimate plan</div>
        </div>
        @include('app.partials.aside')
    </aside>
    <section class="content">
        <div class="mobile-header">
            <div class="logo">
                <a href="{{ route('app') }}">
                    <img src="/assets/images/LOGO-app.svg" alt="">
                </a>
            </div>
            <div class="mobile-nav toggle-button">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert">
                <p>{{ session('status') }}</p>
            </div>
        @endif
        @yield('content')
    </section>

</main>
<div id="mobile-menu" class="app-mobile-menu">
    <aside class="app-aside">
    @include('app.partials.aside')
    </aside>

</div>
<script src="{{ mix('/assets/js/app.js') }}"></script>
</body>

</html>
