@extends('layouts.master')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h1 class="display-6 mb-3">
        Book Management
    </h1>

    <a href="{{ route('books.create') }}"
        class="btn btn-primary">
        Add Book
    </a>

</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="table table-bordered table-striped">

    <thead>
        <tr>
            <th>No</th>
            <th>Code</th>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Year</th>
            <th width="180">Action</th>
        </tr>
    </thead>

    <tbody>

        @forelse($books as $book)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $book->book_code }}</td>

            <td>{{ $book->title }}</td>

            <td>{{ $book->author }}</td>

            <td>{{ $book->category->name }}</td>

            <td>{{ $book->publish_year }}</td>

            <td>
                <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm px-3">
                    Edit
                </a>

                <form action="{{ route('books.destroy', $book) }}"
                    method="POST"
                    class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="btn btn-danger btn-sm px-4"
                        onclick="return confirm('Delete this book?')">

                        Delete

                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>
            <td colspan="7" class="text-center">
                No books found.
            </td>
        </tr>

        @endforelse

    </tbody>

</table>

@endsection