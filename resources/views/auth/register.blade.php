@extends('layouts.app')
@section('content')

<div class="auth-card">
    <div class="auth-header">
        <h2 style="color: #0A3A56;">Crear cuenta</h2>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <!-- Name Input -->
        <div class="form-group">
            <label for="name" class="form-label text-secondary">
                <i class="fa-solid fa-user"></i> Nombre
            </label>
            <input id="name" type="text" 
                class="form-control @error('name') is-invalid @enderror" 
                name="name" value="{{ old('name') }}" required autocomplete="off" autofocus placeholder="Nombre completo"
            >
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                </span>
            @enderror
        </div>

        <!-- Email Input -->
        <div class="form-group">
            <label for="email" class="form-label text-secondary">
                <i class="fas fa-envelope me-1"></i>{{ __('Correo Electrónico') }}
            </label>
            <input id="email" type="email" 
                   class="form-control @error('email') is-invalid @enderror" 
                   name="email" value="{{ old('email') }}" required autocomplete="off" placeholder="name@example.com">
            
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                </span>
            @enderror
        </div>

        <!-- Password Input -->
        <div class="form-group">
            <label for="password" class="form-label text-secondary">
                <i class="fa-solid fa-key"></i> Contraseña
            </label>
            <input id="password" type="password" 
                   class="form-control @error('password') is-invalid @enderror" 
                   name="password" required autocomplete="new-password" placeholder="Contraseña">
            
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                </span>
            @enderror
        </div>

        <!-- Confirm Password Input -->
        <div class="form-group">
            <label for="password-confirm" class="form-label text-secondary">
                <i class="fa-solid fa-key"></i> Confirmar contraseña
            </label>
            <input id="password-confirm" type="password" 
                   class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar contraseña">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mt-4">
            <i class="fa-solid fa-check"></i> {{ __('Register') }}
        </button>
    </form>
    
    <!-- Enlaces de Ayuda -->
    <div class="auth-links fade-in-link">
        <a class="btn btn-link" href="{{ route('login') }}">
            <i class="fa-solid fa-right-to-bracket fa-flip-horizontal"></i> Acceder
        </a>
        
        <span class="text-muted mx-2">|</span>

        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                <i class="fa-solid fa-key"></i> Recuperar cuenta
            </a>
        @endif
    </div>    
</div>

@endsection
