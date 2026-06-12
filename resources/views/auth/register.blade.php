@extends('layouts.guest')

@section('content')

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">

        <div class="col-md-5">

            <div class="card shadow border-0">

                <div class="card-body p-4">

                    <h3 class="fw-bold text-center mb-2 display-6">Register</h3>
                    <p class="text-center text-muted mb-4">Library Management System</p>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <button class="btn btn-success w-100">Register</button>

                        <div class="text-center mt-3">
                            <a href="{{ route('login') }}">Already have account?</a>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection