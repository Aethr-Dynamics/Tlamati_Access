@extends('layouts.admin')

@section('template_title')
    Codigo QR
@endsection

@section('content')
<div class="container">
    <h2>Generar Código QR de Acceso</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Formulario de búsqueda -->
    <form action="{{ route('codeqr.store') }}" method="POST" id="searchForm">
        @csrf
        <div class="mb-3">
            <label for="id_institucional" class="form-label">ID Institucional</label>
            <input type="text" name="id_institucional" id="id_institucional" 
                   class="form-control" placeholder="Ej: 20240001" required autofocus>
        </div>

        @if($errors->has('id_institucional'))
            <div class="alert alert-danger">{{ $errors->first('id_institucional') }}</div>
        @endif

        <!-- Botón de búsqueda -->
        <button type="submit" class="btn btn-primary">Buscar Usuario</button>
    </form>

    <!-- Sección de Información del Usuario (oculta inicialmente) -->
    @if(session('user'))
        <hr>
        <div id="userInfoSection" style="display: none;">
            <h3>Información del Usuario</h3>
            <p><strong>ID Institucional:</strong> {{ session('user')->id_institucional }}</p>
            <p><strong>Nombre:</strong> {{ session('user')->nombre }} {{ session('user')->apellido_paterno }} {{ session('user')->apellido_materno }}</p>
            <p><strong>Email:</strong> {{ session('user')->email_institucional }}</p>
            <p><strong>Tipo de Usuario:</strong> 
                @if(session('type') === 'students') Estudiante 
                @else Trabajador 
                @endif
            </p>

            <!-- Botón para generar QR -->
            <button onclick="generateQr()" class="btn btn-success">Generar Código QR</button>
        </div>
    @endif
</div>
@endsection
