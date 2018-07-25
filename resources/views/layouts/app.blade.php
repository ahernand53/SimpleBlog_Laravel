<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/fontawesome-all.min.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar color-nav navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fas fa-user-ninja"></i>  {{ config('app.name', 'Laravel') }} 
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-user-astronaut"></i> {{ __('Login') }} </a> 
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-clipboard-list"></i> {{ __('Register') }} </a>
                            </li>
                        @else
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('tags.index') }}"><i class="fas fa-tags"></i> Etiquetas </a> 
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('categories.index') }}"><i class="far fa-bookmark"></i> Categorías </a> 
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('posts.index') }}"><i class="fas fa-clipboard"></i> Posts </a> 
                                </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                      {{ __('Logout') }} <i class="fas fa-door-closed"></i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @if(session('info'))
            <div class="container" style="margin-top:10px;">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="alert alert-success">
                            {{session('info')}}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(count($errors))
            <div class="container" style="margin-top:10px;">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @yield('content')
    </div>
    <!-- Scripts -->
    
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
