<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Add Category</h2>

    <a href="{{ route('categories.index') }}"
       class="btn btn-secondary mb-3">
        Back
    </a>

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
                value="{{ old('name') }}"
            >

            @error('name')
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

</div>

</body>
</html>