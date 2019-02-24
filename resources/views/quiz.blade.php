<div class="col-12 title">Quiz</div>
                        <div class="col-12 card">
                            <div class="row">
                                {!! Form::open() !!}
                                @foreach ($quiz as $quiz )
                                    {!! Form::label('email', @$quiz->question ? :0, ['class' => 'col-12']); !!}
                                    
                                    <label class="radio">
                                    {!! Form::radio('name', '1'); !!}<span>{{$quiz->ans1}}</span>
                                    </label>
                                    <label class="radio">
                                        {!! Form::radio('name', '2'); !!}<span>{{$quiz->ans2}}</span>
                                        </label>
                                        <label class="radio">
                                            {!! Form::radio('name', '3'); !!}<span>{{$quiz->ans3}}</span>
                                            </label>
                                            <label class="radio">
                                                {!! Form::radio('name', '4'); !!}<span>{{$quiz->ans4}}</span>
                                                </label>
                                                <div class="col-12">
                                               {!! Form::submit('Odpowiedz!',['class' => 'btn  col-3']); !!} 
                                            </div>
                                 
                                    
                                @endforeach            
                                {!! Form::close() !!} 
                            </div>
                        </div>                  
                    </div>

            


