@extends('layouts.app')
@section('content')
<div class="top container">
    <div class="row justify-content-around">
    <a href="{{ route('admin.dashboard') }}" class="col-12"><div class="logo admin"><span>Good</span>Score<i class="fas fa-book-open"></i></div></a>
    <a href="{{ route('admin.logout') }}" class="col-12 logout">Wyloguj się</a>
   
       
      
    <div class="col-md-3 card"> 
        <div class="row justify-content-center">
        <a href="{{ route('admin.register-panel') }}" class="add"><div class="add-icons"><i class="fas fa-plus"></i><i class="fas fa-user"></i></div><div>Dodaj użytkownika</div></a>
        </div>
    </div>
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
                                            <th scope="col">Edytuj</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                                   
                                              
                                                  @foreach ($users as $key => $users )
                                                  @php
                                                  $quizpkt = $users->quiz/30*80;
                                                  $salespkt= $users->sales/100*120;;
                                                  $allpkt = $quizpkt+$salespkt;
                                                  
                                                  
                                                  @endphp 
                                            <tr>
                                            <th scope="row">{{ ++$key }}</th>
                                            <td>{{$users->name}}</td>
                                            <td>{{$users->surname}}</td>
                                            <td>{{round($quizpkt)}}pkt</td>
                                            <td>{{round($salespkt)}}pkt</td>
                                            <td>{{round($allpkt)}}pkt</td>
                                            <td><a href="#" class="btn">Edytuj</a></td>    
                                            
                                            </tr>
                                         
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
    
       
            
    </div>
</div>

@endsection
