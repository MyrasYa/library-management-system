<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Category Management</h2>

            <a href="{{ route('categories.create') }}" class="btn btn-secondary">
                Add Category
            </a>
        </div>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse($categories as $category)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>

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
                    <td colspan="3" class="text-center">
                        No categories found.
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</body>

</html>