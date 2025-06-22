@extends('adminbase')

@section('title', 'Admin Panel')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .card-box {
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
        }

        .card-admin {
            background-color: #8b5cf6;
            color: white;
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
            <h1 class="fw-bold">Admin Dashboard</h1>
        </div>

        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card-box card-admin">
                    <h5><i class="bi bi-person-badge me-2"></i>Total Admins</h5>
                    <h2>{{ $adminsCount }}</h2>
                    <p>Registered admins</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-box card-total">
                    <h5><i class="bi bi-people-fill me-2"></i>Total Visitors</h5>
                    <h2>{{ $visitors->count() }}</h2>
                    <p>All time</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-box card-active">
                    <h5><i class="bi bi-person-check-fill me-2"></i>Active</h5>
                    <h2>{{ $visitors->whereNull('time_out')->count() }}</h2>
                    <p>Currently signed in</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-box card-signed-out">
                    <h5><i class="bi bi-box-arrow-right me-2"></i>Signed Out</h5>
                    <h2>{{ $visitors->whereNotNull('time_out')->count() }}</h2>
                    <p>Completed visits</p>
                </div>
            </div>
        </div>

        {{-- Search --}}
        <form method="GET" action="{{ route('adminPanel') }}" class="mb-4">
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

        @if ($visitors->isEmpty())
            <div class="alert alert-info"><i class="bi bi-info-circle"></i> No visitor records found.</div>
        @else
            <h4 class="mb-3">Visitor Records ({{ $visitors->count() }})</h4>

            @foreach ($visitors as $visitor)
                <div class="visitor-card">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5><i class="bi bi-person-circle me-1"></i>{{ $visitor->firstname }} {{ $visitor->middlename }} {{ $visitor->lastname }}</h5>
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

                            <div class="mt-2 d-flex flex-column gap-1 align-items-end">
                                @if (!$visitor->time_out)
                                    <form action="{{ route('timeout', $visitor->id) }}" method="POST"
                                        onsubmit="return confirm('Mark this visitor as timed out?');">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-warning">
                                            <i class="bi bi-clock-history"></i> Timeout
                                        </button>
                                    </form>
                                @endif

                                <a href="{{ route('edit', $visitor->id) }}" class="btn btn-sm btn-secondary">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>

                                <form action="{{ route('delete', $visitor->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this record?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
