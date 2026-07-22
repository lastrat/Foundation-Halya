@extends('admin.layouts.app')

@section('title', 'Mon Profil')
@section('page_title', 'Mon Profil')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0"><i class="fas fa-user me-2 text-primary"></i>Modifier mon profil</h5>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('admin.profile.update') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom complet *</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                        @error('name')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse email *</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
                        @error('email')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                    </div>
                    
                    <hr class="my-4">
                    <h6 class="text-primary mb-3">Modifier le mot de passe</h6>
                    <p class="text-muted small mb-3">Laissez les champs du mot de passe vides si vous ne souhaitez pas le modifier.</p>
                    
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Mot de passe actuel</label>
                        <input type="password" class="form-control" id="current_password" name="current_password">
                        @error('current_password')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">Nouveau mot de passe</label>
                        <input type="password" class="form-control" id="new_password" name="new_password">
                        @error('new_password')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label">Confirmer le nouveau mot de passe</label>
                        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary-custom"><i class="fas fa-save me-2"></i>Enregistrer les modifications</button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
