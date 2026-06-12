@extends('layouts.master')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-body">

        <h1 class="h3 fw-bold mb-4">
            Add Member
        </h1>

        <form action="{{ route('members.store') }}"
            method="POST">

            @csrf

            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control" value="{{ old('nim') }}">

                @error('nim')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">

                @error('name')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">

                @error('email')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea name="address" rows="3" class="form-control">{{ old('address') }}</textarea>

                @error('address')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button class="btn btn-primary">
                Save
            </button>

            <a href="{{ route('members.index') }}"
                class="btn btn-secondary">
                Back
            </a>

        </form>

    </div>

</div>

@endsection