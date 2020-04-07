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
<body>
    <main class="welcome">
        <header>
            <div class="logo">
                <a href="/"><img src="/assets/images/logo.svg" alt=""></a>
            </div>
             @include('partials.nav', [])
        </header>
        @yield('content')
        <aside>
            @if(Auth::check())
                @include('auth.user')
            @elseif(Route::currentRouteName()=='register')
                @include('auth.register')
            @else
                @include('auth.login')
            @endif
        </aside>

        <div class="cookie">
            <div class="cookie-icon">
                <img src="/assets/images/cookie.png" alt="" />
            </div>
            <div class="cookie-text">
                We use cookies for your better experience. <a href="">About cookies read here</a>
            </div>
            <div class="cookie-close">
                <img src="/assets/images/cross.svg" alt="" />
            </div>
        </div>
    </main>
    <script src="{{ mix('/assets/js/app.js') }}"></script>
</body>

</html>
