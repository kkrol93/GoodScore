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
                    <div class="row justify-content-center reward-title">
                       Nagrody
                    </div>
                 </div>
                 <div class="row ">
                    <img class=" col-6 rewards" src="https://www.szkolneblogi.pl/static/media/users/private/maria.kon/2qtznzn.gif" alt="">
                    <img class=" col-6 rewards"src="https://prowly-uploads.s3.eu-west-1.amazonaws.com/uploads/4277/assets/26479/Medicover_Logo.png" alt="">
                    <img class=" col-6 rewards" src="http://bielsko-befit.pl/wp-content/uploads/2018/05/karta.png" alt="">
                    <img class=" col-6 rewards" src="https://media1.tenor.com/images/74af153c37829c49fa897a5160713549/tenor.gif" alt="">
                </div>
            </div>                                    
        </div>
    </div>
</div>
@endsection
