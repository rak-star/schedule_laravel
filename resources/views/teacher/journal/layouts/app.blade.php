<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}?v=<?=rand()?>">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v=<?=rand()?>">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <title>@yield('title') | Электронное расписание ЯМК</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm @yield('fix_top')">
    <a href="/" class="navbar-brand">
        <img src="{{ asset('logo.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
        Расписание ЯМК
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link @yield('link-journal')" href="{{ route('home_journal') }}">Журнал</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('link-answer')" href="{{ route('journal_answer') }}">Просмотр ответов</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('link-check')" href="{{ route('journal_check') }}">Сверка часов</a>
            </li>

        </ul>
        @auth
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item disabled @yield('link-teacher-journal')" href="{{ route('reset_password') }}">Смена пароля(В разработке)</a>
                        <a class="dropdown-item" href="{{ route('get_logout') }}">
                            {{ __('Выход') }}
                        </a>
                    </div>
                </li>
            </ul>
        @endauth
        <i class="fas fa-moon"></i>
    </div>
</nav>
<div id="app"></div>

    @yield('content')

<script src="{{ asset('js/app.js') }}"></script>
{{--<script src="{{ asset('js/popper.min.js') }}"></script>--}}
{{--<script src="{{ asset('js/bootstrap.min.js') }}"></script>--}}
@yield('scripts')
</body>
</html>

