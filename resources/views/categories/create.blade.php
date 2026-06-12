@extends('layouts.master')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-body">

        <h1 class="h3 fw-bold mb-4">
            Add Category
        </h1>

        <form action="{{ route('categories.store') }}"
            method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Category Name
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

            <div class="mt-4">

                <button type="submit"
                    class="btn btn-primary">
                    Save
                </button>

                <a href="{{ route('categories.index') }}"
                    class="btn btn-secondary">
                    Back
                </a>

            </div>

        </form>

    </div>

</div>

@endsection