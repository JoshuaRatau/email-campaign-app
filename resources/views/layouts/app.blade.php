<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Email Campaign Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom palette -->
    <style>
        :root {
            --primary-blue: #0d6efd;
            --bg-light-blue: #f0f7ff;
        }

        body {
            background-color: var(--bg-light-blue);
        }

        /* Blue primary buttons everywhere */
        .btn-primary,
        .btn-outline-primary {
            background-color: var(--primary-blue) !important;
            border-color: var(--primary-blue) !important;
            color: #fff !important;
        }

        .btn-outline-primary:hover {
            background-color: #0b5ed7 !important;
            border-color: #0a58ca !important;
        }

        /* Card accents */
        .card-header {
            background-color: var(--primary-blue);
            color: #fff;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: var(--primary-blue);">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">Campaign App</a>
        </div>
    </nav>

    <main class="container-fluid py-4">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>