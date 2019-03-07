@extends('layouts.app')
@section('content')
<div class="top container">
    <div class="row justify-content-around">
    <a href="{{ route('admin.dashboard') }}" class="col-12"><div class="logo admin"><span>Good</span>Score<i class="fas fa-book-open"></i></div></a>
    <a href="{{ route('admin.logout') }}" class="col-12 logout">Wyloguj się</a>
   
       
      
    <div class="col-md-8 card"> 
        <div class="row justify-content-center">
                {!! Form::open(['url'=>'admin/users-panel', 'class'=>'col-11']) !!}
           
                <div class="form-group">
                    <div class="col-12 control-label">
                         {!! Form::label('name', 'Imię:') !!}
                    </div>
                    <div class="col-12">
                        {!! Form::text('name',null,['class'=>'']) !!}
                    </div>
                </div>
                <div class="form-group">
                        <div class="col-12 control-label">
                             {!! Form::label('surname', 'Nazwisko:') !!}
                        </div>
                        <div class="col-12">
                            {!! Form::text('surname',null,['class'=>'']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="col-12 control-label">
                         {!! Form::label('email', 'E-mail:') !!}
                    </div>
                    <div class="col-12">
                        {!! Form::text('email',null,['class'=>'']) !!}
                    </div>
                </div>
                <div class="form-group">
                        <div class="col-12 control-label">
                             {!! Form::label('password', 'Hasło:') !!}
                        </div>
                        <div class="col-12">
                            {!! Form::password('password',null,['class'=>'']) !!}
                        </div>
                </div>
                
                 <div class="form-group">
                         {!! Form::submit('Zapisz', ['class'=>'col-6 col-md-3 btn']) !!}
                 </div>
         {!! Form::close() !!}  
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
                                            <th scope="col">Usuń</th>
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
                                            <td><a href="{{url('admin/users-panel',$users->id)}}" class="col-12 btn">Edytuj</a></td>
                                            <td>
                                                    {!!Form::open(['action' => ['AdminController@destroyuser', $users->id], 'method' => 'POST', 'class' => 'col-12'])!!}
                                                    {{Form::hidden('_method', 'DELETE')}}
                                                    {{Form::submit('Usuń', ['class' => 'btn btn-red'])}}
                                                {!!Form::close()!!}  
                                            </td>    
                                            
                                            </tr>
                                         
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
    
       
            
    </div>
</div>

@endsection
