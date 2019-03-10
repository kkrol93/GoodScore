@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-12 logo"><span>Good</span>Score<i class="fas fa-book-open"></i></div>
        <div class="col-md-5">
                <div class="panel-login">
                        <div class="col-12">{{ __('Zresetuj swoje hasło') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('admin.password.email') }}">
                        @csrf
                        <div class="row">
                            <label for="email" class="col-12">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                           
                        <button type="submit" class="btn col-6 offset-3 ">
                            {{ __('Wyślij') }}
                        </button>                      
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
