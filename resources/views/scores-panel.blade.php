@extends('layouts.app')
@section('content')
<div class="top container">
    <div class="row justify-content-around">
    <a href="{{ route('admin.dashboard') }}" class="col-12"><div class="logo admin"><span>Good</span>Score<i class="fas fa-book-open"></i></div></a>
    <a href="{{ route('admin.logout') }}" class="col-12 logout">Wyloguj się</a>
   
       
      
    <div class="col-md-3 card"> 
        <div class="row justify-content-center">
        <a href="#" class="add"><div class="add-icons"><i class="fas fa-plus"></i><i class="fas fa-user"></i></div><div>tabele wyników itd</div></a>
        </div>
    </div>
									
    
       
            
    </div>
</div>

@endsection
