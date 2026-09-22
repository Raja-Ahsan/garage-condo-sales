@extends('screens.admin.layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active">Overview</li>
@endsection

@section('content')
    <div class="row g-3">
        <div class="col-xl-8">
            <div class="card profile-box h-100">
                <div class="card-body">
                    <p class="stat-label mb-2">Welcome back</p>
                    <h2 class="mb-2">{{ $user->name }}</h2>
                    <p class="text-muted mb-4">
                        Manage {{ $property['name'] ?? 'the listing' }} — inquiries, slider, and listing details.
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <a class="btn btn-primary" href="{{ route('admin.inquiries.index') }}">View inquiries</a>
                        <a class="btn btn-outline-primary" href="{{ route('web.home') }}" target="_blank" rel="noopener">View public site</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card h-100">
                <div class="card-body">
                    <p class="stat-label mb-2">Listing</p>
                    <h4 class="mb-1">{{ $property['name'] ?? 'Property' }}</h4>
                    <p class="text-muted mb-0">{{ $property['address'] ?? '' }}</p>
                    <p class="mt-3 mb-0 txt-primary fw-semibold">{{ $stats['price_label'] ?? '' }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mt-0">
        <div class="col-sm-6 col-xl-3">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <p class="stat-label mb-0">New inquiries</p>
                    <p class="stat-value">{{ $stats['new_inquiries'] }}</p>
                    <a href="{{ route('admin.inquiries.index', ['status' => 'new']) }}" class="small">Open unread</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <p class="stat-label mb-0">Total inquiries</p>
                    <p class="stat-value">{{ $stats['inquiries'] }}</p>
                    <span class="small text-muted">Contact form submissions</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <p class="stat-label mb-0">Listing price</p>
                    <p class="stat-value">{{ $stats['price_label'] ?? '—' }}</p>
                    <span class="small text-muted">{{ $stats['units'] }} units · {{ $stats['photos'] }} photos</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <p class="stat-label mb-0">Users</p>
                    <p class="stat-value">{{ $stats['users'] }}+</p>
                    <span class="small text-muted">{{ $stats['sliders'] }} slider {{ \Illuminate\Support\Str::plural('image', $stats['sliders']) }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mt-0">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="header-top d-flex flex-wrap gap-2 align-items-center justify-content-between">
                        <h5 class="mb-0">Recent inquiries</h5>
                        <a href="{{ route('admin.inquiries.index') }}" class="btn btn-secondary btn-sm">View all</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Visitor</th>
                                    <th>Email</th>
                                    <th>Use</th>
                                    <th>Status</th>
                                    <th>Received</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($recentInquiries as $inquiry)
                                    <tr>
                                        <td>{{ $inquiry->name }}</td>
                                        <td>{{ $inquiry->email }}</td>
                                        <td>{{ $inquiry->intended_use ?: '—' }}</td>
                                        <td>
                                            @if ($inquiry->isNew())
                                                <span class="badge badge-light-warning">New</span>
                                            @else
                                                <span class="badge badge-light-success">Read</span>
                                            @endif
                                        </td>
                                        <td>{{ $inquiry->created_at?->diffForHumans() }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="btn btn-secondary btn-sm">Open</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-muted">
                                            No inquiries yet. Submissions from the public contact form will appear here.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
