@extends('layouts.master')

@section('content')

<h2 class="display-6 mb-3">Add Member</h2>

<a href="{{ route('members.index') }}"
    class="btn btn-secondary mb-3">
    Back
</a>

<form action="{{ route('members.store') }}"
    method="POST">

    @csrf

    <div class="mb-3">

        <label class="form-label">
            NIM
        </label>

        <input
            type="text"
            name="nim"
            class="form-control"
            value="{{ old('nim') }}">

        @error('nim')
        <div class="text-danger mt-1">
            {{ $message }}
        </div>
        @enderror

    </div>

    <div class="mb-3">

        <label class="form-label">
            Member Name
        </label>

        <input
            type="text"
            name="name"
            class="form-control"
            value="{{ old('name') }}">

        @error('name')
        <div class="text-danger mt-1">
            {{ $message }}
        </div>
        @enderror

    </div>

    <div class="mb-3">

        <label class="form-label">
           Email
        </label>

        <input
            type="text"
            name="email"
            class="form-control"
            value="{{ old('email') }}">

        @error('email')
        <div class="text-danger mt-1">
            {{ $message }}
        </div>
        @enderror

    </div>

    <div class="mb-3">

        <label class="form-label">
           Address
        </label>

        <input
            type="text"
            name="address"
            class="form-control"
            value="{{ old('address') }}">

        @error('email')
        <div class="text-danger mt-1">
            {{ $message }}
        </div>
        @enderror

    </div>

    <button type="submit"
        class="btn btn-primary">
        Save
    </button>

</form>

@endsection