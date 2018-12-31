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
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel='stylesheet'>
    </head>
    <body class="p-4">
        <div class="text-center text-success mb-5">
        <a href="{{ url('/') }}" class="h3 text-decoration-none">{{ config('app.name', 'Laravel') }}</a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-7"></div>
                <div class="col-5">
                    <div class="shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body text-center ">
                            <h4>Register</h4>
                            <div><span>Sudah punya akun Toko Online ?</span><a href="{{ url('/login') }}" class="pl-1 text-decoration-none">Login</a></div>
                            @include('auth.formregister')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
