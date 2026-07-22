@extends('front.layouts.app')

@section('title', $article->title)
@section('content')
<style>
    .badge-custom{
        padding: 0.4rem 0.8rem;
        border-radius: 20px;
        font-size: 0.85rem;
        color: white;
        background-color: #28a745;
    }
</style>
<section class="py-5" style="margin-top: 100px;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Actualités</a></li>
                <li class="breadcrumb-item active">{{ Str::limit($article->title,60)}}</li>
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
                        <h5 class="mb-0 text-white"><i class="fas fa-info-circle me-2"></i>Informations</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Auteur :</strong> {{ $article->author->name ?? 'N/A' }}</p>
                        <p><strong>Publié le :</strong> {{ $article->published_at->format('d/m/Y') }}</p>
                        <p><strong>Statut :</strong> <span class="badge badge-custom badge-success">Publié</span></p>
                        <p><strong>Vues :</strong> {{ $article->views()->count() }}</p>
                    </div>
                </div>
                  @if($recentArticles->count() > 0)
                    <div class="card border-0 shadow-sm mt-4">
                        <div class="card-header bg-white py-3">
                            <h5 class="mb-0"><i class="fas fa-clock me-2 text-primary"></i>Articles Récents</h5>
                        </div>
                        <div class="card-body">
                            @foreach($recentArticles as $recent)
                            <div class="d-flex gap-3 mb-3 pb-3 border-bottom">
                                @if($recent->featured_image)
                                <img src="{{ asset('storage/' . $recent->featured_image) }}" alt="{{ $recent->title }}" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px; flex-shrink: 0;">
                                @else
                                <div class="bg-secondary d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; border-radius: 8px; flex-shrink: 0;">
                                    <i class="fas fa-newspaper text-white"></i>
                                </div>
                                @endif
                        <div>
                            <h6 class="mb-1"><a href="{{ route('news.show', $recent->slug) }}" class="text-decoration-none" style="color: var(--primary);">{{ $recent->title }}</a></h6>
                            <small class="text-muted"><i class="fas fa-calendar me-1"></i>{{ $recent->published_at->format('d/m/Y') }}</small>
                            <small class="text-muted ms-2"><i class="fas fa-eye me-1"></i>{{ $recent->views()->count() }}</small>
                            @if($recent->is_pinned)
                            <span class="badge bg-warning ms-2"><i class="fas fa-thumbtack me-1"></i>Épinglé</span>
                            @endif
                        </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
            </div>

          
        </div>
    </div>
</section>

@endsection
