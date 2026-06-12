@extends('layouts.master')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-body">

        <h1 class="h3 fw-bold mb-4">
            Edit Book
        </h1>

        <form action="{{ route('books.update', $book) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Book Code
                    </label>

                    <input
                        type="text"
                        name="book_code"
                        class="form-control"
                        value="{{ old('book_code', $book->book_code) }}">

                    @error('book_code')
                    <div class="text-danger mt-1">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Title
                    </label>

                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        value="{{ old('title', $book->title) }}">

                    @error('title')
                    <div class="text-danger mt-1">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Author
                    </label>

                    <input
                        type="text"
                        name="author"
                        class="form-control"
                        value="{{ old('author', $book->author) }}">

                    @error('author')
                    <div class="text-danger mt-1">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Publisher
                    </label>

                    <input
                        type="text"
                        name="publisher"
                        class="form-control"
                        value="{{ old('publisher', $book->publisher) }}">

                    @error('publisher')
                    <div class="text-danger mt-1">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Publish Year
                    </label>

                    <input
                        type="text"
                        name="publish_year"
                        class="form-control"
                        value="{{ old('publish_year', $book->publish_year) }}">

                    @error('publish_year')
                    <div class="text-danger mt-1">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class="col-md-6 mb-3">

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
                            {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>

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

            </div>


            <div class="mt-4">

                <button class="btn btn-primary">
                    Save Book
                </button>

                <a href="{{ route('books.index') }}"
                    class="btn btn-secondary">
                    Back
                </a>

            </div>

        </form>

    </div>

</div>

@endsection