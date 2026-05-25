@extends('layouts.app')

@section('template_title') Recuperar cuenta @endsection

@section('content')
<div class="auth-card">
    <div class="auth-header">
        <h2  style="color: #0A3A56;">Recuperar cuenta</h2>
    </div>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        
        <!-- Email Input -->
        <div class="form-group">
            <label for="email" class="form-label text-secondary">
                <i class="fas fa-envelope me-1" style="color: rgb(38, 166, 154);"></i>{{ __('Correo Electrónico') }}
            </label>
            
            <input id="email" type="email" 
                class="form-control @error('email') is-invalid @enderror" 
                name="email" value="{{ $email ?? old('email') }}" required autocomplete="off" autofocus placeholder="name@example.com"
            >
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                </span>
            @enderror
        </div>


        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mt-4">
            <i class="fa-solid fa-envelope-open-text" style="color: #E0E0E0;"></i> Envíar enlace para recuperación
        </button>
    </form>

    <!-- Enlaces de Ayuda -->
    <div class="auth-links fade-in-link">
        <a class="btn btn-link" href="{{ route('login') }}">
            <i class="fa-solid fa-right-to-bracket fa-flip-horizontal" style="color: rgb(38, 166, 154);"></i> Acceder
        </a>
        
        <span class="text-muted mx-2">|</span>

        <a href="{{ route('register') }}" style="color: var(--primary-color); text-decoration: none;">
            <i class="fa-solid fa-user-plus" style="color: rgb(38, 166, 154);"></i> Crear cuenta
        </a>
    </div>
</div>
@endsection
