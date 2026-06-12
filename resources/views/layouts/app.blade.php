<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LMS') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="preconnect"
        href="https://fonts.googleapis.com">

    <link rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background: #f8fafc;
            font-family: Inter, sans-serif;
        }

        .sidebar {
            min-height: 100vh;
            background: #111827;
        }

        .sidebar a {
            color: #cbd5e1;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 8px;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.08);
            color: #fff;
        }

        .active-link {
            background: #fff;
            color: #111 !important;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <!-- SIDEBAR -->
            <div class="col-md-3 col-lg-2 sidebar p-3 d-none d-md-block">

                <h5 class="text-white fw-bold">LMS</h5>
                <small class="text-secondary">Library System</small>

                <hr class="text-secondary">

                <a href="/dashboard">Dashboard</a>
                <a href="/categories">Categories</a>
                <a href="/books">Books</a>
                <a href="/members">Members</a>
                <a href="/borrowings">Borrowings</a>

            </div>

            <!-- MAIN -->
            <div class="col-md-9 col-lg-10 p-4">

                <!-- TOPBAR -->
                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h5 class="fw-bold mb-0">Library Management</h5>

                    <div class="d-flex align-items-center gap-2">

                        <span class="fw-semibold">
                            {{ Auth::user()->name }}
                        </span>

                        <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary btn-sm">
                            Profile
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-danger btn-sm">
                                Logout
                            </button>
                        </form>

                    </div>

                </div>

                @yield('content')

            </div>

        </div>
    </div>

</body>

</html>