@extends('layouts.guest')

@section('content')
<div class="card auth-card">
    <div class="auth-header">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" height="200">
        </a>
        <h4 class="mb-0">Connexion</h4>
        <p class="mb-0 mt-2 opacity-75">Connectez-vous à votre espace administrateur</p>
    </div>
    <div class="card-body p-4">
        <!-- Session Status -->
        @if (session('status'))
            <div class="alert alert-success mb-3">
                <i class="fas fa-check-circle me-2"></i>{{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">
                    <i class="fas fa-envelope me-2 text-primary"></i>Email
                </label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                       id="email" name="email" value="{{ old('email') }}" 
                       required autofocus autocomplete="username" 
                       placeholder="votre@email.com">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">
                    <i class="fas fa-lock me-2 text-primary"></i>Mot de passe
                </label>
                <div class="input-group">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                           id="password" name="password" required autocomplete="current-password"
                           placeholder="••••••••">
                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                        <i class="fas fa-eye" id="toggleIcon"></i>
                    </button>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember_me" 
                           {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember_me">
                        Se souvenir de moi
                    </label>
                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-decoration-none" style="color: var(--primary);">
                        <small><i class="fas fa-question-circle me-1"></i>Mot de passe oublié ?</small>
                    </a>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary-custom py-2">
                    <i class="fas fa-sign-in-alt me-2"></i>Se connecter
                </button>
            </div>
        </form>
    </div>
    <div class="card-footer text-center bg-light border-0 py-3">
        <small class="text-muted">
            <a href="{{ route('home') }}" style="color: var(--primary);">
                <i class="fas fa-arrow-left me-1"></i>Retour au site
            </a>
        </small>
    </div>
</div>

<!-- Registration Link -->
<!-- @if (Route::has('register'))
    <div class="text-center mt-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body py-3">
                <p class="mb-0 text-muted">
                    Pas encore de compte ? 
                    <a href="{{ route('register') }}" class="fw-semibold text-decoration-none" style="color: var(--primary);">
                        Créer un compte <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </p>
            </div>
        </div>
    </div>
@endif -->
@endsection

@push('scripts')
<script>
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    });
</script>
@endpush
