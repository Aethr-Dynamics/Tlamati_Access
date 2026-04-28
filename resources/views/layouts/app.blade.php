<!-- layouts/app.blade.php -->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>T.A. | @yield('template_title')</title>

    <link rel="shortcut icon" href="{{asset('favicon.png')}}" />

    <!-- Fonts & Icons -->
    <link href="https://fonts.bunny.net/css?family=Nunito:300,400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/css/styles.css', 'resources/js/app.js'])
</head>
<body>
    <div class="main-wrapper">
        
        <!-- Imagen de fondo fija -->
        <div class="background-image"></div>

        <!-- Header del Sistema -->
        <header class="system-header">
            <div class="system-title">
                <img src="{{asset('favicon.png')}}" alt="Tlamati Acccess" class="icon-images"/>
                Tlamati Access
            </div>
            <!-- Puedes agregar menú aquí si lo necesitas -->
        </header>

        <br>
        <br>

        <!-- Contenido Central -->
        <main class="content-container">
            @yield('content')
        </main>

        <!-- Footer -->
        <br>
        <footer class="footerTA">
            <div class="row text-center">
                <div class="col-md-6 themed-grid-col">
                    <p class="footerTASlogan">Donde la tecnología reconoce tu identidad</p>
                </div> 
                <div class="col-md-6 themed-grid-col">
                    <p style=" opacity: 0.7;margin:0">DV-3.1.0</p>
                </div> 
            </div>

            <p>&copy; {{ date('Y') }} Tlamati Access. Todos los derechos reservados.</p>            
        </footer>
    </div>
</body>
</html>
