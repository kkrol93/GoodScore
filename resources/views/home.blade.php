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
                <div class="row">
                    <div class="col-12 card"> Witaj, @foreach ($userq as $userq ) {{$userq->name}} {{$userq->surname }} @endforeach
                           
                         
                          
                        
                        </div>
                    <div class="col-12 title">News</div>
                    <div class="row news-list">
                            @include('news') 
                    
                </div>
                    <div class="col-12 title">Liga mistrzów</div>
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead class="head-table">
                                <tr>
                                <th scope="col"></th>
                                <th scope="col">Imie</th>
                                <th scope="col">Nazwisko</th>
                                <th scope="col">Quiz</th>
                                <th scope="col">Sprzedaż</th>
                                <th scope="col">Suma pkt.</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usertable->slice(0, 3) as $user )
                                                  {{--@php--}}
                                                  {{--$quizpkt = $usertable->quiz/30*80;--}}
                                                  {{--$salespkt= $usertable->sales/100*120;;--}}
                                                  {{--$allpkt = $quizpkt+$salespkt;--}}
                                                  {{----}}
                                                  {{----}}
                                                  {{--@endphp --}}
                                            <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->surname}}</td>
                                            <td>{{$user->quizpkt}}pkt</td>
                                            <td>{{$user->salespkt}}pkt</td>
                                            <td>{{$user->total}}pkt</td>

                                            </tr>
                                         
                                            @endforeach
                            </tbody>
                            </table>

                        
                        </div>
                        @include('quiz') 
                    
            </div>
    </div>
</div>
@endsection
