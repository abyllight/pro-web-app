<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset('favicon2.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon2.ico') }}" type="image/x-icon">

    <title>Прокуратура города Нур-Султан</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .cover-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 100vh;
            background: #000;
            opacity: .4;
            z-index: 1;
        }
        .container{
            position: relative;
            z-index: 100;
        }
        .page-holder {
            height: 100vh;
        }
        .bg-cover {
            background-size: cover !important;
        }
        .masthead {
            position: relative;
            z-index: 100;
            height: 80vh;
        }
    </style>
</head>
<body>
<div id="app">
    <div class="cover-bg">
    </div>
    <div style="background: url({{ asset('bg.jpg') }})" class="page-holder bg-cover">
        <nav class="navbar navbar-expand-md navbar-dark">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('login') }}"> <h5>Войти</h5></a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Выйти
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 text-center">
                        <img src="{{ asset('logo.png') }}" alt="Логотип" width="80">
                        <h1 class="font-weight-light text-white">Прокуратура города Нур-Султан</h1>
                        <p class="lead text-white">MOVING JUSTICE FORWARD.</p>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card shadow p-3 mb-5 bg-white rounded border-0">
                        <div class="card-body">
                            <h5 class="card-title">Подать заявление/жалобу</h5>
                            <p class="card-text text-secondary">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="{{ route('complaint-show') }}" class="btn btn-primary">Перейти</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow p-3 mb-5 bg-white rounded border-0">
                        <div class="card-body">
                            <h5 class="card-title">Результат рассмотрения</h5>
                            <p class="card-text text-secondary">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary disabled">Перейти</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow p-3 mb-5 bg-white rounded border-0">
                        <div class="card-body">
                            <h5 class="card-title">Запись на личный прием</h5>
                            <p class="card-text text-secondary">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary disabled">Перейти</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
@yield('js')
</body>
</html>
