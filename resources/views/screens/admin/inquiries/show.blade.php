@extends('screens.admin.layouts.app')

@section('title', $inquiry->name.' — Inquiry')
@section('page_title', 'Inquiry')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.inquiries.index') }}">Inquiries</a></li>
    <li class="breadcrumb-item active">{{ $inquiry->name }}</li>
@endsection

@section('content')
    <div class="container-fluid px-0">
        <div class="row g-3">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex flex-wrap gap-2 align-items-center justify-content-between">
                            <h5 class="mb-0">{{ $inquiry->name }}</h5>
                            @if ($inquiry->isNew())
                                <span class="badge badge-light-warning">New</span>
                            @else
                                <span class="badge badge-light-success">Read</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <dl class="row mb-0">
                            <dt class="col-sm-3">Email</dt>
                            <dd class="col-sm-9">
                                <a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a>
                            </dd>
                            <dt class="col-sm-3">Phone</dt>
                            <dd class="col-sm-9">{{ $inquiry->phone ?: 'Not provided' }}</dd>
                            <dt class="col-sm-3">Intended use</dt>
                            <dd class="col-sm-9">{{ $inquiry->intended_use ?: 'Not provided' }}</dd>
                            <dt class="col-sm-3">Received</dt>
                            <dd class="col-sm-9">{{ $inquiry->created_at?->timezone(config('app.timezone'))->format('F j, Y g:i A') }}</dd>
                            <dt class="col-sm-3">Message</dt>
                            <dd class="col-sm-9">
                                {!! $inquiry->message
                                    ? nl2br(e($inquiry->message))
                                    : '<span class="text-muted">No message</span>' !!}
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Actions</h5>
                    </div>
                    <div class="card-body d-grid gap-2">
                        <a
                            class="btn btn-primary"
                            href="mailto:{{ $inquiry->email }}?subject={{ rawurlencode('Re: Dual Luxury Garage Condos') }}"
                        >
                            Reply by email
                        </a>
                        <form action="{{ route('admin.inquiries.update', $inquiry) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            @if ($inquiry->isNew())
                                <input type="hidden" name="action" value="read" />
                                <button type="submit" class="btn btn-secondary w-100">Mark as read</button>
                            @else
                                <input type="hidden" name="action" value="unread" />
                                <button type="submit" class="btn btn-secondary w-100">Mark as unread</button>
                            @endif
                        </form>
                        <a href="{{ route('admin.inquiries.index') }}" class="btn btn-outline-primary">Back to list</a>
                        <form
                            action="{{ route('admin.inquiries.destroy', $inquiry) }}"
                            method="POST"
                            onsubmit="return confirm('Delete this inquiry?');"
                        >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">Delete inquiry</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
