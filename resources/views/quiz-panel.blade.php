@extends('layouts.app')
@section('content')
<div class="top container">
    <div class="row justify-content-around">
    <a href="{{ route('admin.dashboard') }}" class="col-12"><div class="logo admin"><span>Good</span>Score<i class="fas fa-book-open"></i></div></a>
    <a href="{{ route('admin.logout') }}" class="col-12 logout">Wyloguj się</a>
   
       
      
    <div class="col-md-10 card"> 
        <div class="row justify-content-center">
           
               
            {!! Form::open(['url'=>'admin/quiz-panel', 'class'=>'col-11']) !!}
           
                   <div class="form-group">
                       <div class="col-12 control-label">
                            {!! Form::label('question', 'Pytanie:') !!}
                       </div>
                       <div class="col-12">
                           {!! Form::text('question',null,['class'=>'']) !!}
                       </div>
                   </div>
                   <div class="form-group">
                    <div class="col-12 control-label">
                         {!! Form::label('ans1', 'Odpowiedź 1:') !!}
                    </div>
                    <div class="col-12">
                        {!! Form::text('ans1',null,['class'=>'']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12 control-label">
                         {!! Form::label('ans2', 'Odpowiedź 2:') !!}
                    </div>
                    <div class="col-12">
                        {!! Form::text('ans2',null,['class'=>'']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12 control-label">
                         {!! Form::label('ans3', 'Odpowiedź 3:') !!}
                    </div>
                    <div class="col-12">
                        {!! Form::text('ans3',null,['class'=>'']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12 control-label">
                         {!! Form::label('ans4', 'Odpowiedź 4:') !!}
                    </div>
                    <div class="col-12">
                        {!! Form::text('ans4',null,['class'=>'']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12 control-label">
                         {!! Form::label('cans', 'Poprawna odpowiedź:') !!}
                    </div>
                    <div class="col-12">
                        {!! Form::text('cans',null,['class'=>'']) !!}
                    </div>
                </div>
                   
                    <div class="form-group">
                            {!! Form::submit('Zapisz', ['class'=>'col-6 col-md-3 btn']) !!}
                    </div>
            {!! Form::close() !!}          
            
                @foreach ($exam as $exam )
                <div class="col-11 exam-edit"><div class="row">
                 <a href="{{url('admin/quiz-panel',$exam->id)}}" class="col-2 btn">Edytuj</a>
                 {!!Form::open(['action' => ['AdminController@destroyexam', $exam->id], 'method' => 'POST', 'class' => 'col-2'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-red'])}}
            {!!Form::close()!!}
               <div class="col-7 news-text">{{$exam->question}}</div>
                </div></div>
                @endforeach
        </div>
    </div>
    
									
    
       
            
    </div>
</div>


@endsection
