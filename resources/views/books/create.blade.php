@extends('layouts.master')

@section('content')

<h1 class="display-6 mb-3">
    Add Book
</h1>

<a href="{{ route('books.index') }}"
   class="btn btn-secondary mb-3">
    Back
</a>

<form action="{{ route('books.store') }}"
      method="POST">

    @csrf

    <div class="mb-3">

        <label class="form-label">
            Book Code
        </label>

        <input
            type="text"
            name="book_code"
            class="form-control"
            value="{{ old('book_code') }}"
        >

        @error('book_code')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror

    </div>

    <div class="mb-3">

        <label class="form-label">
            Title
        </label>

        <input
            type="text"
            name="title"
            class="form-control"
            value="{{ old('title') }}"
        >

        @error('title')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror

    </div>

    <div class="mb-3">

        <label class="form-label">
            Author
        </label>

        <input
            type="text"
            name="author"
            class="form-control"
            value="{{ old('author') }}"
        >

        @error('author')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror

    </div>

    <div class="mb-3">

        <label class="form-label">
            Publisher
        </label>

        <input
            type="text"
            name="publisher"
            class="form-control"
            value="{{ old('publisher') }}"
        >

        @error('publisher')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror

    </div>

    <div class="mb-3">

        <label class="form-label">
            Publish Year
        </label>

        <input
            type="number"
            name="publish_year"
            class="form-control"
            value="{{ old('publish_year') }}"
        >

        @error('publish_year')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror

    </div>

    <div class="mb-3">

        <label class="form-label">
            Category
        </label>

        <select name="category_id"
                class="form-select">

            <option value="">
                Choose Category
            </option>

            @foreach($categories as $category)

                <option
                    value="{{ $category->id }}"
                    {{ old('category_id') == $category->id ? 'selected' : '' }}>

                    {{ $category->name }}

                </option>

            @endforeach

        </select>

        @error('category_id')
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