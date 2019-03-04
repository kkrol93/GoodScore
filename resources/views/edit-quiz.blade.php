@extends('layouts.app')
@section('content')
<div class="top container">
    <div class="row justify-content-around">
    <a href="{{ route('admin.dashboard') }}" class="col-12"><div class="logo admin"><span>Good</span>Score<i class="fas fa-book-open"></i></div></a>
    <a href="{{ route('admin.logout') }}" class="col-12 logout">Wyloguj się</a>
   
       
      
    <div class="col-md-8 card"> 
        <div class="row justify-content-center">
           
           
                
            
               
            {!! Form::open(['method'=>'PATCH', 'class'=>'col-11', 'action'=>['AdminController@updateexam', $exam->id]]) !!}
           
                   <div class="form-group">
                       <div class="col-12 control-label">
                            {!! Form::label('question', 'Pytanie:') !!}
                       </div>
                       <div class="col-12">
                           {!! Form::text('question',@$exam->question ? :0,['class'=>'']) !!}
                       </div>
                   </div>
                   <div class="form-group">
                       <div class="col-12 control-label">
                            {!! Form::label('ans1', 'Odpowiedź 1:') !!}
                       </div>
                       <div class="col-12">
                           {!! Form::text('ans1',@$exam->ans1 ? :0,['class'=>'']) !!}
                       </div>
                   </div>
                   <div class="form-group">
                       <div class="col-12 control-label">
                            {!! Form::label('ans2', 'Odpowiedź 2:') !!}
                       </div>
                       <div class="col-12">
                           {!! Form::text('ans2',@$exam->ans2 ? :0,['class'=>'']) !!}
                       </div>
                   </div>
                   <div class="form-group">
                       <div class="col-12 control-label">
                            {!! Form::label('ans3', 'Odpowiedź 3:') !!}
                       </div>
                       <div class="col-12">
                           {!! Form::text('ans3',@$exam->ans3 ? :0,['class'=>'']) !!}
                       </div>
                   </div>
                   <div class="form-group">
                       <div class="col-12 control-label">
                            {!! Form::label('ans4', 'Odpowiedź 4:') !!}
                       </div>
                       <div class="col-12">
                           {!! Form::text('ans4',@$exam->ans4 ? :0,['class'=>'']) !!}
                       </div>
                   </div>
                   <div class="form-group">
                       <div class="col-12 control-label">
                            {!! Form::label('cans', 'Poprawna odpowiedź:') !!}
                       </div>
                       <div class="col-12">
                           {!! Form::text('cans',@$exam->cans ? :0,['class'=>'']) !!}
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
