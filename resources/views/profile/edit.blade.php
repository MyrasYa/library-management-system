@extends('layouts.master')

@section('content')

<div class="container-fluid">
    <div class="row g-4">

        <!-- Update Password -->
        <div class="col-md-6">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    @include('profile.partials.update-password-form')

                </div>

            </div>

        </div>

        <!-- Profile Info -->
        <div class="col-md-6">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    @include('profile.partials.update-profile-information-form')

                </div>

            </div>

        </div>

        <!-- Delete Account -->
        <div class="col-6">

            <div class="card border-danger shadow-sm">

                <div class="card-body">

                    @include('profile.partials.delete-user-form')

                </div>

            </div>

        </div>

    </div>

</div>

@endsection