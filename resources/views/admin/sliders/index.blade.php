@extends('admin.layouts.app')

@section('title', 'Gestion des Sliders')
@section('page_title', 'Gestion des Sliders')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-images me-2 text-primary"></i>Liste des Sliders</h5>
        <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary-custom">
            <i class="fas fa-plus me-2"></i>Ajouter un Slider
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Titre</th>
                        <th>Ordre</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sliders as $slider)
                    <tr>
                        <td>
                            @if($slider->image && file_exists(public_path('storage/' . $slider->image)))
                            <img src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->title }}" style="width: 150px; height: 80px; object-fit: cover; border-radius: 5px;">
                            @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="width: 150px; height: 80px; border-radius: 5px; color: #999;">
                                <i class="fas fa-image"></i>
                            </div>
                            @endif
                        </td>
                        <td>{{ $slider->title }}</td>
                        <td>{{ $slider->order }}</td>
                        <td>
                            <span class="badge badge-custom {{ $slider->is_active ? 'badge-success' : 'badge-danger' }}">
                                {{ $slider->is_active ? 'Actif' : 'Inactif' }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-sm btn-primary-custom">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr ?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center py-4">Aucun slider trouvé.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
