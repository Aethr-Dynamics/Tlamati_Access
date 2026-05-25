@extends('layouts.app')

@section('template_title') Restablecer contraseña @endsection

@section('content')
<div class="auth-card">
    <div class="auth-header">
        <h2  style="color: #0A3A56;">Restablecer contraseña</h2>
    </div>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        
        <input type="hidden" name="token" value="{{ $token }}">

        <!-- Email Input -->
        <div class="form-group">
            <label for="email" class="form-label text-secondary">
                <i class="fas fa-envelope me-1"></i>{{ __('Correo Electrónico') }}
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

        <!-- Password Input -->
        <div class="form-group">
            <label for="password" class="form-label text-secondary">
                <i class="fas fa-lock me-1"></i>
                {{ __('Contraseña') }}
            </label>
            <input id="password" type="password" 
                class="form-control @error('password') is-invalid @enderror" 
                name="password" required autocomplete="new-password" placeholder="Contraseña"
            >
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                </span>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="form-group d-flex align-items-center justify-content-between">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label text-muted" for="remember">
                    {{ __('Remember me for 30 days') }}
                </label>
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mt-4">
            <i class="fa-solid fa-arrow-right-to-bracket"></i> {{ __('Login') }}
        </button>
    </form>

    <!-- Enlaces de Ayuda -->
    <div class="auth-links fade-in-link">
        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                <i class="fa-solid fa-key"></i> {{ __('Forgot Your Password?') }}
            </a>
        @endif
        
        <span class="text-muted mx-2">|</span>

        <a href="{{ route('register') }}" style="color: var(--primary-color); text-decoration: none;">
            <i class="fa-solid fa-user-plus"></i> {{ __('Create Account') }}
        </a>
    </div>
</div>
@endsection
