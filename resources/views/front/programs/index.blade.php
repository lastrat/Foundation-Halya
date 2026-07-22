@extends('front.layouts.app')

@section('title', 'Nos Programmes')
@section('content')

<section class="py-5 " style="margin-top: 50px;">
    <div class="container">
        <div class="section-title">
            <h2>Nos Programmes</h2>
            <p class="text-muted">Découvrez l'ensemble de nos initiatives et projets</p>
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
                        <h5 class="card-title">{{ $program->title }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($program->description, 150) }}</p>
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
    </div>
</section>

@endsection
