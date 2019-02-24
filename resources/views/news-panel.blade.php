@extends('layouts.app')
@section('content')
<div class="top container">
    <div class="row justify-content-around">
    <a href="{{ route('admin.dashboard') }}" class="col-12"><div class="logo admin"><span>Good</span>Score<i class="fas fa-book-open"></i></div></a>
    <a href="{{ route('admin.logout') }}" class="col-12 logout">Wyloguj się</a>
   
       
      
    <div class="col-md-8 card"> 
        <div class="row justify-content-center">
           
               
            {!! Form::open(['url'=>'admin/news-panel', 'class'=>'col-11']) !!}
           
                   <div class="form-group">
                       <div class="col-12 control-label">
                            {!! Form::label('title', 'Tytuł:') !!}
                       </div>
                       <div class="col-12">
                           {!! Form::text('title',null,['class'=>'']) !!}
                       </div>
                   </div>
                   <div class="form-group">
                        <div class="col-12 control-label">
                             {!! Form::label('description', 'Treść newsa:') !!}
                        </div>
                        <div class="col-12">
                                {!! Form::textarea('description', null, ['class'=>'']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                            {!! Form::submit('Zapisz', ['class'=>'col-6 col-md-3 btn']) !!}
                    </div>
            {!! Form::close() !!}          
            
                @foreach ($news as $news )
                <div class="col-11 news-edit"><div class="row">
                 <a href="{{url('admin/news-panel',$news->id)}}" class="col-2 btn">Edytuj</a><a href="{{url('admin/news-panel',$news->id)}}" class="col-2 btn">Usuń</a><div class="col-8">{{$news->title}}</div>
                </div></div>
                @endforeach
        </div>
    </div>
    
									
    
       
            
    </div>
</div>

@endsection
