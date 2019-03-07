@extends('layouts.app')

@section('content')
<div class="top container">
    <div class="row">
       
            <div class="col-12 col-md-3">
               
                <a href="{{ route('home') }}"><div class="logo"><span>Good</span>Score<i class="fas fa-book-open"></i></div></a>
                <a href="{{ route('user.logout') }}" class="col-12 logout">Wyloguj się</a>
                <a href="{{ route('scores') }}" class="nav">Moje wyniki</a>
                <a href="{{ route('rewards') }}" class="nav">Nagrody</a>
                <a href="{{ route('regulamin') }}" class="nav">Regulamin</a>
                <a href="{{ route('changePassword') }}" class="nav">Zmień hasło</a>
                
            </div>
            <div class="col-md-9">
                <div class="col-12 card">
                    <div class="row justify-content-center">
                        <div class="panel-body col-9">
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            <form class="" method="POST" action="{{ route('changePassword') }}">
                                {{ csrf_field() }}
        
                                <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                    <label for="new-password" class="col-md-12 control-label">Aktualne hasło:</label>
        
                                    <div class="col-md-12">
                                        <input id="current-password" type="password" class="" name="current-password" required>
        
                                        @if ($errors->has('current-password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('current-password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                    <label for="new-password" class="col-md-12 control-label">Nowe hasło:</label>
        
                                    <div class="col-md-12">
                                        <input id="new-password" type="password" class="" name="new-password" required>
        
                                        @if ($errors->has('new-password'))
                                            <span class="help-block">
                                                <strong style="color: red;">Podane hasła różnią się!</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="new-password-confirm" class="col-md-12 control-label">Potórz hasło:</label>
        
                                    <div class="col-md-12">
                                        <input id="new-password-confirm" type="password" class="" name="new-password_confirmation" required>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn ">
                                            Zmień hasło
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>
                 </div>
                                </div>
                                    
                        </div>
    </div>
</div>
@endsection
