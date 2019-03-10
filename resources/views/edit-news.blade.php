@extends('layouts.app')
@section('content')
<div class="top container">
    <div class="row justify-content-around">
        <a href="{{ route('admin.dashboard') }}" class="col-12"><div class="logo admin"><span>Good</span>Score<i class="fas fa-book-open"></i></div></a>
        <a href="{{ route('admin.logout') }}" class="col-12 logout">Wyloguj się</a>      
    <div class="col-md-8 card"> 
        <div class="row justify-content-center">               
            {!! Form::open(['method'=>'PATCH', 'class'=>'col-11', 'action'=>['AdminController@updatenews', $news->id]]) !!}           
                   <div class="form-group">
                       <div class="col-12 control-label">
                            {!! Form::label('title', 'Tytuł:') !!}
                       </div>
                       <div class="col-12">
                           {!! Form::text('title',@$news->title ? :0,['class'=>'']) !!}
                       </div>
                   </div>
                   <div class="form-group">
                        <div class="col-12 control-label">
                             {!! Form::label('description', 'Treść newsa:') !!}
                        </div>
                        <div class="col-12">
                                {!! Form::textarea('description', @$news->description ? :0, ['class'=>'']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                            {!! Form::submit('Zapisz', ['class'=>'col-6 col-md-3 btn']) !!}
                    </div>
            {!! Form::close() !!}            
        </div>
    </div>            
    </div>
</div>
@endsection
