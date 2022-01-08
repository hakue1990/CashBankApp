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
        <h2>{{ __('syslang.Make transaction') }}</h2>
        @if (isset($error))
            <h3>{{ $error }}</h2>
        @endif
    @csrf

    <div class="form--box">
        <input class="createType" type="text" name="type" value="bank transfer" readonly required>
    </div>
    <div class="form--box">
        <input id="amount" type="number" name="amount" step="0.01" required>
        <label for="amount" class="label-name">  
            <span class="content-name">
            {{ __('syslang.Make transaction amount') }}
            </span>
        </label>
    </div>

    <div class="form--box">
        <input id="recipient" type="text" name="recipient" required>
        <label for="recipient" class="label-name">  
            <span class="content-name">
            {{ __('syslang.Number of recipient account') }}
            </span>
        </label>
    </div>

    <div class="form--box">
        <input id="title" type="text" name="title" required>
        <label for="title" class="label-name">  
            <span class="content-name">
            {{ __('syslang.Transaction title') }}
            </span>
        </label>
    </div>

    <button type="submit" class="form--button">{{ __('syslang.Make transaction done') }}</button>
</form>
</div>