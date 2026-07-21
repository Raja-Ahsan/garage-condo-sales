@extends('screens.admin.layouts.app')

@section('title', 'Sliders')
@section('page_title', 'Sliders')

@section('breadcrumb')
    <li class="breadcrumb-item">Content</li>
    <li class="breadcrumb-item active">Sliders</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="header-top d-flex flex-wrap gap-2 align-items-center justify-content-between">
                            <h5 class="mb-0">Hero Slider</h5>
                            <div class="d-flex flex-wrap gap-2">
                                <form method="GET" action="{{ route('admin.sliders.index') }}" class="d-flex gap-2">
                                    <input
                                        type="search"
                                        name="q"
                                        value="{{ $search }}"
                                        class="form-control form-control-sm"
                                        placeholder="Search title…"
                                        aria-label="Search sliders"
                                    />
                                    <button type="submit" class="btn btn-secondary btn-sm">Search</button>
                                    @if ($search !== '')
                                        <a href="{{ route('admin.sliders.index') }}" class="btn btn-outline-primary btn-sm">Reset</a>
                                    @endif
                                </form>
                                <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary btn-sm">Add Slide</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th style="width: 90px">Image</th>
                                        <th>Title</th>
                                        <th style="width: 100px">Order</th>
                                        <th style="width: 120px">Status</th>
                                        <th style="width: 160px" class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($sliders as $slider)
                                        <tr>
                                            <td>
                                                <img
                                                    src="{{ $slider->image_url }}"
                                                    alt="{{ $slider->title ?? 'Slide' }}"
                                                    class="img-fluid rounded"
                                                    style="width: 72px; height: 48px; object-fit: cover;"
                                                    loading="lazy"
                                                />
                                            </td>
                                            <td>{{ $slider->title ?: '—' }}</td>
                                            <td>{{ $slider->sort_order }}</td>
                                            <td>
                                                @if ($slider->status === 'active')
                                                    <span class="badge badge-light-success">Active</span>
                                                @else
                                                    <span class="badge badge-light-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="text-end">
                                                <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-secondary btn-sm">Edit</a>
                                                <form
                                                    action="{{ route('admin.sliders.destroy', $slider) }}"
                                                    method="POST"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Delete this slide?');"
                                                >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-4">
                                                No slides yet.
                                                <a href="{{ route('admin.sliders.create') }}">Add the first slide</a>
                                                for the homepage hero.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        @if ($sliders->hasPages())
                            <div class="mt-3">
                                {{ $sliders->links('pagination::bootstrap-5') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
