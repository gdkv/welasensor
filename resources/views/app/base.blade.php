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
<main class="app">
    <aside class="app-aside">
        <div class="top">
            <div class="logo">
                <a href="{{ route('app') }}">
                    <img src="/assets/images/LOGO-app.svg" alt="">
                </a>
            </div>
            <div class="plan">Ultimate plan</div>
        </div>

        <nav>
            <div class="quick-links">
                <a href="/app/sensor/add">Add sensor</a>
                <a href="/app/zone/add">Add room</a>
            </div>
            <div class="main">
                <a href="/app/sensor">Sensors</a>
                <a href=/app/zone">Rooms</a>
                <a href="/app/settings">Settings</a>
                <a href="/app/reports">Reports</a>
                <a href="/app/limits">Limits and notify</a>
            </div>

            <div class="logout">
                <a href="{{ route('logout') }}" class="btn btn-red">Logout</a>
            </div>

        </nav>

    </aside>
    <section class="content">
        @yield('content')
    </section>

</main>
<script src="{{ mix('/assets/js/app.js') }}"></script>
</body>

</html>
