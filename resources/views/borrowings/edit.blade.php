@extends('layouts.master')

@section('content')

<h1 class="display-6 mb-4">
    Edit Borrowing
</h1>

<a href="{{ route('borrowings.index') }}"
   class="btn btn-secondary mb-3">
    Back
</a>

<form action="{{ route('borrowings.update', $borrowing) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label class="form-label">
            Book
        </label>

        <select name="book_id"
                class="form-select">

            @foreach($books as $book)

                <option value="{{ $book->id }}"
                    {{ old('book_id', $borrowing->book_id) == $book->id ? 'selected' : '' }}>

                    {{ $book->title }}

                </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Member
        </label>

        <select name="member_id"
                class="form-select">

            @foreach($members as $member)

                <option value="{{ $member->id }}"
                    {{ old('member_id', $borrowing->member_id) == $member->id ? 'selected' : '' }}>

                    {{ $member->name }}

                </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Borrow Date
        </label>

        <input
            type="date"
            name="borrow_date"
            class="form-control"
            value="{{ old('borrow_date', $borrowing->borrow_date) }}"
        >

    </div>

    <div class="mb-3">

        <label class="form-label">
            Return Date
        </label>

        <input
            type="date"
            name="return_date"
            class="form-control"
            value="{{ old('return_date', $borrowing->return_date) }}"
        >

    </div>

    <div class="mb-3">

        <label class="form-label">
            Status
        </label>

        <select name="status"
                class="form-select">

            <option value="borrowed"
                {{ old('status', $borrowing->status) == 'borrowed' ? 'selected' : '' }}>
                Borrowed
            </option>

            <option value="returned"
                {{ old('status', $borrowing->status) == 'returned' ? 'selected' : '' }}>
                Returned
            </option>

        </select>

    </div>

    <button type="submit"
            class="btn btn-primary">
        Update
    </button>

</form>

@endsection