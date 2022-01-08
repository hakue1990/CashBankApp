<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/loans.css') }}" rel="stylesheet">

</head>
<body>
<nav>

    @guest
        <div class="logo" onclick="location.href='/';">
            <img src="./assets/logo.png" alt="">
        </div>
        <div class="login--register">
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('syslang.Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('syslang.Register') }}</a>
                </li>
            @endif
        </div>
    @else
    <!-- Authentication Links -->

        <div class="logo" onclick="location.href='/dashboard';"><img src="/assets/logo.png" alt=""></div>
        <ul class="nav-links">
            <li><a href="/offert">{{ __('syslang.Offers') }}</a></li>
            <!-- <li><a href="/credits">Kredyty</a></li> -->
            <li><a href="/loans">{{ __('syslang.Loans') }}</a></li>
            <li><a href="/contact">{{ __('syslang.Contact') }}</a></li>
        </ul>

        <div class="language">
            <div class="col-md-2 col-md-offset-6 text-right">
                <strong class="language-text">Select Language: </strong>
            </div>
            <div class="col-md-4">

                <select class="form-control changeLang">
                    <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                    <option value="pl" {{ session()->get('locale') == 'pl' ? 'selected' : '' }}>Polski</option>
                </select>
            </div>
        </div>

        <div class="nav-item-logged-userInfo">
            <div class="nav--user-ico">

                <img src="/assets/user.png" alt="user" class='nav-userico'>
                <a id="navbarDropdown" class="nav-item-logged-userInfo-username dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} {{ Auth::user()->surname }}
                </a>
            </div>


            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('syslang.Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    @endguest
</nav>
