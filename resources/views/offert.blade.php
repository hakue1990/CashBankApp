<head>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/loans.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        <h1>{{ __('syslang.Cash loan') }}</h1>
        <h3>{{ __('syslang.Borrow as much money as you need!') }}

</h3>
        <p>
       <b> {{ __('syslang.Complete the online application,') }}</b> {{ __('syslang.quick decision To submit the application, you must provide your personal data and have a bank account. Information about the loan is always available online. You will receive a reminder from us about the upcoming payment date and you will decide whether to extend the repayment date or pay off the whole.') }}
        </p>
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
      <main>
        <section class="section__loan">
          <h1>{{ __('syslang.Mortgage!') }}</h1>
          <p>
         <b> {{ __('syslang.The minimum required level of own contribution') }}</b>
         {{ __('syslang.currently amounts to 2% of the property value. Borrowers would have to engage 45 thousand. PLN own savings, and the loan amount in this scenario is 405 thousand. zloty. CashBank will NOT require a higher deposit and offers loans with a ridiculously low deposit.
    Contact us - you will arrange everything without unnecessary formalities!') }}
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
          <h1>{{ __('syslang.Credit card') }}</h1>
          <p>
          <b>{{ __('syslang.A gift card with PLN 20,000 as a gift') }}</b>
          {{ __('syslang.- to start - absolutely free!') }}
            <b>{{ __('syslang.You can have it too!') }}</b> <br> <br>
            {{ __('syslang.You can conveniently pay with a credit card for purchases in stores in Poland and abroad, and on the Internet. you will not pay a single cent of interest on non-cash transactions. Do shopping today, pay by card. These are just a few of the benefits of the Cashbank credit card!') }}
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
