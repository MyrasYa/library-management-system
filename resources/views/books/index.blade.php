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

<div class="mb-3">
    <div class="row mb-3">

        <div class="col-md-8">
            <input
                type="text"
                id="searchBook"
                class="form-control"
                placeholder="Search Book...">
        </div>

        <div class="col-md-4">
            <select id="filterCategory" class="form-select">
                <option value="">All Categories</option>

                @foreach($categories as $category)

                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>

                @endforeach

            </select>
        </div>

    </div>

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

        <tbody id="bookTableBody">

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

    <script>
        function updateTable(data) {
            let rows = '';

            if (data.length === 0) {
                rows = `
                <tr>
                    <td colspan="7" class="text-center">
                        No books found.
                    </td>
                </tr>
            `;
            } else {
                data.forEach((book, index) => {
                    rows += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${book.book_code}</td>
                        <td>${book.title}</td>
                        <td>${book.author}</td>
                        <td>${book.category.name}</td>
                        <td>${book.publish_year}</td>
                        <td>
                            <a href="/books/${book.id}/edit" class="btn btn-warning btn-sm px-3">Edit</a>
                            <form action="/books/${book.id}" method="POST" class="d-inline">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm px-4" onclick="return confirm('Delete this book?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                `;
                });
            }
            document.getElementById('bookTableBody').innerHTML = rows;
        }

        function loadBooks() {
            let keyword = document.getElementById('searchBook').value;
            let categoryId = document.getElementById('filterCategory').value;

            fetch(`/books/filter-search?keyword=${keyword}&category_id=${categoryId}`)
                .then(response => response.json())
                .then(data => updateTable(data));
        }

        document
            .getElementById('searchBook')
            .addEventListener('keyup', loadBooks);

        document
            .getElementById('filterCategory')
            .addEventListener('change', loadBooks);
    </script>
    @endsection