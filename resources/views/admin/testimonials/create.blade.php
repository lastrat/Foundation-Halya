@extends('admin.layouts.app')

@section('title', 'Nouveau Témoignage')
@section('page_title', 'Ajouter un Témoignage')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0"><i class="fas fa-plus-circle me-2 text-primary"></i>Nouveau Témoignage</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nom *</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Rôle / Fonction</label>
                <input type="text" class="form-control" id="role" name="role" value="{{ old('role') }}">
                @error('role')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="organization" class="form-label">Organisation</label>
                <input type="text" class="form-control" id="organization" name="organization" value="{{ old('organization') }}">
                @error('organization')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Témoignage *</label>
                <textarea class="form-control" id="content" name="content" rows="4" required>{{ old('content') }}</textarea>
                @error('content')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo" accept="image/*" onchange="previewImage(this)">
                <div id="imagePreview" class="mt-2" style="display:none;">
                    <img id="preview" src="" alt="Preview" style="max-width: 150px; max-height: 150px; border-radius: 50%;">
                </div>
                @error('photo')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="order" class="form-label">Ordre d'affichage</label>
                <input type="number" class="form-control" id="order" name="order" value="{{ old('order', 0) }}">
                @error('order')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Actif</label>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary-custom"><i class="fas fa-save me-2"></i>Enregistrer</button>
                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Annuler</a>
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
