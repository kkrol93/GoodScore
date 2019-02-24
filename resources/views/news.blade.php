@foreach ($home as $home )
                    <div class="col-3 col-sm-2 news"><img src="img/avatar.jpg" alt="" ><br/>Krzysztof Król</div><div class="col-9 col-sm-10 card">{{$home->title}}<br/>{{$home->description}}</div>
@endforeach