@extends('admin.layouts.app')

@section('title', 'Gestion des Partenaires')
@section('page_title', 'Gestion des Partenaires')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-handshake me-2 text-primary"></i>Liste des Partenaires</h5>
        <a href="{{ route('admin.partners.create') }}" class="btn btn-primary-custom">
            <i class="fas fa-plus me-2"></i>Ajouter un Partenaire
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Nom</th>
                        <th>Site Web</th>
                        <th>Ordre</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($partners as $partner)
                    <tr>
                        <td>
                            @if($partner->logo)
                            <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" style="width: 80px; height: 50px; object-fit: contain; border-radius: 5px;">
                            @else
                            <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $partner->name }}</td>
                        <td>{{ $partner->website ?: '-' }}</td>
                        <td>{{ $partner->order }}</td>
                        <td>
                            <span class="badge badge-custom {{ $partner->is_active ? 'badge-success' : 'badge-danger' }}">
                                {{ $partner->is_active ? 'Actif' : 'Inactif' }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.partners.edit', $partner) }}" class="btn btn-sm btn-primary-custom">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.partners.destroy', $partner) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr ?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center py-4">Aucun partenaire trouvé.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
