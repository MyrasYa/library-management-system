<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>

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
            font-family: Inter, sans-serif;
            background: linear-gradient(135deg, #0f172a, #1e293b);
            color: white;
        }

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .glass {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 16px;
        }

        .btn-custom {
            padding: 10px 20px;
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark px-4 py-3">
        <a class="navbar-brand fw-bold" href="#">
            LMS
        </a>

        <div class="ms-auto">
            <a href="/login" class="btn btn-outline-light btn-sm me-2">
                Login
            </a>
            <a href="/register" class="btn btn-light btn-sm">
                Register
            </a>
        </div>
    </nav>

    <!-- HERO -->
    <div class="container hero">

        <div class="flex justify-center align-items-center text-center w-100">

            <!-- TEXT -->
            <div class="col-lg-6 mb-4">

                <h1 class="fw-bold display-5">
                    Library Management System
                </h1>

                <p class="text-light opacity-75 mt-3">
                    Manage books, categories, members, and borrowing transactions easily with a simple and modern system.
                </p>

                <div class="mt-4">
                    <a href="/login" class="btn btn-primary btn-custom me-2">
                        Get Started
                    </a>

                    <a href="/register" class="btn btn-outline-light btn-custom">
                        Create Account
                    </a>
                </div>

            </div>

        </div>

    </div>

    <!-- FOOTER -->
    <div class="text-center text-white-50 py-3">
        © {{ date('Y') }} Library Management System
    </div>

</body>

</html>