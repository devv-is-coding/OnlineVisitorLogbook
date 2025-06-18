<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Online Visitor Log')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-4">
        <small>© {{ date('Y') }} Visitor Logbook System</small>
    </footer>
</body>
</html>
