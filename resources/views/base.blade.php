<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Online Visitor Log')</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Optional Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- Page-level Styles --}}
    @stack('styles')

    <style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            background-color: #f9fafb;
        }

        main {
            flex: 1;
        }

        footer {
            background-color: #212529;
            color: #ffffff;
            text-align: center;
            padding: 1rem 0;
        }
    </style>
</head>

<body>
    {{-- Main Content --}}
    <main class="flex-grow-1 container py-4">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer>
        <small>© {{ date('Y') }} Visitor Logbook System</small>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Page-level Scripts --}}
    @stack('scripts')
</body>

</html>
