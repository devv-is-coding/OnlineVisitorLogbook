<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Visitor Log</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Online Visitor Log</a>
            <div class="ms-auto">
                <a href="{{ url('/login') }}" class="btn btn-outline-light">Login as Admin</a>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer class="text-center mt-4 mb-4">
        <small>&copy; {{ date('Y') }} Student App</small>
    </footer>
</body>
</html>