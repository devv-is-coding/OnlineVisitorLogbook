@extends('base')

@section('title', 'Edit Visitor')

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
            <div class="col-md-4">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" name="firstname" class="form-control"
                    value="{{ old('firstname', $visitor->firstname) }}" required>
            </div>
            <div class="col-md-4">
                <label for="middlename" class="form-label">Middle Name</label>
                <input type="text" name="middlename" class="form-control"
                    value="{{ old('middlename', $visitor->middlename) }}">
            </div>
            <div class="col-md-4">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" name="lastname" class="form-control"
                    value="{{ old('lastname', $visitor->lastname) }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-2">
                <label for="age" class="form-label">Age</label>
                <input type="number" name="age" class="form-control" min="1"
                    value="{{ old('age', $visitor->age) }}" required>
            </div>
            <div class="col-md-4">
                <label for="sex_id" class="form-label">Sex</label>
                <select name="sex_id" class="form-select" required>
                    <option value="" disabled {{ old('sex_id', optional($visitor->sexes->first())->id) ? '' : 'selected' }}>Choose...</option>
                    @foreach ($sexes as $sex)
                        <option value="{{ $sex->id }}"
                            {{ old('sex_id', optional($visitor->sexes->first())->id) == $sex->id ? 'selected' : '' }}>
                            {{ $sex->sex }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="contact_number" class="form-label">Contact Number</label>
                <input type="text" name="contact_number" class="form-control"
                    value="{{ old('contact_number', $visitor->contact_number) }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="purpose_of_visit" class="form-label">Purpose of Visit</label>
            <textarea name="purpose_of_visit" class="form-control" rows="3" required>{{ old('purpose_of_visit', $visitor->purpose_of_visit) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
