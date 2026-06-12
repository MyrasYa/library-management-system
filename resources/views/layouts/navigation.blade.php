<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">

    <!-- Brand -->
    <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
        LMS
    </a>

    <!-- Mobile Toggle -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="topNav">

        <!-- Left Menu -->
        <ul class="navbar-nav me-auto">

            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}"
                    href="/dashboard">
                    Dashboard
                </a>
            </li>

        </ul>

        <!-- Right Menu -->
        <div class="d-flex align-items-center gap-2 mt-3 mt-lg-0">

            <span class="text-white fw-semibold">
                {{ Auth::user()->name }}
            </span>

            <a href="{{ route('profile.edit') }}" class="btn btn-outline-light btn-sm">
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
</nav>