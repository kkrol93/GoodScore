@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-12 logo"><span>Good</span>Score<i class="fas fa-book-open"></i></div>
        <div class="col-md-4">
            <div class="panel-login">
                <div class="col-12">{{ __('Zresetuj swoje hasło') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class=" row ">
                            <label for="email" class="col-12">{{ __('Adres email') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>               
                            <div class="col-md-6">
                                <button type="submit" class="btn ">
                                    {{ __('Wyślij') }}
                                </button>
                            </div>   
                        </div>                     
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
