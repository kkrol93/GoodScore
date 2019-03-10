@extends('layouts.app')
@section('content')
<div class="top container">
    <div class="row justify-content-around">
        <a href="{{ route('admin.dashboard') }}" class="col-12"><div class="logo admin"><span>Good</span>Score<i class="fas fa-book-open"></i></div></a>
        <a href="{{ route('admin.logout') }}" class="col-12 logout">Wyloguj się</a> 
        
        <a href="{{ route('admin.news-panel') }}" class="col-md-5 admin-links card"><div><i class="fab fa-neos"></i>News-panel</div></a>
        <a href="{{ route('admin.users-panel') }}" class="col-md-5 admin-links card"><div><i class="fas fa-users-cog"></i>Użytkownicy</div></a>
        <a href="{{ route('admin.scores-panel') }}" class="col-md-5 admin-links card"><div><i class="fas fa-chart-bar"></i>Wyniki</div></a>
        <a href="{{ route('admin.quiz-panel') }}" class="col-md-5 admin-links card"><div><i class="fas fa-star"></i>Quiz Panel</div></a>            
    </div>
</div>
@endsection
