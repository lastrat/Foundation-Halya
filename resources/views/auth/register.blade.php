@extends('layouts.guest')

@section('content')
<div class="card auth-card">
    <div class="auth-header">
        <i class="fas fa-user-plus mb-2 d-block"></i>
        <h4 class="mb-0">Créer un compte</h4>
        <p class="mb-0 mt-2 opacity-75">Rejoignez la Fondation Halya</p>
    </div>
    <div class="card-body p-4">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">
                    <i class="fas fa-user me-2 text-primary"></i>Nom complet
                </label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                       id="name" name="name" value="{{ old('name') }}" 
                       required autofocus autocomplete="name"
                       placeholder="Jean Dupont">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">
                    <i class="fas fa-envelope me-2 text-primary"></i>Email
                </label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                       id="email" name="email" value="{{ old('email') }}" 
                       required autocomplete="username"
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
                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                       id="password" name="password" required autocomplete="new-password"
                       placeholder="••••••••">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label fw-semibold">
                    <i class="fas fa-check-double me-2 text-primary"></i>Confirmer le mot de passe
                </label>
                <input type="password" class="form-control" 
                       id="password_confirmation" name="password_confirmation" 
                       required autocomplete="new-password"
                       placeholder="••••••••">
                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-primary-custom py-2">
                    <i class="fas fa-user-plus me-2"></i>S'inscrire
                </button>
            </div>
        </form>
    </div>
    <div class="card-footer text-center bg-light border-0 py-3">
        <small class="text-muted">
            Déjà inscrit ? 
            <a href="{{ route('login') }}" class="fw-semibold text-decoration-none" style="color: var(--primary);">
                Se connecter <i class="fas fa-arrow-right ms-1"></i>
            </a>
        </small>
    </div>
</div>

<div class="text-center mt-3">
    <a href="{{ route('home') }}" class="text-decoration-none" style="color: var(--primary);">
        <i class="fas fa-arrow-left me-1"></i>Retour au site
    </a>
</div>
@endsection
