@extends('layouts.master')

@section('content')

<h1 class="display-6 mb-4">
    Add Borrowing
</h1>

<a href="{{ route('borrowings.index') }}"
   class="btn btn-secondary mb-3">
    Back
</a>

<form action="{{ route('borrowings.store') }}"
      method="POST">

    @csrf

    <div class="mb-3">

        <label class="form-label">
            Book
        </label>

        <select name="book_id"
                class="form-select">

            <option value="">
                Choose Book
            </option>

            @foreach($books as $book)

                <option value="{{ $book->id }}"
                    {{ old('book_id') == $book->id ? 'selected' : '' }}>

                    {{ $book->title }}

                </option>

            @endforeach

        </select>

        @error('book_id')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror

    </div>

    <div class="mb-3">

        <label class="form-label">
            Member
        </label>

        <select name="member_id"
                class="form-select">

            <option value="">
                Choose Member
            </option>

            @foreach($members as $member)

                <option value="{{ $member->id }}"
                    {{ old('member_id') == $member->id ? 'selected' : '' }}>

                    {{ $member->name }}

                </option>

            @endforeach

        </select>

        @error('member_id')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror

    </div>

    <div class="mb-3">

        <label class="form-label">
            Borrow Date
        </label>

        <input
            type="date"
            name="borrow_date"
            class="form-control"
            value="{{ old('borrow_date') }}"
        >

        @error('borrow_date')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror

    </div>

    <div class="mb-3">

        <label class="form-label">
            Return Date
        </label>

        <input
            type="date"
            name="return_date"
            class="form-control"
            value="{{ old('return_date') }}"
        >

        @error('return_date')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror

    </div>

    <div class="mb-3">

        <label class="form-label">
            Status
        </label>

        <select name="status"
                class="form-select">

            <option value="borrowed">
                Borrowed
            </option>

            <option value="returned">
                Returned
            </option>

        </select>

    </div>

    <button type="submit"
            class="btn btn-primary">

        Save

    </button>

</form>

@endsection