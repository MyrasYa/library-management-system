@extends('layouts.master')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h1 class="display-6 mb-0">
        Borrowing Management
    </h1>

    <a href="{{ route('borrowings.create') }}"
       class="btn btn-primary">
        Add Borrowing
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
            <th>Book</th>
            <th>Member</th>
            <th>Borrow Date</th>
            <th>Return Date</th>
            <th>Status</th>
            <th width="180">Action</th>
        </tr>
    </thead>

    <tbody>

        @forelse($borrowings as $borrowing)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $borrowing->book->title }}</td>

                <td>{{ $borrowing->member->name }}</td>

                <td>{{ $borrowing->borrow_date }}</td>

                <td>{{ $borrowing->return_date }}</td>

                <td>

                    @if($borrowing->status == 'borrowed')

                        <span class="badge bg-warning">
                            Borrowed
                        </span>

                    @else

                        <span class="badge bg-success">
                            Returned
                        </span>

                    @endif

                </td>

                <td>

                    <a href="{{ route('borrowings.edit', $borrowing) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('borrowings.destroy', $borrowing) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this borrowing?')">

                            Delete

                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="7" class="text-center">
                    No borrowings found.
                </td>
            </tr>

        @endforelse

    </tbody>

</table>

@endsection