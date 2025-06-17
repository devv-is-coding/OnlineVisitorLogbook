@extends('adminbase')

@section('title', 'Admin Panel')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Admin Panel</h2>
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
                                <!-- Mark as Timeout -->
                                <form action="{{ route('timeout', $visitor->id) }}" method="POST"
                                    onsubmit="return confirm('Mark this visitor as timed out?');">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-warning">
                                        <i class="bi bi-clock-history"></i> Timeout
                                    </button>
                                </form>

                                <!-- Delete -->
                                <form action="{{ route('delete', $visitor->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this record?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
