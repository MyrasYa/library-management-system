<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Library Management System' }}</title>

    <link rel="preconnect"
        href="https://fonts.googleapis.com">

    <link rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
        }

        .card {
            border-radius: 14px;
        }

        .btn {
            border-radius: 10px;
        }

        .sidebar {
            min-height: 100vh;
        }

        .sidebar .nav-link {
            color: #cbd5e1;
            border-radius: 8px;
            padding: 10px 14px;
            transition: .2s;
        }

        .sidebar .nav-link:hover {
            background: rgba(255, 255, 255, .08);
            color: white;
        }

        .sidebar .nav-link.active {
            background: white;
            color: #111827 !important;
            font-weight: 600;
        }

        .mobile-link {
            display: block;
            padding: 8px 0;
            color: #111827;
            text-decoration: none;
        }

        .mobile-link:hover {
            color: #0d6efd;
        }

        @media (min-width: 992px) {
            .sidebar {
                position: sticky;
                top: 0;
            }
        }
    </style>

</head>

<body>

    <div class="container-fluid">


        <div class="row">

            <!-- SIDEBAR DESKTOP -->

            <aside class="col-lg-2 bg-dark sidebar text-white p-4 d-none d-lg-block">

                <h4 class="fw-bold mb-1 display-6">
                    LMS
                </h4>

                <p class="small text-secondary mb-4">
                    Library Management System
                </p>

                <hr>

                <ul class="nav flex-column gap-2">

                    <li class="nav-item">
                        <a href="/dashboard"
                            class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/categories"
                            class="nav-link {{ request()->is('categories*') ? 'active' : '' }}">
                            Categories
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/books"
                            class="nav-link {{ request()->is('books*') ? 'active' : '' }}">
                            Books
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/members"
                            class="nav-link {{ request()->is('members*') ? 'active' : '' }}">
                            Members
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/borrowings"
                            class="nav-link {{ request()->is('borrowings*') ? 'active' : '' }}">
                            Borrowings
                        </a>
                    </li>

                </ul>

            </aside>

            <!-- MAIN -->

            <main class="col-lg-10 col-12 p-4">

                <!-- MOBILE/TABLET MENU -->

                <div class="dropdown d-lg-none mb-3">

                    <button
                        class="btn btn-dark dropdown-toggle"
                        type="button"
                        data-bs-toggle="dropdown">

                        ☰ Menu

                    </button>

                    <ul class="dropdown-menu mt-2">

                        <li>
                            <a class="dropdown-item" href="/dashboard">
                                Dashboard
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="/categories">
                                Categories
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="/books">
                                Books
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="/members">
                                Members
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="/borrowings">
                                Borrowings
                            </a>
                        </li>

                    </ul>

                </div>

                <!-- TOPBAR -->

                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-body">

                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">

                            <div>

                                <h5 class="mb-2 fw-semibold fs-1 text-decoration-underline">
                                    Library Management System
                                </h5>
                                <p class="text-muted mb-0">Manage books, members, and borrowing activities easily in one simple and efficient system.</p>

                            </div>

                            <div class="d-flex flex-column flex-sm-row flex-wrap align-items-center gap-2">


                                <span class="fw-light fs-5 text-decoration-underline">

                                    {{ Auth::user()->name }}

                                </span>

                                <a href="{{ route('profile.edit') }}"
                                    class="btn btn-outline-secondary btn-sm">

                                    Profile

                                </a>

                                <form action="{{ route('logout') }}"
                                    method="POST">

                                    @csrf

                                    <button type="submit"
                                        class="btn btn-danger btn-sm">

                                        Logout

                                    </button>

                                </form>


                            </div>

                        </div>

                    </div>

                </div>

                <!-- PAGE CONTENT -->

                @yield('content')

            </main>

        </div>

    </div>

</body>

</html>