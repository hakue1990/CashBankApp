<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/create.css') }}" rel="stylesheet">
</head>

                    <div class="navbar-collapse">
                               <div class="logo" onclick="location.href='/dashboard';">
                                   <img src="./assets/logo.png" alt="">
                               </div>
                    </div>

<div class="create-container">
    
    <form action="{{ route('transactions.store') }}" method="POST" class="register-form">
        <h2>{{ __('syslang.Top up for phone') }}</h2>
        @if ($message = Session::get('error'))
        <h3>{{ $message }}</h2>
        @endif
        @csrf
        <div class="form--box">
            <input class="createType" type="text" name="type" value="top-up phone" required readonly>
        </div>  

        <div class="form--box">
            <input id="amount" type="number" name="amount" step="0.01" required>
            <label for="amount" class="label-name">
                <span class="content-name">
                {{ __('syslang.Top up for phone amount') }}
                </span>
        </label>
    </div>

    <div class="form--box">
        <input id="title" type="text" name="title" required>
        <label for="title" class="label-name">  
            <span class="content-name">
            {{ __('syslang.Top up for phone title') }}
            </span>
        </label>
    </div>

    <div class="form--box">
        
        <input id="phone_number" type="text" name="phone_number" required>
        <label for="phone_number" class="label-name">
            <span class="content-name">
            {{ __('syslang.Top up for phone phone number') }}
            </span>
        </label>
    </div>


        <button class="form--button" type="submit">{{ __('syslang.Top up for phone transaction') }}</button>
    </form>
</div>
    