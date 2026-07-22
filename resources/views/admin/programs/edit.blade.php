@extends('admin.layouts.app')

@section('title', 'Modifier le Programme')
@section('page_title', 'Modifier le Programme')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0"><i class="fas fa-edit me-2 text-primary"></i>Modifier le Programme</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.programs.update', $program) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titre *</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $program->title) }}" required>
                @error('title')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug *</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $program->slug) }}" required>
                @error('slug')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description courte *</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $program->description) }}</textarea>
                @error('description')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Contenu détaillé</label>
                <textarea class="form-control" id="content" name="content" rows="6">{{ old('content', $program->content) }}</textarea>
                @error('content')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="icon" class="form-label">Icône (Font Awesome)</label>
                <input type="text" class="form-control" id="icon" name="icon" value="{{ old('icon', $program->icon) }}" placeholder="fas fa-graduation-cap">
                @error('icon')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage(this)">
                <div id="imagePreview" class="mt-2" style="{{ $program->image ? 'display:block;' : 'display:none;' }}">
                    <img id="preview" src="{{ $program->image ? asset('storage/' . $program->image) : '' }}" alt="Preview" style="max-width: 300px; max-height: 200px; border-radius: 5px;">
                </div>
                @error('image')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="order" class="form-label">Ordre d'affichage</label>
                <input type="number" class="form-control" id="order" name="order" value="{{ old('order', $program->order) }}">
                @error('order')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', $program->is_active) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Actif</label>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary-custom"><i class="fas fa-save me-2"></i>Mettre à jour</button>
                <a href="{{ route('admin.programs.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview').src = e.target.result;
            document.getElementById('imagePreview').style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
