<html> 
    <head>
        <title>@yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="/css/app.css"/>
        <script src="/js/app.js" defer></script>
        <style>
            .active a{
                color: red;
                text-decoration: none;
            }
            .h-screen{
                 height: 100vh;
            }
        </style>
    </head>


    <body>
        
        <nav class="navbar narbar-light navbar-expand-sm bg-white shadow-sm">

            <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link {{ setActive('home') }}" href="{{ route('home') }}">@lang('Home')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive('about') }}" href="{{ route('about') }}">@lang('About')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive('projects.*') }}" href="{{ route('projects.index') }}">@lang('Projects')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive('contact') }}" href="{{ route('contact') }}">@lang('Contact')</a>
                </li>
                @auth
                <li class="nav-item"><a class="nav-link" href="#" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">Cerrar Sesión</a></li>
                @else
                <li  class="nav-item"><a class="nav-link {{ setActive('login') }}" href="{{ route('login') }}">Login</a></li>
                @endauth
            </ul>

            </div>
              
       </nav>
        </div>
        
        <div id="app" class="d-flex flex-column h-screen justify-content-between">
            
        <header>
       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        </header>

       <main class="py-4">    
       @yield('content')
       </main> 

        <footer class="bg-white text-center text-black-50 py-3 shadow">
            {{ config('app.name') }} | Copyright @ {{ date('Y') }}
        </footer>

        </div>
    </body>
</html>