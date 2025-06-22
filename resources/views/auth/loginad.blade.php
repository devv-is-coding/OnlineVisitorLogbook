@extends('base')

@section('title', 'Admin Login')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<style>
    /* -------------- Layout / background -------------- */
    body{
        background:linear-gradient(135deg,#eef2ff,#ffffff);
    }
    .login-container{
        min-height:100vh;
        display:flex;
        align-items:flex-start;
        justify-content:center;
        padding:6vh 1rem 4vh;
    }

    /* -------------- Card & badge ---------------------- */
    .login-card{
        position:relative;
        background:#fff;
        padding:4.5rem 2.5rem 2.5rem;
        border-radius:1rem;
        box-shadow:0 1rem 2rem rgba(0,0,0,.08);
        max-width:440px;width:100%;
    }
    .brand-badge{
        position:absolute;top:-2.25rem;left:50%;transform:translateX(-50%);
        width:4.5rem;height:4.5rem;border-radius:50%;
        background:radial-gradient(circle at 30% 30%,#9f7aea 0%,#7c3aed 80%);
        box-shadow:0 .5rem 1.25rem rgba(0,0,0,.15);
        display:flex;align-items:center;justify-content:center;
    }
    .brand-badge svg{width:28px;height:28px;fill:#fff;}

    /* -------------- Form ----------------------------- */
    .form-label{font-weight:600;margin-bottom:.25rem}

    /* wrapper = exactly input height, so 50% centering works perfectly */
    .input-wrapper{position:relative}
    .input-wrapper .input-icon,
    .input-wrapper .eye-toggle{
        position:absolute;top:50%;transform:translateY(-50%);
        color:#6c757d;font-size:1.1rem;
    }
    .input-icon{left:.9rem;pointer-events:none}
    .eye-toggle{right:.9rem;cursor:pointer}

    .form-control{padding-left:2.6rem;height:2.875rem}
    .form-control:focus{border-color:#7c3aed;box-shadow:none}

    .btn-purple{background:#7c3aed;border:none;font-weight:500;color:#fff}
    .btn-purple:hover{background:#6633d4}

    a.text-muted:hover{color:#7c3aed}
</style>
@endpush

@section('content')
<div class="login-container">
    <div class="login-card">

        {{-- Floating badge / logo --}}
        <div class="brand-badge" title="Admin Access">
            <svg viewBox="0 0 24 24">
                <path d="M12 1.75a9.25 9.25 0 0 0-9.25 9.25c0 7.37 8.12 11.79 8.48 11.97a.75.75 0 0 0 .54 0c.36-.18 8.48-4.6 8.48-11.97A9.25 9.25 0 0 0 12 1.75Zm0 11.5a2.25 2.25 0 1 1 0-4.5 2.25 2.25 0 0 1 0 4.5Z"/>
            </svg>
        </div>

        <h2 class="text-center fw-bold mt-2">Admin Login</h2>
        <p class="text-center text-muted mb-4">Sign in to access the admin panel securely</p>

        {{-- Flash messages --}}
        @if(session('success'))   <div class="alert alert-success">{{ session('success') }}</div>@endif
        @if(session('error'))     <div class="alert alert-danger">{{ session('error') }}</div>@endif

        {{-- Login form --}}
        <form method="POST" action="{{ route('adminSubmitLogin') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email or Username</label>
                <div class="input-wrapper">
                    <i class="bi bi-person-fill input-icon"></i>
                    <input id="email" name="email" type="text"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" required>
                </div>
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <div class="input-wrapper">
                    <i class="bi bi-lock-fill input-icon"></i>
                    <input id="password" name="password" type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           required>
                    <i id="togglePassword" class="bi bi-eye-slash eye-toggle"></i>
                </div>
                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-purple w-100 mb-3">
                <i class="bi bi-box-arrow-in-right me-1"></i> Sign In
            </button>
        </form>

        <div class="text-center">
            <a href="{{ route('home') }}" class="text-decoration-none text-muted">
                <i class="bi bi-arrow-left-circle"></i> Back to Visitor Log
            </a>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
    /* password visibility toggle */
    const pw   = document.getElementById('password');
    const tog  = document.getElementById('togglePassword');
    tog.addEventListener('click', () => {
        pw.type = pw.type === 'password' ? 'text' : 'password';
        tog.classList.toggle('bi-eye');
        tog.classList.toggle('bi-eye-slash');
    });
</script>
@endpush
