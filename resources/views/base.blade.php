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
    <main id="panel" class="welcome">
        <header>
            <div class="logo">
                <a href="/"><img src="/assets/images/logo.svg" alt=""></a>
            </div>
             @include('partials.nav', ['mobile' => false,])
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

        @if(Cookie::get('hideCookieMessage') != '1')
            @include('partials.cookie')
        @endif
    </main>

    <div id="mobile-menu">
        @if(Auth::check())
            @include('auth.user')
        @elseif(Route::currentRouteName()=='register')
            @include('auth.register')
        @else
            @include('auth.login')
        @endif
        @include('partials.nav', ['mobile' => true,])

    </div>

    <script src="{{ mix('/assets/js/app.js') }}"></script>
</body>

</html>
