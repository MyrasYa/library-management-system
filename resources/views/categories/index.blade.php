@extends('layouts.master')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-body">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">

            <div>

                <h1 class="h3 fw-bold mb-1">
                    Category Management
                </h1>

                <p class="text-muted mb-0">
                    Manage all book categories.
                </p>

            </div>

            <a href="{{ route('categories.create') }}"
                class="btn btn-primary mt-3 mt-md-0">
                Add Category
            </a>

        </div>

        @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

        @endif

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-light">

                    <tr>
                        <th width="80">No</th>
                        <th>Category Name</th>
                        <th width="180">Action</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($categories as $category)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>
                            {{ $category->name }}
                        </td>

                        <td>

                            <a href="{{ route('categories.edit', $category) }}"
                                class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('categories.destroy', $category) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this category?')">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="3"
                            class="text-center text-muted py-4">

                            No categories found.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection