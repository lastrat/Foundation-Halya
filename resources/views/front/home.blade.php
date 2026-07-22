@extends('front.layouts.app')

@section('title', 'Accueil')
@section('content')

<!-- Hero Slider -->
@if($sliders->count() > 0)
<section class="hero-slider">
    <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach($sliders as $i => $slider)
            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach($sliders as $index => $slider)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <img src="{{ asset('storage/' . $slider->image) }}" class="d-block w-100" alt="{{ $slider->title }}">
                <div class="carousel-caption d-none d-md-block">
                    <h1 style="color:white !important;">{{ $slider->title }}</h1>
                    @if($slider->description)
                    <p>{{ $slider->description }}</p>
                    @endif
                    @if($slider->link)
                    <a href="{{ $slider->link }}" class="btn btn-primary-custom">En Savoir Plus</a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</section>
@endif

<!-- About Section -->
<section class="py-5" style="background-color: var(--light);">
    <div class="container">
        <div class="section-title">
            <h2>À Propos de la Fondation Halya</h2>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <img src="{{ asset('assets/images/halya2.jpg') }}" alt="Fondation Halya" class="img-fluid rounded shadow">
            </div>
            <div class="col-lg-6">
                <h3 class="mb-3">Agir ensemble pour un avenir durable</h3>
                <p class="lead">La Fondation Halya est une organisation philanthropique engagée dans la promotion de l’autonomisation économique des femmes et l’encadrement éducatif des enfants vulnérables avec un accent particulier sur les orphelins.</p>
                <p>Fondée en 2025 par <strong>Mme Halimatou Toudjani Alifa</strong>, professionnelle du secteur bancaire avec plus de 20 années d’expérience, spécialisée en structuration de financement, développement commercial et accompagnement des acteurs économiques.</p>
                <p>La fondation ambitionne de devenir une plateforme d’impact social et économique capable de transformer durablement les communautés.</p>
                <a href="{{ route('about') }}" class="btn btn-primary-custom">En savoir plus</a>
            </div>
        </div>
    </div>
</section>

<!-- Programs Section -->
<section class="py-5" style="background-color: var(--light);">
    <div class="container">
        <div class="section-title">
            <h2>Nos Programmes</h2>
            <p class="text-muted">Découvrez nos initiatives pour un avenir durable</p>
        </div>
        <div class="row g-4">
            @forelse($programs as $program)
            <div class="col-md-4">
                <div class="card card-custom h-100">
                    @if($program->image)
                    <img src="{{ asset('storage/' . $program->image) }}" class="card-img-top" alt="{{ $program->title }}" style="height: 200px; object-fit: cover;">
                    @else
                    <div class="card-img-top bg-primary d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="{{ $program->icon ?: 'fas fa-leaf' }} fa-3x text-white"></i>
                    </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title" >{{ $program->title }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($program->description, 120) }}</p>
                        <a href="{{ route('programs.show', $program->slug) }}" class="btn btn-primary-custom">Découvrir</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">Aucun programme disponible pour le moment.</p>
            </div>
            @endforelse
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('programs.index') }}" class="btn btn-primary-custom">Voir tous les programmes</a>
        </div>
    </div>
</section>

<!-- News Section -->
<section class="py-5" style="background-color: white;">
    <div class="container">
        <div class="section-title">
            <h2>Dernières Actualités</h2>
            <p class="text-muted">Restez informé de nos dernières actions</p>
        </div>
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
                        <h5 class="card-title" >{{ Str::limit($article->title, 60) }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($article->excerpt ?: strip_tags($article->content), 120) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('news.show', $article->slug) }}" class="btn btn-primary-custom">Lire plus</a>
                            <small class="text-muted"><i class="fas fa-eye me-1"></i>{{ $article->views()->count() }}</small>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">Aucune actualité disponible pour le moment.</p>
            </div>
            @endforelse
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('news.index') }}" class="btn btn-primary-custom">Voir toutes les actualités</a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
@if($testimonials->count() > 0)
<section class="py-5" style="background-color: var(--light);">
    <div class="container">
        <div class="section-title">
            <h2>Témoignages</h2>
            <p class="text-muted">Ce que disent nos partenaires et bénéficiaires</p>
        </div>
        <div class="row g-4">
            @foreach($testimonials as $testimonial)
            <div class="col-md-4">
                <div class="card card-custom h-100">
                    <div class="card-body text-center">
                        @if($testimonial->photo)
                        <img src="{{ asset('storage/' . $testimonial->photo) }}" class="rounded-circle mb-3" alt="{{ $testimonial->name }}" style="width: 100px; height: 100px; object-fit: cover;">
                        @else
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 100px; height: 100px; font-size: 2rem;">
                            {{ substr($testimonial->name, 0, 1) }}
                        </div>
                        @endif
                        <h5 class="card-title">{{ $testimonial->name }}</h5>
                        @if($testimonial->role)
                        <p class="text-muted mb-3">{{ $testimonial->role }} {{ $testimonial->organization ? ' - ' . $testimonial->organization : '' }}</p>
                        @endif
                        <p class="card-text"><i class="fas fa-quote-left text-primary me-2"></i>{{ Str::limit($testimonial->content, 150) }}<i class="fas fa-quote-right text-primary ms-2"></i></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary), #2d6a4f); color: white;">
    <div class="container text-center">
        <h2 class="mb-3" style="color:#fff;">Rejoignez Notre Mission</h2>
        <p class="lead mb-4">Ensemble, nous pouvons faire la différence. Devenez partenaire ou soutenez nos actions.</p>
        <a href="{{ route('contact') }}" class="btn btn-primary-custom btn-lg">Contactez-nous</a>
    </div>
</section>

@endsection
