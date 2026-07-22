@extends('admin.layouts.app')

@section('title', 'Tableau de Bord')
@section('page_title', 'Tableau de Bord')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card card-stat" style="background: linear-gradient(135deg, #1B4D3E, #2d6a4f);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-0 opacity-75">Actualités</p>
                    <h3 class="mb-0">{{ $stats['news'] ?? 0 }}</h3>
                </div>
                <div class="icon"><i class="fas fa-newspaper"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stat" style="background: linear-gradient(135deg, #D4AF37, #e8c547);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-0 opacity-75 text-dark">Programmes</p>
                    <h3 class="mb-0 text-dark">{{ $stats['programs'] ?? 0 }}</h3>
                </div>
                <div class="icon text-dark"><i class="fas fa-project-diagram"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stat" style="background: linear-gradient(135deg, #2C2C2C, #4a4a4a);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-0 opacity-75">Partenaires</p>
                    <h3 class="mb-0">{{ $stats['partners'] ?? 0 }}</h3>
                </div>
                <div class="icon"><i class="fas fa-handshake"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stat" style="background: linear-gradient(135deg, #e07b39, #f0934a);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-0 opacity-75">Témoignages</p>
                    <h3 class="mb-0">{{ $stats['testimonials'] ?? 0 }}</h3>
                </div>
                <div class="icon"><i class="fas fa-quote-left"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card card-stat" style="background: linear-gradient(135deg, #1B4D3E, #2d6a4f);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-0 opacity-75">Visites</p>
                    <h3 class="mb-0">{{ $visits['total'] ?? 0 }}</h3>
                </div>
                <div class="icon"><i class="fas fa-eye"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stat" style="background: linear-gradient(135deg, #D4AF37, #e8c547);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-0 opacity-75 text-dark">Visites Aujourd'hui</p>
                    <h3 class="mb-0 text-dark">{{ $visits['today'] ?? 0 }}</h3>
                </div>
                <div class="icon text-dark"><i class="fas fa-calendar-day"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stat" style="background: linear-gradient(135deg, #2C2C2C, #4a4a4a);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-0 opacity-75">Cette Semaine</p>
                    <h3 class="mb-0">{{ $visits['week'] ?? 0 }}</h3>
                </div>
                <div class="icon"><i class="fas fa-calendar-week"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stat" style="background: linear-gradient(135deg, #e07b39, #f0934a);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-0 opacity-75">Ce Mois</p>
                    <h3 class="mb-0">{{ $visits['month'] ?? 0 }}</h3>
                </div>
                <div class="icon"><i class="fas fa-calendar-alt"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0"><i class="fas fa-chart-pie me-2 text-primary"></i>Statut des Articles</h5>
            </div>
            <div class="card-body">
                <canvas id="newsStatusChart" style="max-height: 300px;"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0"><i class="fas fa-chart-line me-2 text-primary"></i>Visites des 30 derniers jours</h5>
            </div>
            <div class="card-body">
                <canvas id="visitChart" style="max-height: 300px;"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0"><i class="fas fa-trophy me-2 text-primary"></i>Articles les Plus Vus</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($topArticles as $article)
                    <div class="col-md-2 col-4 mb-3">
                        <div class="card border-0 shadow-sm text-center h-100">
                            <div class="card-body">
                                <div class="text-warning mb-2">
                                    @for($i = 1; $i <= min($loop->index + 1, 5); $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                </div>
                                <h6 class="mb-1">{{ Str::limit($article->title, 40) }}</h6>
                                <p class="text-muted mb-0"><i class="fas fa-eye me-1"></i>{{ $article->views_count }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const newsStatusCtx = document.getElementById('newsStatusChart');
    if (newsStatusCtx) {
        new Chart(newsStatusCtx, {
            type: 'pie',
            data: {
                labels: ['Publié', 'Brouillon', 'Programmé'],
                datasets: [{
                    data: [{{ $newsStatus['published'] ?? 0 }}, {{ $newsStatus['draft'] ?? 0 }}, {{ $newsStatus['scheduled'] ?? 0 }}],
                    backgroundColor: ['#28a745', '#dc3545', '#ffc107'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    }

    const visitCtx = document.getElementById('visitChart');
    if (visitCtx) {
        const labels = @json($visitChart->pluck('date')->map(fn($d) => \Carbon\Carbon::parse($d)->format('d/m/Y')));
        const data = @json($visitChart->pluck('total'));

        new Chart(visitCtx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Visites',
                    data: data,
                    backgroundColor: 'rgba(27, 77, 62, 0.8)',
                    borderRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    }
</script>

<div class="row g-4">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0"><i class="fas fa-clock me-2 text-primary"></i>Dernières Actualités</h5>
            </div>
            <div class="card-body">
                @forelse($recentNews ?? [] as $item)
                <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                    <div>
                        <h6 class="mb-0">{{ Str::limit($item->title, 60) }}</h6>
                        <small class="text-muted">{{ $item->created_at->format('d/m/Y') }}</small>
                    </div>
                    <span class="badge badge-custom {{ $item->status == 'published' ? 'badge-success' : 'badge-warning' }}">
                        {{ ucfirst($item->status) }}
                    </span>
                </div>
                @empty
                <p class="text-muted text-center py-4">Aucune actualité pour le moment.</p>
                @endforelse
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0"><i class="fas fa-rocket me-2 text-primary"></i>Actions Rapides</h5>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.news.create') }}" class="btn btn-primary-custom w-100 mb-2">
                    <i class="fas fa-plus me-2"></i>Nouvelle Actualité
                </a>
                <a href="{{ route('admin.programs.create') }}" class="btn btn-primary-custom w-100 mb-2">
                    <i class="fas fa-plus me-2"></i>Nouveau Programme
                </a>
                <a href="{{ route('admin.partners.create') }}" class="btn btn-primary-custom w-100 mb-2">
                    <i class="fas fa-plus me-2"></i>Nouveau Partenaire
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
