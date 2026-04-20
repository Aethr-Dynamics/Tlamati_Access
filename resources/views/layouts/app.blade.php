<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

  <style>
        * {
            background-color: #f7f7f7;
            font-family: sans-serif;
        }

        .input-data input{
            width: 100%;
            margin: auto;
            overflow-y: hidden;
            overflow-x: hidden;
        }

        .input-data input:focus{
        outline: none;/* Quita el contorno predeterminado de enfoque */
        border: 1px solid var(--Stroke);/* Sin borde cuando está enfocado */  
        }

  </style>    

</head>
<body>
    <div id="app">

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
