@extends('base')

@section('title', 'Admin Login')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-white via-slate-50 to-slate-100 px-4">
    <div class="flex flex-col items-center space-y-3">
        <div class="bg-purple-600 p-3 rounded-full shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-2.21-1.79-4-4-4s-4 1.79-4 4 4 6 4 6 4-3.79 4-6zM12 3c4.42 0 8 3.58 8 8s-3.58 8-8 8-8-3.58-8-8"/>
            </svg>
        </div>
        <h1 class="text-2xl font-bold text-gray-800">Admin Login</h1>
        <p class="text-sm text-gray-500">Sign in to access the admin panel</p>
    </div>

    <div class="bg-white w-full max-w-md mt-6 p-6 rounded-2xl shadow-xl">
        <div class="mb-6">
            <div class="flex items-center gap-2 mb-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-2.21-1.79-4-4-4s-4 1.79-4 4 4 6 4 6 4-3.79 4-6z" />
                </svg>
                <h2 class="text-lg font-semibold">Administrator Access</h2>
            </div>
            <p class="text-sm text-gray-500">Secure login required</p>
        </div>

        @if (session('success'))
            <div class="mb-3 p-2 bg-green-100 text-green-700 text-sm rounded">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="mb-3 p-2 bg-red-100 text-red-700 text-sm rounded">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('adminSubmitLogin') }}" class="space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1" for="email">Email or Username</label>
                <div class="relative">
                    <input id="email" name="email" type="email"
                        class="w-full pl-10 pr-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}" required>
                    <div class="absolute left-3 top-2.5 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A13.937 13.937 0 0112 15c2.761 0 5.304.804 7.879 2.195M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                </div>
                @error('email')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1" for="password">Password</label>
                <div class="relative">
                    <input id="password" name="password" type="password"
                        class="w-full pl-10 pr-10 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 @error('password') border-red-500 @enderror"
                        required>
                    <div class="absolute left-3 top-2.5 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 11c0-2.21-1.79-4-4-4s-4 1.79-4 4 4 6 4 6 4-3.79 4-6z" />
                        </svg>
                    </div>
                    <div class="absolute right-3 top-2.5 text-gray-400 cursor-pointer">
                        <!-- Password toggle icon (can be hooked up with JS) -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 01-6 0m6 0a6 6 0 00-12 0 6 6 0 0012 0z" />
                        </svg>
                    </div>
                </div>
                @error('password')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- Submit -->
            <div>
                <button type="submit"
                    class="w-full py-2 bg-purple-600 text-white font-semibold rounded-md hover:bg-purple-700 transition">
                    <div class="flex justify-center items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 6H6a2 2 0 00-2 2v8a2 2 0 002 2h4m6-4l4-4m0 0l-4-4m4 4H10" />
                        </svg>
                        Sign In
                    </div>
                </button>
            </div>
        </form>

        <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="text-sm text-gray-500 hover:text-purple-600 transition flex justify-center items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 19l-7-7 7-7" />
                </svg>
                Back to Visitor Log
            </a>
        </div>

        <p class="text-xs text-center text-gray-400 mt-4">&copy; {{ date('Y') }} Admin Panel</p>
    </div>
</div>
@endsection
