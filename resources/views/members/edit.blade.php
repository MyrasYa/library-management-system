@extends('layouts.master')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-body">

        <h1 class="h3 fw-bold mb-4">
            Edit Member
        </h1>

        <form action="{{ route('members.update', $member) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control" value="{{ old('nim', $member->nim) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $member->name) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $member->email) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea name="address" rows="3" class="form-control">{{ old('address', $member->address) }}</textarea>
            </div>

            <button class="btn btn-primary">
                Update
            </button>

            <a href="{{ route('members.index') }}"
                class="btn btn-secondary">
                Back
            </a>

        </form>

    </div>

</div>

@endsection