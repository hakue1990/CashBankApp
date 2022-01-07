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
    <div class="nav-item-welcome">
            <div class="nav-item-welcome-menu">
             <h1 class="nav-item-welcome-menu-h1">CashBank</h1>
             <ul class="nav-item-welcome-menu-links">
                  <li><a href="/offert">Oferty</a></li>
                  <li><a href="/credits">Kredyty</a></li>
                  <li><a href="/loans">Pożyczki</a></li>
                  <li><a>Kontakt</a></li>
             </ul>
            </div>
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
            <div class="nav-item-welcome-auth">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{__('syslang.Dashboard')}}</a>
                @else
                    <a href="{{ route('login') }}" class="nav-item-welcome-login">{{__('syslang.Login')}}</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-item-welcome- register" >{{ __('syslang.Register') }}</a>
                    @endif
                @endauth
            </div>
        @endif

    </div>
    </body>
    <script type="text/javascript">

        var url = "{{ route('changeLang') }}";

        $(".changeLang").change(function(){
            window.location.href = url + "?lang="+ $(this).val();
        });

        console.log('skrypt języka');

    </script>
</html>

