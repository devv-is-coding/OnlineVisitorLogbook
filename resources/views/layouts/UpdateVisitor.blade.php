@extends('base')

@section('title', 'Edit Visitor')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .input-icon-wrapper {
            position: relative;
        }

        .input-icon-wrapper i {
            position: absolute;
            left: 0.9rem;
            top: 72%; /* Adjusted from 55% to 58% */
            transform: translateY(-50%);
            color: #6c757d;
            pointer-events: none;
            font-size: 1.1rem;
        }

        .input-icon-wrapper input,
        .input-icon-wrapper select,
        .input-icon-wrapper textarea {
            padding-left: 2.5rem;
        }
    </style>
@endpush


@section('content')
    <div class="container mt-4">
        <h2>Edit Visitor</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('update', $visitor->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="row mb-3">
                <div class="col-md-4 input-icon-wrapper">
                    <label for="firstname" class="form-label">First Name</label>
                    <i class="bi bi-person-fill"></i>
                    <input type="text" name="firstname" class="form-control"
                        value="{{ old('firstname', $visitor->firstname) }}" required>
                </div>
                <div class="col-md-4 input-icon-wrapper">
                    <label for="middlename" class="form-label">Middle Name</label>
                    <i class="bi bi-person-lines-fill"></i>
                    <input type="text" name="middlename" class="form-control"
                        value="{{ old('middlename', $visitor->middlename) }}">
                </div>
                <div class="col-md-4 input-icon-wrapper">
                    <label for="lastname" class="form-label">Last Name</label>
                    <i class="bi bi-person-fill"></i>
                    <input type="text" name="lastname" class="form-control"
                        value="{{ old('lastname', $visitor->lastname) }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2 input-icon-wrapper">
                    <label for="age" class="form-label">Age</label>
                    <i class="bi bi-calendar2-week-fill"></i>
                    <input type="number" name="age" class="form-control" min="1"
                        value="{{ old('age', $visitor->age) }}" required>
                </div>
                <div class="col-md-4 input-icon-wrapper">
                    <label for="sex_id" class="form-label">Sex</label>
                    <i class="bi bi-gender-ambiguous"></i>
                    <select name="sex_id" class="form-select" required>
                        <option value="" disabled {{ old('sex_id', $visitor->sex_id) ? '' : 'selected' }}>Choose...</option>
                        @foreach ($sexes as $sex)
                            <option value="{{ $sex->id }}"
                                {{ old('sex_id', $visitor->sex_id) == $sex->id ? 'selected' : '' }}>
                                {{ $sex->sex }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 input-icon-wrapper">
                    <label for="contact_number" class="form-label">Contact Number</label>
                    <i class="bi bi-telephone-fill"></i>
                    <input type="text" name="contact_number" class="form-control"
                        value="{{ old('contact_number', $visitor->contact_number) }}" required>
                </div>
            </div>

            <div class="mb-3 input-icon-wrapper">
                <label for="purpose_of_visit" class="form-label">Purpose of Visit</label>
                <i class="bi bi-clipboard-check-fill"></i>
                <textarea name="purpose_of_visit" class="form-control" rows="3" required>{{ old('purpose_of_visit', $visitor->purpose_of_visit) }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
