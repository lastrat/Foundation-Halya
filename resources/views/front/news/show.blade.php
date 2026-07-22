@extends('front.layouts.app')

@section('title', $article->title)
@section('content')

<section class="py-5" style="margin-top: 100px;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Actualités</a></li>
                <li class="breadcrumb-item active">{{ $article->title }}</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <small class="text-muted"><i class="fas fa-calendar me-1"></i>{{ $article->published_at->format('d/m/Y H:i') }}</small>
                        @if($article->is_pinned)
                        <span class="badge bg-warning ms-2"><i class="fas fa-thumbtack me-1"></i>Épinglé</span>
                        @endif
                    </div>
                </div>
                <h1 class="mb-4">{{ $article->title }}</h1>
                @if($article->featured_image)
                <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="img-fluid rounded mb-4" style="width: 100%; max-height: 400px; object-fit: cover;">
                @endif
                @if($article->excerpt)
                <div class="alert alert-light border mb-4">
                    <p class="mb-0 fst-italic">{{ $article->excerpt }}</p>
                </div>
                @endif
                <div class="article-content">
                    {!! nl2br(e($article->content)) !!}
                </div>
                <hr class="my-4">
                <a href="{{ route('news.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Retour aux actualités
                </a>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Informations</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Auteur :</strong> {{ $article->author->name ?? 'N/A' }}</p>
                        <p><strong>Publié le :</strong> {{ $article->published_at->format('d/m/Y') }}</p>
                        <p><strong>Statut :</strong> <span class="badge badge-custom badge-success">Publié</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
