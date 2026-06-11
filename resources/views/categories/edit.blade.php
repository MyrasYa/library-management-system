@extends('layouts.master')

@section('content')

<h1 class="display-6 mb-3">Edit Category</h1>

<a href="{{ route('categories.index') }}"
   class="btn btn-secondary mb-3">
    Back
</a>

<form action="{{ route('categories.update', $category) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label class="form-label">
            Category Name
        </label>

        <input
            type="text"
            name="name"
            class="form-control"
            value="{{ old('name', $category->name) }}"
        >

        @error('name')
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