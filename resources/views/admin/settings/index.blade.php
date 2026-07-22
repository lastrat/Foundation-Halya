@extends('admin.layouts.app')

@section('title', 'Paramètres')
@section('page_title', 'Paramètres du Site')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0"><i class="fas fa-cog me-2 text-primary"></i>Paramètres Généraux</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            <h6 class="text-primary mb-3">Informations Générales</h6>
            <div class="mb-3">
                <label for="site_name" class="form-label">Nom du Site</label>
                <input type="text" class="form-control" id="site_name" name="site_name" value="{{ $settings['site_name'] ?? 'Fondation Halya' }}">
            </div>
            <div class="mb-3">
                <label for="site_description" class="form-label">Description du Site</label>
                <textarea class="form-control" id="site_description" name="site_description" rows="3">{{ $settings['site_description'] ?? '' }}</textarea>
            </div>
            <div class="mb-3">
                <label for="site_email" class="form-label">Email de Contact</label>
                <input type="email" class="form-control" id="site_email" name="site_email" value="{{ $settings['site_email'] ?? 'info@halya.org' }}">
            </div>
            <div class="mb-3">
                <label for="contact_email" class="form-label">Email de réception des messages du formulaire de contact</label>
                <input type="email" class="form-control" id="contact_email" name="contact_email" value="{{ $settings['contact_email'] ?? 'contact@halyafoundation.com' }}">
            </div>
            <div class="mb-3">
                <label for="site_phone" class="form-label">Téléphone</label>
                <input type="text" class="form-control" id="site_phone" name="site_phone" value="{{ $settings['site_phone'] ?? '+33 1 23 45 67 89' }}">
            </div>
            <div class="mb-3">
                <label for="site_address" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="site_address" name="site_address" value="{{ $settings['site_address'] ?? '' }}">
            </div>
            <hr class="my-4">
            <h6 class="text-primary mb-3">Footer</h6>
            <div class="mb-3">
                <label for="footer_motto" class="form-label">Devise</label>
                <input type="text" class="form-control" id="footer_motto" name="footer_motto" value="{{ $settings['footer_motto'] ?? 'Élever les femmes, Éduquer, inspirer les générations, transformer les communautés.' }}">
            </div>
            <div class="mb-3">
                <label for="footer_description" class="form-label">Description Footer</label>
                <textarea class="form-control" id="footer_description" name="footer_description" rows="3">{{ $settings['footer_description'] ?? "Agir ensemble pour un avenir durable. Ensemble, nous construisons un monde meilleur pour les générations futures." }}</textarea>
            </div>
            <hr class="my-4">
            <h6 class="text-primary mb-3">Réseaux Sociaux</h6>
            <div class="mb-3">
                <label for="facebook_url" class="form-label">Facebook</label>
                <input type="url" class="form-control" id="facebook_url" name="facebook_url" value="{{ $settings['facebook_url'] ?? '' }}">
            </div>
            <div class="mb-3">
                <label for="twitter_url" class="form-label">Twitter / X</label>
                <input type="url" class="form-control" id="twitter_url" name="twitter_url" value="{{ $settings['twitter_url'] ?? '' }}">
            </div>
            <div class="mb-3">
                <label for="instagram_url" class="form-label">Instagram</label>
                <input type="url" class="form-control" id="instagram_url" name="instagram_url" value="{{ $settings['instagram_url'] ?? '' }}">
            </div>
            <div class="mb-3">
                <label for="linkedin_url" class="form-label">LinkedIn</label>
                <input type="url" class="form-control" id="linkedin_url" name="linkedin_url" value="{{ $settings['linkedin_url'] ?? '' }}">
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary-custom"><i class="fas fa-save me-2"></i>Sauvegarder</button>
            </div>
        </form>
    </div>
</div>
@endsection
