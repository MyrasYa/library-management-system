@extends('layouts.master')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-body">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">

            <div>

                <h1 class="h3 fw-bold mb-1">
                    Borrowing Management
                </h1>

                <p class="text-muted mb-0">
                    Manage borrowing transactions.
                </p>

            </div>

            <a href="{{ route('borrowings.create') }}"
                class="btn btn-primary mt-3 mt-md-0">
                Add Borrowing
            </a>

        </div>

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-light">

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
                                    class="btn btn-danger btn-sm">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7"
                            class="text-center text-muted py-4">

                            No borrowing data found.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection