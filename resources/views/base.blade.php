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
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
        ym(54280837, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/54280837" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</body>

</html>
