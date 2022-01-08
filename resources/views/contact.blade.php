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
        <div class="logo" onclick="location.href='/';"> 
        <img src="/assets/logo.png" alt=""></div>
        <ul class="nav-links">
        <li><a href="/offert">{{ __('syslang.Offers') }}</a></li>
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

        @if (Route::has('login'))
            <div class="nav-item-logged-userInfo">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{__('syslang.Dashboard')}}</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('syslang.Logout') }}
                        </a>
                @else
                    <a href="{{ route('login') }}" class="nav-item-welcome-login">{{__('syslang.Login')}}</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-item-welcome- register" >{{ __('syslang.Register') }}</a>
                    @endif
                @endauth
            </div>
        @endif

</nav>

<!-- Contact Form -->
    <main class="main__contact">
      <form
        method="POST"
        action="{{ route('login') }}"
        class="form-login form-contact"
      >
        <h2>Napisz do nas</h2>
        <div class="form--box">
          <input
            id="subject"
            type="text"
            name="subject"
            autocomplete="off"
            required
          />
          <label for="subject" class="label-name">
            <span class="content-name"> subject </span>
          </label>
        </div>
        <div class="form--box">
          <input
            id="name"
            type="text"
            name="name"
            autocomplete="off"
            required
          />
          <label for="name" class="label-name">
            <span class="content-name"> name </span>
          </label>
        </div>
        <div class="form--box">
          <input
            id="email"
            type="text"
            name="email"
            autocomplete="off"
            required
          />
          <label for="email" class="label-name">
            <span class="content-name"> email </span>
          </label>
        </div>

        <div class="form--box form--text">
          <input
            id="text"
            type="text"
            name="text"
            autocomplete="off"
            required
          />
          <label for="text" class="label-name label-text">
            <span class="content-name"> text </span>
          </label>
        </div>
      </form>
    </main>
    <footer>
      <h2>Zadzwoń teraz 876 582 391</h2>
      <a href="http://127.0.0.1:8000/contact" class='chat-ico'>
        <div class="chatIco">
          <img src="/assets/chatIco.png" alt="ico" />
        </div>
      </a>
    </footer>
    </body>
<script type="text/javascript" defer>

    var url = "{{ route('changeLang') }}";

    $(".changeLang").change(function(){
        window.location.href = url + "?lang="+ $(this).val();
    });

    console.log('skrypt języka');

</script>
</html>



