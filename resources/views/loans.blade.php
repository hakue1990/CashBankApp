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
        <h1>{{ __('syslang.Do you need a loan?') }}</h1>
        <p>
        {{ __('syslang.Choosing the best cash loan offer can be difficult, especially if the loan decision is dictated by a sudden need. In such a situation, rush is a bad advisor, so read carefully the available offers and choose the most advantageous option. interest is interest on the borrowed amount that you will pay back throughout the repayment period, and the commission is a one-time fee for granting the loan. Depending on the offer, you will pay the commission on the day of receiving the contract or divide it into installments. Remember to compare the offers of at least several banks. A useful tool are loan calculators that banks provide on their websites. After entering the amount you need, you will see what the installment and commission will be. It is also worth getting acquainted with the promotions. Banks sometimes offer commission-free or reduced-interest loans as part of special offers, such as after-holiday sales.') }}</p>
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
          <h1>{{ __('syslang.Even up to PLN 500,000, an ID card is enough!') }}</h1>
          <p>
          {{ __('syslang.Do you know this nightmare: the need to prepare an employment document, income certificate, ID card, second identity document, other documents required by banks? Stop! We do not have it! CashBank are installment loans as proof. You borrow money: fast, easy and stress-free. We respect your time! Taking out a loan has never been so easy. At Aasa, you only need an ID card to undergo the verification process. Our motto is minimum formalities and maximum customer satisfaction. We perfectly know how valuable your time is, which is why we respect it.') }}
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
      <h2>{{ __('syslang.Call now! 876 582 391') }}</h2>
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
