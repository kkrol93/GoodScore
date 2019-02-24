@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row  justify-content-center">
        <div class="col-md-4  panel-login">
            <div class="row  justify-content-center">
                <div class="col-12 logo"><span>Good</span>Score<i class="fas fa-book-open"></i></div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row">
                            <label for="email" class="col-12">{{ __('E-Mail') }}</label>

                            <div class="col-12">
                                <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <label for="password" class="col-12">{{ __('Hasło') }}</label>

                            <div class="col-12">
                                <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">                                
                                    <input class="width" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember">
                                        {{ __('zapamiętaj mnie') }}
                                    </label>
                               
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="offset-3 col-6 btn">
                                    {{ __('Zaloguj się') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a  class="forget-link btn-link" href="{{ route('password.request') }}">
                                        {{ __('Zapomniałeś hasła?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>  
            </div>
        </div>
    </div>
                
@endsection
