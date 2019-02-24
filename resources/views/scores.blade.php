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
                         @foreach ($user as $user )
                      @php
                           $quizpkt = $user->quiz/30*80;
                           $salespkt= $user->sales/100*120;;
                           $allpkt = $quizpkt+$salespkt;
                      @endphp 

                   <div class="col-6 col-md-3">
                        <div class="score">Zdobyte punkty:</div>
                   <div class="pkt"><span>{{round($allpkt)}}</span>pkt</div>
                   </div>
                   <div class="col-6 col-md-3">
                        <div class="score">Punkty za quiz:</div>
                        
                        <div class="pkt"><span>{{round($quizpkt)}}</span>pkt</div>
                   </div>
                   <div class="col-6 col-md-3">
                        <div class="score">Punkty za sprzedaż:</div>
                        <div class="pkt"><span>{{round($salespkt)}}</span>pkt</div>
                   </div>
                   <div class="col-6 col-md-3">
                        <div class="score">Twoja pozycja</div>
                        <div class="pkt"><span>10</span></div>
                   </div>
                   <div class="col-6 col-md-3">
                        <div class="score">Quiz:</div>
                        <div class="pkt"><span>{{$user->quiz}}/30</span></div>
                   </div>
                   <div class="col-6 col-md-3">
                        <div class="score">Sprzedaż:</div>
                        <div class="pkt"><span>{{$user->sales}}</span>%</div>
                   </div>
                </div>
               
                    
                @endforeach
             </div>
             <div class="title">Ranking</div>
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

                                                   
                                              
                                                  @foreach ($usertable as $user )
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
                                    
                        </div>
    </div>
</div>
@endsection
