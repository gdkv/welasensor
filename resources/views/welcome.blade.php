<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Welasensor Control - Мониторинг и контроль датчиков</title>


    <link rel="apple-touch-icon" sizes="180x180" href="{% static '/images/apple-touch-icon.png' %}">
    <link rel="icon" type="image/png" sizes="32x32" href="{% static '/images/favicon-32x32.png' %}">
    <link rel="icon" type="image/png" sizes="16x16" href="{% static '/images/favicon-16x16.png' %}">
    <link rel="manifest" href="{% static '/site.webmanifest' %}">
    <link rel="mask-icon" href="{% static '/images/safari-pinned-tab.svg' %}" color="#aeaeae">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{ mix('/assets/css/vendor.bundle.base.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ mix('/assets/css/vendor.bundle.addons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ mix('/assets/css/materialdesignicons.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ mix('/assets/css/style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ mix('/assets/css/app.css') }}" type="text/css" />
</head>

<body>
    <div class="container-scroller">

        @include('partials._navbar', [])

        <div class="container-fluid page-body-wrapper">

            @include('partials._sidebar', ['name' => 'Dima Gudkov', 'position' => 'Administrator'])

            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <footer class="footer">
                    <div class="container-fluid clearfix">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
                  <a href="//welasensor.ru/" target="_blank">Welasensor</a>. Все права защищены.</span>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script src="{{ mix('/assets/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ mix('/assets/js/misc.js') }}"></script>
    <script src="{{ mix('/assets/js/app.js') }}"></script>
</body>

</html>
