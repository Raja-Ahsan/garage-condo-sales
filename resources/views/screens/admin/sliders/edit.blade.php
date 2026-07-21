@extends('screens.admin.layouts.app')

@section('title', 'Edit Slide')
@section('page_title', 'Edit Slide')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">Sliders</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Edit hero slide</h5>
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ route('admin.sliders.update', $slider) }}"
                            method="POST"
                            enctype="multipart/form-data"
                            id="slider-edit-form"
                        >
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label" for="title">Title <span class="text-muted">(optional)</span></label>
                                <input
                                    type="text"
                                    name="title"
                                    id="title"
                                    value="{{ old('title', $slider->title) }}"
                                    class="form-control @error('title') is-invalid @enderror"
                                    maxlength="255"
                                />
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Current image</label>
                                <div>
                                    <img
                                        src="{{ $slider->image_url }}"
                                        alt="{{ $slider->title ?? 'Slide' }}"
                                        class="img-fluid rounded mb-2"
                                        style="max-height: 220px;"
                                    />
                                </div>
                                <label class="form-label" for="image">Replace image</label>
                                <input
                                    type="file"
                                    name="image"
                                    id="image"
                                    accept="image/jpeg,image/png,image/webp,image/gif"
                                    class="form-control @error('image') is-invalid @enderror"
                                />
                                <div class="form-text">Leave empty to keep the current image. Max 5MB.</div>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="mt-3 d-none" id="image-preview-wrap">
                                    <img id="image-preview" src="" alt="Preview" class="img-fluid rounded" style="max-height: 220px;" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="sort_order">Sort order</label>
                                    <input
                                        type="number"
                                        name="sort_order"
                                        id="sort_order"
                                        value="{{ old('sort_order', $slider->sort_order) }}"
                                        min="0"
                                        max="9999"
                                        class="form-control @error('sort_order') is-invalid @enderror"
                                    />
                                    @error('sort_order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="status">Status</label>
                                    <select
                                        name="status"
                                        id="status"
                                        class="form-select @error('status') is-invalid @enderror"
                                    >
                                        <option value="active" @selected(old('status', $slider->status) === 'active')>Active</option>
                                        <option value="inactive" @selected(old('status', $slider->status) === 'inactive')>Inactive</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-primary" id="slider-submit-btn">Update slide</button>
                                <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    (function () {
        const input = document.getElementById('image');
        const wrap = document.getElementById('image-preview-wrap');
        const preview = document.getElementById('image-preview');
        const form = document.getElementById('slider-edit-form');
        const btn = document.getElementById('slider-submit-btn');

        if (input && wrap && preview) {
            input.addEventListener('change', function () {
                const file = this.files && this.files[0];
                if (!file) {
                    wrap.classList.add('d-none');
                    preview.removeAttribute('src');
                    return;
                }
                preview.src = URL.createObjectURL(file);
                wrap.classList.remove('d-none');
            });
        }

        if (form && btn) {
            form.addEventListener('submit', function () {
                btn.disabled = true;
                btn.textContent = 'Updating…';
            });
        }
    })();
</script>
@endpush
