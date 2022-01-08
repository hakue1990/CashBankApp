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
    <main>
      <section class="section__loan">
        <h1>Potrzebujesz pożyczki?</h1>
        <p>
        Wybór najlepszej oferty pożyczki gotówkowej może być trudny, szczególnie jeśli decyzja o pożyczce jest podyktowana nagłą potrzebą. W takiej sytuacji pośpiech jest złym doradcą, dlatego zapoznaj się dokładnie z dostępnymi ofertami i wybierz najkorzystniejszą opcję.

        procentowanie to odsetki od pożyczonej kwoty, które będziesz spłacać przez cały okres spłaty, a prowizja to jednorazowa opłata za udzielenie pożyczki. W zależności od oferty, prowizję zapłacisz w dniu otrzymania umowy lub rozłożysz ją na raty.
Pamiętaj, żeby porównać oferty co najmniej kilku banków. Przydatnym narzędziem są kalkulatory pożyczkowe, które banki udostępniają na swoich stronach. Po wpisaniu kwoty, którą potrzebujesz, zobaczysz jaka będzie wysokość raty i prowizji.
Warto również zapoznać się z promocjami. Banki czasami oferują pożyczki bez prowizji lub z obniżonym oprocentowaniem w ramach ofert specjalnych, np. z okazji wyprzedaży poświątecznych.</p>
        <div class="images-box">
            <div class="image-box">
                <img src="/assets/img/loan1.jpg" alt="loan1">
            </div>
            <div class="image-box">
                <img src="/assets/img/loan2.jpg" alt="loan2">
            </div>
            <div class="image-box">
                <img src="/assets/img/loan3.jpg" alt="loan3">
            </div>
          </div>
      </section>
        <section class="section__loan">
          <h1>Nawet do 500 000 PLN
            wystarczy dowód osobisty!</h1>
          <p>
          Czy znasz ten koszmar: konieczność przygotowania dokumentu o zatrudnieniu, zaświadczenie o dochodach, dowód osobisty, drugi dokument tożsamości, inne dokumenty wymagane przez banki?

        Stop!
        U nas tego nie ma!
        CashBank to  pożyczki ratalne na dowód. Pożyczasz pieniądze: szybko, łatwo i bez stresu.
        Szanujemy Twój czas!

Wzięcie pożyczki jeszcze nigdy nie było takie proste. W Aasa wystarczy tylko dowód osobisty, aby przejść proces weryfikacyjny. Nasza dewiza to minimum formalności i maksimum zadowolenia klienta. Doskonale wiemy, jak cenny jest Twój czas, dlatego go szanujemy.
          </p>
          <div class="images-box">
            <div class="image-box">
                <img src="/assets/img/loan4.jpg" alt="1">
            </div>
            <div class="image-box image-box__wide">
                <img src="/assets/img/loan5.jpg" alt="2">
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
