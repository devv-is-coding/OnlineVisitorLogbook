@extends('base')

@section('title', 'Add Visitor')

@section('content')
<div class="container mt-4">
    <h2>Add New Visitor</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('store') }}" method="POST">
        @csrf

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" name="firstname" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="middlename" class="form-label">Middle Name</label>
                <input type="text" name="middlename" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" name="lastname" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-2">
                <label for="age" class="form-label">Age</label>
                <input type="number" name="age" class="form-control" min="1" required>
            </div>
            <div class="col-md-4">
                <label for="sex" class="form-label">Sex</label>
                <select name="sex" class="form-select" required>
                    <option value="" selected disabled>Choose...</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Prefer not to say">Prefer not to say</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="contact_number" class="form-label">Contact Number</label>
                <input type="text" name="contact_number" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="purpose_of_visit" class="form-label">Purpose of Visit</label>
            <textarea name="purpose_of_visit" class="form-control" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
