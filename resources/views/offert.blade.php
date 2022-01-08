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

        <div class="logo" onclick="location.href='/';"><img src="/assets/logo.png" alt=""></div>
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

<!-- Contact Form -->
    <main>
      <section class="section__loan">
        <h1>Pożyczka Gotówkowa</h1>
        <h3>Pożycz tyle pieniędzy, ile potrzebujesz!

            </h3>
            <p class="content1"> {{ __('syslang.Content1') }} </p>
        <div class="images-box">
            <div class="image-box">
                <img src="/assets/img/offer1.jpg" alt="loan1">
            </div>
            <div class="image-box">
                <img src="/assets/img/offer2.jpg" alt="loan2">
            </div>
            <div class="image-box">
                <img src="/assets/img/offer3.jpg" alt="loan3">
            </div>
          </div>
      </section>
        <section class="section__loan">
          <h1>Kredyt hipoteczny!</h1>
          <p>
         <b> Minimalnym wymagany poziom wkładu własnego</b>
          wynosi obecnie <b>2%</b> wartości nieruchomości. Kredytobiorcy musieliby zaangażować 45 tys. zł własnych oszczędności, a kwota kredytu w takim scenariuszu wynosi 405 tys. zł. CashBank NIE będzue wymagać  wyższej wpłaty i posiada  w ofercie kredyty z śmiesznie niskim wkładem. <br>
          Skontaktuj się z nami - załatwisz wszystko bez zbędnych formalności!
          </p>
          <div class="images-box">
            <div class="image-box">
                <img src="/assets/img/offer4.jpg" alt="1">
            </div>
            <div class="image-box offer_wide__image">
                <img src="/assets/img/offer5.jpg" alt="2">
            </div>

        </section>
        <section class="section__loan">
          <h1>Karta kredytowa</h1>
          <p>
          <b> Karta  z 20 000 zł w prezencie</b>
          - na start - zupełnie za darmo!
            <b>Ty też możesz ją mieć!</b> <br> <br>
            Kartą kredytową wygodnie płacisz za zakupy w sklepach w Polsce i za granicą oraz w internecie.
            nie zapłacisz ani grosza odsetek od transakcji bezgotówkowych. Zrób zakupy dziś, zapłać kartą.
            To tylko kilka korzyści, które przyniesie ci karta kredytowa w Cashbank!
          </p>
          <div class="images-box">
            <div class="image-box">
                <img src="/assets/img/offer6.jpg" alt="1">
            </div>
            <div class="image-box image-box__wide">
                <img src="/assets/img/offer7.jpg" alt="2">
            </div>

        </section>
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

