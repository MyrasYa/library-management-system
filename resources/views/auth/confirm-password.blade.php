@extends('layouts.guest')

@section('content')

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">

        <div class="col-md-5">

            <div class="card shadow border-0">

                <div class="card-body p-4">

                    <h4 class="fw-bold text-center mb-3">Confirm Password</h4>

                    <p class="text-center text-muted mb-3">
                        This is a secure area. Please confirm your password.
                    </p>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button class="btn btn-primary w-100">
                            Confirm
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection