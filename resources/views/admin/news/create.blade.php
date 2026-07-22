@extends('admin.layouts.app')

@section('title', 'Nouvelle Actualité')
@section('page_title', 'Ajouter une Actualité')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0"><i class="fas fa-plus-circle me-2 text-primary"></i>Nouvelle Actualité</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titre *</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                @error('title')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug *</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" required>
                @error('slug')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="excerpt" class="form-label">Extrait</label>
                <textarea class="form-control" id="excerpt" name="excerpt" rows="2">{{ old('excerpt') }}</textarea>
                @error('excerpt')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Contenu *</label>
                <textarea class="form-control" id="content" name="content" rows="10" required>{{ old('content') }}</textarea>
                @error('content')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="featured_image" class="form-label">Image à la une</label>
                <input type="file" class="form-control" id="featured_image" name="featured_image" accept="image/*" onchange="previewImage(this)">
                <div id="imagePreview" class="mt-2" style="display:none;">
                    <img id="preview" src="" alt="Preview" style="max-width: 300px; max-height: 200px; border-radius: 5px;">
                </div>
                @error('featured_image')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="status" class="form-label">Statut *</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Brouillon</option>
                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Publié</option>
                        <option value="scheduled" {{ old('status') == 'scheduled' ? 'selected' : '' }}>Programmé</option>
                    </select>
                    @error('status')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="published_at" class="form-label">Date de publication</label>
                    <input type="datetime-local" class="form-control" id="published_at" name="published_at" value="{{ old('published_at') }}">
                    @error('published_at')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="scheduled_at" class="form-label">Date de programmation</label>
                    <input type="datetime-local" class="form-control" id="scheduled_at" name="scheduled_at" value="{{ old('scheduled_at') }}">
                    @error('scheduled_at')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_pinned" name="is_pinned" value="1" {{ old('is_pinned') ? 'checked' : '' }}>
                <label class="form-check-label" for="is_pinned"><i class="fas fa-thumbtack me-1"></i>Épingler cette actualité</label>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary-custom"><i class="fas fa-save me-2"></i>Enregistrer</button>
                <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Annuler</a>
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
