@extends('base')

@section('title', 'Admin Panel')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Online Visitor Log</a>
            <div class="ms-auto">
                <a href="{{ route('login') }}" class="btn btn-outline-light">Login as Admin</a>
            </div>
        </div>
    </nav>
    <!-- Visitor Table Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Visitor Logbook</h2>
        <a href="{{ route('create') }}" class="btn btn-primary" target="_blank">Add New Visitor</a>
    </div>


    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($visitors->isEmpty())
        <div class="alert alert-info">No visitor records found.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Sex</th>
                        <th>Age</th>
                        <th>Contact</th>
                        <th>Purpose</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($visitors as $index => $visitor)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $visitor->firstname }} {{ $visitor->middlename }} {{ $visitor->lastname }}</td>
                            <td>{{ $visitor->sex }}</td>
                            <td>{{ $visitor->age }}</td>
                            <td>{{ $visitor->contact_number }}</td>
                            <td>{{ $visitor->purpose_of_visit }}</td>
                            <td>{{ $visitor->created_at }}</td>
                            <td>{{ $visitor->time_out }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('edit', $visitor->id) }}" class="btn btn-sm btn-secondary">
                                    Edit
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
