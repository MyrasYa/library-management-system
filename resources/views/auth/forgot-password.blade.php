@extends('layouts.guest')

@section('content')

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">

        <div class="col-md-5">

            <div class="card shadow border-0">

                <div class="card-body p-4">

                    <h4 class="fw-bold text-center mb-3">Forgot Password</h4>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <button class="btn btn-primary w-100">
                            Send Reset Link
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection