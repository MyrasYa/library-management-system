@extends('layouts.guest')

@section('content')

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">

        <div class="col-md-5">

            <div class="card shadow border-0">

                <div class="card-body p-4">

                    <h4 class="fw-bold text-center mb-3">Reset Password</h4>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $request->email) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <button class="btn btn-success w-100">
                            Reset Password
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection