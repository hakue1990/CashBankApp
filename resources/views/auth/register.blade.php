@extends('layouts.app')

@section('content')
<div class="register-container">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" class='register-form'>
<h2>Zarejestruj się</h2>
                        @csrf
                        <div class="form--box">
                                <input  id="name" type="text" name="name"  autocomplete='off' required>
                                <label for="name" class="label-name">
                                <span class="content-name">
                                {{ __('syslang.Name') }}
                                </span>
                                </label>
                                </div>

                                <div class="form--box">
                                <input  id="surname" type="text" name="surname"  autocomplete='off' required>
                                <label for="surname" class="label-name">
                                <span class="content-name">
                                {{ __('syslang.Surname') }}
                                </span>
                                </label>
                                </div>

                                <div class="form--box">
                                <input  id="PESEL" type="text" name="PESEL"  autocomplete='off' required>
                                <label for="PESEL" class="label-name">
                                <span class="content-name">
                                {{ __('syslang.PESEL') }}
                                </span>
                                </label>
                                </div>

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
                                <input  id="phone" type="text" name="phone"  autocomplete='off' required>
                                <label for="phone" class="label-name">
                                <span class="content-name">
                                {{ __('syslang.Phone') }}
                                </span>
                                </label>
                                </div>

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

                                <div class="form--box">
                                <input  id="password_confirmation" type="password" name="password_confirmation"  autocomplete='off' required>
                                <label for="password_confirmation" class="label-name">
                                <span class="content-name">
                                {{ __('syslang.Confirm Password') }}
                                </span>
                                </label>
                                </div>

                                <button type="submit" class="form--button">
                                    {{ __('Register') }}
                   </button>
           </form>
    </div>
</div>

      <a href="http://127.0.0.1:8000/contact" class="register-chat">
        <div class="chatIco">
          <img src="/assets/chatIco.png" alt="ico" />
        </div>
      </a>
    
@endsection
