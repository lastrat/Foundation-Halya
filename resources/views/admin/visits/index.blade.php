@extends('admin.layouts.app')

@section('title', 'Statistiques de Visites')
@section('page_title', 'Statistiques de Visites')

@section('content')
<div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0"><i class="fas fa-filter me-2 text-primary"></i>Filtrer par période</h5>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('admin.visits.index') }}" class="row g-3">
            <div class="col-md-4">
                <label for="start_date" class="form-label">Date de début</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $start }}">
            </div>
            <div class="col-md-4">
                <label for="end_date" class="form-label">Date de fin</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $end }}">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary-custom w-100"><i class="fas fa-search me-2"></i>Filtrer</button>
            </div>
        </form>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card card-stat" style="background: linear-gradient(135deg, #1B4D3E, #2d6a4f);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-0 opacity-75">Total Visites</p>
                    <h3 class="mb-0">{{ $total }}</h3>
                </div>
                <div class="icon"><i class="fas fa-eye"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0"><i class="fas fa-chart-bar me-2 text-primary"></i>Visites par Jour</h5>
            </div>
            <div class="card-body">
                @if($perDay->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th class="text-end">Visites</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($perDay as $day)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($day->date)->format('d/m/Y') }}</td>
                                <td class="text-end">{{ $day->total }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-muted text-center py-4">Aucune visite sur cette période.</p>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0"><i class="fas fa-chart-line me-2 text-primary"></i>Visites par Semaine</h5>
            </div>
            <div class="card-body">
                @if($perWeek->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Semaine</th>
                                <th class="text-end">Visites</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($perWeek as $week)
                            <tr>
                                <td>Semaine {{ $week->week }} - {{ $week->year }}</td>
                                <td class="text-end">{{ $week->total }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-muted text-center py-4">Aucune visite sur cette période.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0"><i class="fas fa-chart-area me-2 text-primary"></i>Visites par Mois</h5>
            </div>
            <div class="card-body">
                @if($perMonth->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Mois</th>
                                <th class="text-end">Visites</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($perMonth as $month)
                            <tr>
                                <td>{{ \Carbon\Carbon::createFromDate($month->year, $month->month, 1)->format('F Y') }}</td>
                                <td class="text-end">{{ $month->total }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-muted text-center py-4">Aucune visite sur cette période.</p>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0"><i class="fas fa-chart-pie me-2 text-primary"></i>Visites par Année</h5>
            </div>
            <div class="card-body">
                @if($perYear->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Année</th>
                                <th class="text-end">Visites</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($perYear as $year)
                            <tr>
                                <td>{{ $year->year }}</td>
                                <td class="text-end">{{ $year->total }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-muted text-center py-4">Aucune visite sur cette période.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection