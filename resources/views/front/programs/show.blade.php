@extends('front.layouts.app')

@section('title', $program->title)
@section('content')

<section class="py-5" style="margin-top: 100px;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('programs.index') }}">Programmes</a></li>
                <li class="breadcrumb-item active">{{ $program->title }}</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-lg-8">
                <h1 class="mb-4">{{ $program->title }}</h1>
                @if($program->image)
                <img src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->title }}" class="img-fluid rounded mb-4" style="width: 100%; max-height: 400px; object-fit: cover;">
                @endif
                <div class="mb-4">
                    {!! nl2br(e($program->content ?: $program->description)) !!}
                </div>
                <a href="{{ route('programs.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Retour aux programmes
                </a>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Informations</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Statut :</strong> <span class="badge badge-custom {{ $program->is_active ? 'badge-success' : 'badge-danger' }}">{{ $program->is_active ? 'Actif' : 'Inactif' }}</span></p>
                        <p><strong>Créé le :</strong> {{ $program->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
