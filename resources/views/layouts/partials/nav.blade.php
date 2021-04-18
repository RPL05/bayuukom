<nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-image: linear-gradient(#04519b, #044687 60%, #033769);">
    <div class="container">
        <a class="navbar-brand text-light" href="{{ url('/') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill mb-1" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg>
            Aplikasi Jasa Suci
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
        @if (Route::has('login'))
            @auth
            <ul class="navbar-nav mr-auto">
                @role('admin|user|kasir')
                    <li class="nav-item">
                        <a href="{{ route('beranda') }}" class="nav-link text-light">{{ __('Beranda' )}}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('transaksi.index') }}" class="nav-link text-light">{{ __('Transaksi' )}}</a>
                    </li>
                @endrole
                @role('admin|kasir')
                <li class="nav-item">
                    <a href="{{ route('laporan.index') }}" class="nav-link text-light">{{ __('Laporan' )}}</a>
                </li>
                @endrole
                @role('admin')
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Data Master
                        </a>
                        <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('masterbiaya.index') }}">Data Biaya</a></li>
                            <li><a class="dropdown-item" href="{{ route('users.index') }}">Data User</a></li>
                        </ul>
                    </li>
                @endrole
            </ul>
            @endauth
        @endif

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown d-flex">
                        <label class="text-light px-1" style="margin-top: 13px">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </label>
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="{{ asset('image/undraw_date_picker_gorr.png') }}" class="rounded-circle" height="30" width="30" alt="">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
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
