@extends('front.layouts.app')

@section('title', 'Nos Partenaires')
@section('content')

<section class="py-5" style="margin-top: 50px;">
    <div class="container">
        <div class="section-title">
            <h2>Nos Partenaires</h2>
            <p class="text-muted">Découvrez les organisations qui nous font confiance</p>
        </div>
        <div class="row g-4">
            <div class="col-12 text-center mb-4">
                <p class="lead">La Fondation Halya travaille en étroite collaboration avec des organisations de premier plan pour maximiser son impact.</p>
            </div>
            @forelse($partners as $partner)
            <div class="col-md-4 col-sm-6">
                <div class="card card-custom text-center h-100 p-4">
                    @if($partner->logo)
                    <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="img-fluid mb-3" style="max-height: 100px; object-fit: contain;">
                    @else
                    <div class="bg-light rounded d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 150px; height: 100px;">
                        <i class="fas fa-building fa-2x text-muted"></i>
                    </div>
                    @endif
                    <h5 class="card-title">{{ $partner->name }}</h5>
                    @if($partner->description)
                    <p class="card-text text-muted">{{ Str::limit($partner->description, 120) }}</p>
                    @endif
                    @if($partner->website)
                    <a href="{{ $partner->website }}" target="_blank" class="btn btn-primary-custom btn-sm">Visiter le site</a>
                    @endif
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">Aucun partenaire enregistré pour le moment.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
