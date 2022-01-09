<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cash Bank</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">

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
            <strong class="language-text">{{ __('syslang.select language') }} </strong>
        </div>
        <div class="col-md-4">

            <select class="form-control changeLang">
                <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                <option value="pl" {{ session()->get('locale') == 'pl' ? 'selected' : '' }}>Polski</option>
            </select>
        </div>
    </div>

        @if (Route::has('login'))
            <div class="nav-item-welcome-auth">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{__('syslang.Dashboard')}}</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('syslang.Logout') }}
                        </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="nav-item-welcome-login">{{__('syslang.Login')}}</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-item-welcome- register" >{{ __('syslang.Register') }}</a>
                    @endif
                @endauth
            </div>
        @endif

</nav>
<section class="welcome-section">
    <h1>{{ __('syslang.Welcome-h1') }}</h1>
    <p>{{ __('syslang.Welcome-p') }}</p>
    <article>
        <h3>{{ __('syslang.Welcome-h3') }}</h3>
        <img src="/assets/img/givingmoney.jpg" alt="">
    </article>

</section>

<footer>
      <h2>{{ __('syslang.Call now! 876 582 391') }}</h2>
      <a href="http://127.0.0.1:8000/contact" class='chat-ico'>
        <div class="chatIco">
          <img src="/assets/chatIco.png" alt="ico" />
        </div>
      </a>
    </footer>
    </body>
    <script type="text/javascript">

        var url = "{{ route('changeLang') }}";

        $(".changeLang").change(function(){
            window.location.href = url + "?lang="+ $(this).val();
        });

        console.log('skrypt języka');

    </script>
</html>

