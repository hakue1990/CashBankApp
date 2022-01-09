@extends('layouts.app')

@section('content')
    
           
                    <form method="POST" action="{{ route('login') }}" class='form-login'>
                        <h2> {{ __('syslang.CashBank Login') }}</h2>
                        @csrf
                                <div class="form--box">
                                <input  id="email" type="text" name="email"  autocomplete='off' required>
                                <label for="email" class="label-name">
                                <span class="content-name">
                                {{ __('syslang.Email') }}
                                </span>
                                </label>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="form--box">
                                <input  id="password" type="password" name="password"  autocomplete='off' required>
                                <label for="password" class="label-name">
                                <span class="content-name">
                                {{ __('syslang.Password') }}
                                </span>
                                </label>
                                </div>

@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('syslang.Remember Me') }}
                                    </label>
                                </div>
                    <button type="submit" class='form--button'>
                        {{ __('syslang.Login') }}
                    </button>
             @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}" class='chat-ico'>
                    {{ __('syslang.Forgot Your Password?') }}
                </a>
             @endif
         </form>
@endsection
