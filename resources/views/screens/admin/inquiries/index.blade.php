@extends('screens.admin.layouts.app')

@section('title', 'Inquiries')
@section('page_title', 'Inquiries')

@section('breadcrumb')
    <li class="breadcrumb-item active">Contact inquiries</li>
@endsection

@section('content')
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="header-top d-flex flex-wrap gap-2 align-items-center justify-content-between">
                            <div>
                                <h5 class="mb-1">Contact inquiries</h5>
                                <p class="mb-0 text-muted small">
                                    {{ $newCount }} unread · submissions also email {{ config('mail.to.address') }}
                                </p>
                            </div>
                            <form method="GET" action="{{ route('admin.inquiries.index') }}" class="d-flex flex-wrap gap-2">
                                <select name="status" class="form-select form-select-sm" aria-label="Filter by status">
                                    <option value="">All statuses</option>
                                    <option value="new" @selected($status === 'new')>New</option>
                                    <option value="read" @selected($status === 'read')>Read</option>
                                </select>
                                <input
                                    type="search"
                                    name="q"
                                    value="{{ $search }}"
                                    class="form-control form-control-sm"
                                    placeholder="Search name, email, message…"
                                    aria-label="Search inquiries"
                                />
                                <button type="submit" class="btn btn-secondary btn-sm">Search</button>
                                @if ($search !== '' || $status !== '')
                                    <a href="{{ route('admin.inquiries.index') }}" class="btn btn-outline-primary btn-sm">Reset</a>
                                @endif
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>Visitor</th>
                                        <th>Contact</th>
                                        <th>Intended use</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Received</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($inquiries as $inquiry)
                                        <tr>
                                            <td>{{ $inquiry->name }}</td>
                                            <td>
                                                <a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a>
                                                @if ($inquiry->phone)
                                                    <div class="small text-muted">{{ $inquiry->phone }}</div>
                                                @endif
                                            </td>
                                            <td>{{ $inquiry->intended_use ?: '—' }}</td>
                                            <td>
                                                <div class="inquiry-preview">{{ $inquiry->message ?: '—' }}</div>
                                            </td>
                                            <td>
                                                @if ($inquiry->isNew())
                                                    <span class="badge badge-light-warning">New</span>
                                                @else
                                                    <span class="badge badge-light-success">Read</span>
                                                @endif
                                            </td>
                                            <td>{{ $inquiry->created_at?->timezone(config('app.timezone'))->format('M j, Y g:i A') }}</td>
                                            <td class="text-end">
                                                <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="btn btn-secondary btn-sm">View</a>
                                                <form
                                                    action="{{ route('admin.inquiries.destroy', $inquiry) }}"
                                                    method="POST"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Delete this inquiry?');"
                                                >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-4">
                                                No inquiries yet. When a visitor submits the contact form, it will show here.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        @if ($inquiries->hasPages())
                            <div class="mt-3">
                                {{ $inquiries->links('pagination::bootstrap-5') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
