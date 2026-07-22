@extends('front.layouts.app')

@section('title', 'Contact')
@section('content')

<section class="py-5" style="margin-top: 50px;">
    <div class="container">
        <div class="section-title">
            <h2>Contactez-nous</h2>
            <p class="text-muted">Nous serions ravis d'échanger avec vous</p>
        </div>
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-5">
                        <h4 class="mb-4">Envoyez-nous un message</h4>

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('contact') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom complet *</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Sujet *</label>
                                <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject') }}" required>
                                @error('subject')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message *</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                                @error('message')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                            <button type="submit" class="btn btn-primary-custom">
                                <i class="fas fa-paper-plane me-2"></i>Envoyer le message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-5">
                        <h4 class="mb-4">Nos Coordonnées</h4>
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                            </div>
                            <div class="ms-3">
                                <h5>Adresse</h5>
                                <p class="text-muted mb-0">{!! nl2br(e($settings['site_address'] ?? '123 Avenue de l\'Innovation, Paris')) !!}</p>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="fas fa-phone"></i>
                                </div>
                            </div>
                            <div class="ms-3">
                                <h5>Téléphone</h5>
                                <p class="text-muted mb-0">{{ $settings['site_phone'] ?? '+33 1 23 45 67 89' }}</p>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <div class="ms-3">
                                <h5>Email</h5>
                                <p class="text-muted mb-0">{{ $settings['site_email'] ?? 'info@halya.org' }}</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="fas fa-clock"></i>
                                </div>
                            </div>
                            <div class="ms-3">
                                <h5>Heures d'ouverture</h5>
                                <p class="text-muted mb-0">Lundi - Vendredi: 9h00 - 18h00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
