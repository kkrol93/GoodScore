@extends('layouts.app')
@section('content')
<div class="top container">
    <div class="row justify-content-around">
    <a href="{{ route('admin.dashboard') }}" class="col-12"><div class="logo admin"><span>Good</span>Score<i class="fas fa-book-open"></i></div></a>
    <a href="{{ route('admin.logout') }}" class="col-12 logout">Wyloguj się</a>
   
       
      
    <div class="col-md-8 card"> 
        <div class="row justify-content-center">
                <form method="POST" class="col-10" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-12">{{ __('Imię:') }}</label>

                            <div class="col-12">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="surname" class="col-12">{{ __('Nazwisko:') }}</label>
                            <div class="col-12">
                                <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ old('surname') }}" required autofocus>
                                @if ($errors->has('surname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-12">{{ __('Adres E-mail:') }}</label>
                            <div class="col-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Podałeś nieprawidłowy adres e-mail!</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-12">{{ __('Hasło:') }}</label>
                            <div class="col-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Podane hasła różnią się od siebie!</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-12">{{ __('Potwierdź hasło:') }}</label>
                            <div class="col-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>                          
                        <button type="submit" class="btn col-6 offset-3">
                            {{ __('Zarejestruj!') }}
                        </button>                          
                </form> 
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
