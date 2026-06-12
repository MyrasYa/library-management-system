@extends('layouts.guest')

@section('content')

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">

        <div class="col-md-6">

            <div class="card shadow border-0">

                <div class="card-body p-4 text-center">

                    <h4 class="fw-bold mb-3">Verify Email</h4>

                    <p class="text-muted">
                        Please verify your email by clicking the link we sent to your email.
                    </p>

                    @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success">
                        A new verification link has been sent.
                    </div>
                    @endif

                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <button class="btn btn-primary">
                            Resend Email
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection