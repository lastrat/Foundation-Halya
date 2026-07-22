@extends('admin.layouts.app')

@section('title', 'Gestion des Actualités')
@section('page_title', 'Gestion des Actualités')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-newspaper me-2 text-primary"></i>Liste des Actualités</h5>
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary-custom">
            <i class="fas fa-plus me-2"></i>Nouvelle Actualité
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Statut</th>
                        <th>Épinglé</th>
                        <th>Publié le</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($news as $item)
                    <tr>
                        <td><strong>{{ $item->title }}</strong></td>
                        <td>{{ $item->author->name ?? 'N/A' }}</td>
                        <td>
                            <span class="badge badge-custom {{ $item->status == 'published' ? 'badge-success' : ($item->status == 'scheduled' ? 'badge-warning' : 'badge-danger') }}">
                                {{ $item->status == 'published' ? 'Publié' : ($item->status == 'scheduled' ? 'Programmé' : 'Brouillon') }}
                            </span>
                        </td>
                        <td>
                            @if($item->is_pinned)
                                <i class="fas fa-thumbtack text-warning"></i>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $item->published_at ? $item->published_at->format('d/m/Y H:i') : '-' }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-sm btn-primary-custom">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.news.destroy', $item) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr ?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center py-4">Aucune actualité trouvée.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
