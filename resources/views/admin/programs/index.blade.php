@extends('admin.layouts.app')

@section('title', 'Gestion des Programmes')
@section('page_title', 'Gestion des Programmes')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-project-diagram me-2 text-primary"></i>Liste des Programmes</h5>
        <a href="{{ route('admin.programs.create') }}" class="btn btn-primary-custom">
            <i class="fas fa-plus me-2"></i>Ajouter un Programme
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Slug</th>
                        <th>Ordre</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($programs as $program)
                    <tr>
                        <td>{{ $program->title }}</td>
                        <td><code>{{ $program->slug }}</code></td>
                        <td>{{ $program->order }}</td>
                        <td>
                            <span class="badge badge-custom {{ $program->is_active ? 'badge-success' : 'badge-danger' }}">
                                {{ $program->is_active ? 'Actif' : 'Inactif' }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.programs.edit', $program) }}" class="btn btn-sm btn-primary-custom">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.programs.destroy', $program) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr ?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center py-4">Aucun programme trouvé.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
