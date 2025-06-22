@extends('base')

@section('title', 'Admin Panel')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .card-box {
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
        }

        .card-total {
            background-color: #3B82F6;
            color: white;
        }

        .card-active {
            background-color: #22C55E;
            color: white;
        }

        .card-signed-out {
            background-color: #374151;
            color: white;
        }

        .visitor-card {
            border-left: 5px solid #3B82F6;
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            background-color: white;
            box-shadow: 0 0.2rem 0.5rem rgba(0, 0, 0, 0.05);
        }

        .status-badge {
            font-size: 0.85rem;
            padding: 0.2rem 0.6rem;
            border-radius: 0.5rem;
            color: white;
        }

        .badge-active {
            background-color: #22C55E;
        }

        .badge-out {
            background-color: #6B7280;
        }
    </style>
@endpush

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold">Welcome to Visitor Logbook</h1>
            <div>
                <a href="{{ route('create') }}" class="btn btn-primary">
                    <i class="bi bi-person-plus-fill me-1"></i> Add Visitor
                </a>
                <a href="{{ route('login') }}" class="btn btn-outline-dark">
                    <i class="bi bi-shield-lock-fill me-1"></i> Admin
                </a>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card-box card-total">
                    <h5><i class="bi bi-people-fill me-2"></i>Total Visitors</h5>
                    <h2>{{ $visitors->count() }}</h2>
                    <p>All time visitors</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-box card-active">
                    <h5><i class="bi bi-person-check-fill me-2"></i>Currently Active</h5>
                    <h2>{{ $visitors->whereNull('time_out')->count() }}</h2>
                    <p>Signed in visitors</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-box card-signed-out">
                    <h5><i class="bi bi-box-arrow-right me-2"></i>Signed Out</h5>
                    <h2>{{ $visitors->whereNotNull('time_out')->count() }}</h2>
                    <p>Completed visits</p>
                </div>
            </div>
        </div>

        <form method="GET" action="{{ route('home') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                    placeholder="Search visitors by name, contact number, or purpose...">
                <button class="btn btn-outline-primary" type="submit">
                    <i class="bi bi-search"></i> Search
                </button>
            </div>
        </form>


        @if (request('search'))
            <div class="mb-2 text-muted">
                Showing results for: <strong>{{ request('search') }}</strong>
            </div>
        @endif

        <h4 class="mb-3">Visitors ({{ $visitors->count() }})</h4>

        @forelse ($visitors as $visitor)
            <div class="visitor-card">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5><i class="bi bi-person-circle me-1"></i>{{ $visitor->firstname }} {{ $visitor->middlename }}
                            {{ $visitor->lastname }}</h5>
                        <p class="mb-1"><strong>👤 Age:</strong> {{ $visitor->age }} |
                            <strong>Sex:</strong> {{ $visitor->sex->sex ?? 'N/A' }}
                        </p>
                        <p class="mb-1"><i class="bi bi-telephone-fill me-1"></i><strong>Contact:</strong>
                            {{ $visitor->contact_number }}</p>
                        <p class="mb-1"><i class="bi bi-clipboard-check me-1"></i><strong>Purpose:</strong>
                            {{ $visitor->purpose_of_visit }}</p>
                        <p class="mb-1 text-success">
                            <i class="bi bi-box-arrow-in-right me-1"></i><strong>Signed in:</strong>
                            {{ $visitor->created_at->format('M d, Y h:i A') }}
                        </p>
                        <p class="mb-1 text-danger">
                            <i class="bi bi-box-arrow-left me-1"></i><strong>Signed out:</strong>
                            {{ $visitor->time_out ? \Carbon\Carbon::parse($visitor->time_out)->format('M d, Y h:i A') : '—' }}
                        </p>
                    </div>
                    <div class="text-end">
                        <span class="status-badge {{ $visitor->time_out ? 'badge-out' : 'badge-active' }}">
                            <i class="bi {{ $visitor->time_out ? 'bi-door-closed' : 'bi-door-open' }}"></i>
                            {{ $visitor->time_out ? 'Signed Out' : 'Active' }}
                        </span>
                        <div class="mt-2">
                            <a href="{{ route('edit', $visitor->id) }}" class="btn btn-sm btn-secondary">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info"><i class="bi bi-info-circle"></i> No visitor records found.</div>
        @endforelse
    </div>
@endsection
