@extends('layouts.guest')

@section('content')
<div class="card auth-card">
    <div class="auth-header">
        <i class="fas fa-key mb-2 d-block"></i>
        <h4 class="mb-0">Mot de passe oublié ?</h4>
        <p class="mb-0 mt-2 opacity-75">Nous vous enverrons un lien de réinitialisation</p>
    </div>
    <div class="card-body p-4">
        <div class="alert alert-info border-0 mb-4">
            <i class="fas fa-info-circle me-2"></i>
            Entrez votre adresse email et nous vous enverrons un lien pour réinitialiser votre mot de passe.
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="alert alert-success mb-3">
                <i class="fas fa-check-circle me-2"></i>{{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
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

            <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-primary-custom py-2">
                    <i class="fas fa-paper-plane me-2"></i>Envoyer le lien
                </button>
            </div>
        </form>
    </div>
    <div class="card-footer text-center bg-light border-0 py-3">
        <small class="text-muted">
            <a href="{{ route('login') }}" class="fw-semibold text-decoration-none" style="color: var(--primary);">
                <i class="fas fa-arrow-left me-1"></i>Retour à la connexion
            </a>
        </small>
    </div>
</div>
@endsection
