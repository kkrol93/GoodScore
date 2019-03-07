@extends('layouts.app')
@section('content')
<div class="top container">
    <div class="row justify-content-around">
    <a href="{{ route('admin.dashboard') }}" class="col-12"><div class="logo admin"><span>Good</span>Score<i class="fas fa-book-open"></i></div></a>
    <a href="{{ route('admin.logout') }}" class="col-12 logout">Wyloguj się</a>
   
       
      
    <div class="col-md-12 card"> 
        <div class="row justify-content-center">            
 

             
           

         <div class="col-6 col-md-3">
              <div class="score">Średnia sprzedaży:</div>
         <div class="pkt"><span>{{ number_format( $usersum, 2 ) }}</span><span>%</span></div>
         </div>
         <div class="col-6 col-md-3">
              <div class="score">Średnia poprawnych odpowiedzi za quiz:</div>
              
              <div class="pkt"><span>{{ number_format( $userQuiz, 0 ) }}</span></div>
         </div>
         
      
     
          
    
</div></div>
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
</div>

@endsection
