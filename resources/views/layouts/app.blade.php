<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('image/1.png') }}" class="text-light" style="margin-top: -4px" width="28" height="25" alt="" style="background-image: #ffff">
                    PB | Permintaan Barang
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if (Route::has('login'))
                            @auth
                                @role('pengguna')
                                    <li class="nav-item">
                                        <a href="{{ route('home') }}" class="nav-link">{{ __('Home' )}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('request.cekbarang.indexcek') }}" class="nav-link">{{ __('Cek Barang' )}}</a>
                                    </li>
                                @endrole
                                @role('admin|admingudang')
                                    <li class="nav-item">
                                        <a href="{{route('barang.dashboard')}}" class="nav-link">{{ __('Dashboard' )}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('barang.index')}}" class="nav-link">{{ __('Stock' )}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('suplier.index')}}" class="nav-link">{{ __('Supliers' )}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('request.index')}}" class="nav-link">{{ __('Request' )}}</a>
                                    </li>
                                @endrole
                            @endauth
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                {{-- <label class="text-light px-1" style="margin-top: 13px">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </label> --}}
                                @role('pengguna')
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    @endrole
                                @role('admin|admingudang|suplier')
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="{{ asset('image/undraw_date_picker_gorr.png') }}" class="rounded-circle" height="30" width="30" alt="">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @role('admin|admingudang')
                                <a class="dropdown-item" href="{{ route('users.index') }}">Invite Member</a>
                                @endrole
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                @endrole
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
            <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
            </main>
    </div>
</body>
</html>
