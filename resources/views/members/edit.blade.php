@extends('layouts.master')

@section('content')

<h2 class="display-6 mb-3">Edit Member</h2>

<a href="{{ route('members.index') }}"
    class="btn btn-secondary mb-3">
    Back
</a>

<form action="{{ route('members.update', $member) }}"
    method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label class="form-label">
            NIM
        </label>

        <input
            type="text"
            name="nim"
            class="form-control"
            value="{{ old('nim', $member->nim) }}">

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
            value="{{ old('name', $member->name) }}">

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
            value="{{ old('email', $member->email) }}">

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
            value="{{ old('address', $member->address) }}">

        @error('email')
        <div class="text-danger mt-1">
            {{ $message }}
        </div>
        @enderror

    </div>

    <button type="submit"
        class="btn btn-primary">
        Update
    </button>

</form>

@endsection