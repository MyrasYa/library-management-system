@extends('layouts.guest')

@section('content')

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">

        <div class="col-md-5">

            <div class="card shadow border-0">

                <div class="card-body p-4">

                    <h3 class="fw-bold text-center mb-2 display-6">Login</h3>
                    <p class="text-center text-muted mb-4">Library Management System</p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" name="remember">
                            <label class="form-check-label">Remember Me</label>
                        </div>

                        <button class="btn btn-primary w-100">Login</button>

                        <div class="text-center mt-3">
                            <a href="{{ route('register') }}">Create account</a> |
                            <a href="{{ route('password.request') }}">Forgot password</a>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection