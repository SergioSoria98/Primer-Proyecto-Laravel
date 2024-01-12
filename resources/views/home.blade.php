@extends('layout')

@section('title', 'Home')
    


@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <img class="img-fluid mb-4" src="/img/home.svg" alt="Desarrollo Web">
        </div>
        <div class="col-12">
            <h1 class="display-4 text-primary">Desarrollo Web</h1>
            <p class="lead text-secundary">
             Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
             dolore magna aliqua.
             Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  
            </p>
            <a class="btn btn-lg btn-block btn-primary" href="{{ route('contact') }}">Contáctame</a>
            <a class="btn btn-lg btn-block btn-outline-primary" href="{{ route('projects.index') }}">Portafolio</a><br><hr>
            
            @auth
            {{ auth()->user() }}
            @endauth
        </div>
    </div>
</div>

    
    
@endsection