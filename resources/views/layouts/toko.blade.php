<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
       <link href="{{ asset('css/bootstrap.min.css') }}" rel='stylesheet'>
    @yield('style')

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-sm navbar-light sticky-top py-2 bg-light">
            <div class="container-fluid">
                <a class="navbar-brand font-weight-bold" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <span class="nav-link">
                                    <a href="{{ url('/register') }}" class="btn btn-outline-none btn-sm">Register</a>
                                </span>
                            </li>
                            <li class="nav-item">
                                <div class='nav-link dropdown'>
                                    <button class="btn btn-outline-primary btn-sm" data-toggle="dropdown">Login</button>
                                    <div class="dropdown-menu dropdown-menu-right p-0" style="min-width:25vw">
                                        <div class="p-3">                                    
                                            @include('auth.formlogin')
                                        </div>
                                    </div>
                                    <script>
                                        $('.dropdown').on('show.bs.dropdown', function(){
                                            $('#overlay').show();
                                        });
                                        $('.dropdown').on('hidden.bs.dropdown', function(){
                                            $('#overlay').hide();
                                        });
                                    </script>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    <button class="btn btn-sm border border-0"><i class="fas fa-bars fa-lg"></i></button>
                                </a>    
                            </li>
                            @if (Route::has('register'))
                            @endif
                        @else
                            <li class="nav-link" href="">
                                    <i class="fas fa-shopping-basket"></i>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" data-toggle="dropdown">
                                    <img src="{{ asset('img/th.jpg') }}" width="27" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right p-1" style="min-width:13vw">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <small class="text-muted">Profile Saya</small><br>
                                            <a href="" class="text-success text-decoration-none">{{ Auth::user()->name }}</a>
                                        </li>
                                        <a class="list-group-item text-dark text-decoration-none" href="{{ route('logout') }}" 
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>    
                                    </ul>
                                </div>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                            </form>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="position-fixed" id='overlay' style="display:none;width:100%;height:100vh;background-color:black;opacity:0.5;top:61px;left:0;bottom:0;z-index:1;"></div> 
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @stack('scripts')
</body>
</html>
