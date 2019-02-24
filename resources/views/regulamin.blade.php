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
                
            </div>
            <div class="col-md-9">
                <div class="col-12 card">
                    <div class="row justify-content-center">
                       Regulamin
                    </div>
                 </div>
                                </div>
                                    
                        </div>
    </div>
</div>
@endsection
