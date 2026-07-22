@extends('front.layouts.app')

@section('title', 'Actualités')
@section('content')

<section class="py-5" style="margin-top: 50px;">
    <div class="container">
        <div class="section-title">
            <h2>Actualités</h2>
            <p class="text-muted">Restez informé de nos dernières actions et nouvelles</p>
        </div>

        <form action="{{ route('news.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Rechercher une actualité..." value="{{ request('search') }}">
                <button class="btn btn-primary-custom" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>

        <div class="row g-4">
            @forelse($news as $article)
            <div class="col-md-4">
                <div class="card card-custom h-100">
                    @if($article->featured_image)
                    <img src="{{ asset('storage/' . $article->featured_image) }}" class="card-img-top" alt="{{ $article->title }}" style="height: 200px; object-fit: cover;">
                    @else
                    <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="fas fa-newspaper fa-2x text-white"></i>
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small class="text-muted">{{ $article->published_at->format('d/m/Y') }}</small>
                            @if($article->is_pinned)
                            <span class="badge bg-warning"><i class="fas fa-thumbtack me-1"></i>Épinglé</span>
                            @endif
                        </div>
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($article->excerpt ?: strip_tags($article->content), 120) }}</p>
                        <a href="{{ route('news.show', $article->slug) }}" class="btn btn-primary-custom">Lire plus</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">Aucune actualité trouvée.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $news->links() }}
        </div>
    </div>
</section>

@endsection
