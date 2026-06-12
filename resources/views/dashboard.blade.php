@extends('layouts.master')

@section('content')

<h1 class="display-6 mb-4">
    Dashboard
</h1>

<div class="row">

    <div class="col-md-3 mb-3">

        <div class="card">

            <div class="card-body text-center">

                <h5>Total Categories</h5>

                <h2 id="totalCategories">
                    ...
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-3">

        <div class="card">

            <div class="card-body text-center">

                <h5>Total Books</h5>

                <h2 id="totalBooks">
                    ...
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-3">

        <div class="card">

            <div class="card-body text-center">

                <h5>Total Members</h5>

                <h2 id="totalMembers">
                    ...
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-3">

        <div class="card">

            <div class="card-body text-center">

                <h5>Borrowed Books</h5>

                <h2 id="totalBorrowings">
                    ...
                </h2>

            </div>

        </div>

    </div>

</div>

<script>
    fetch('/dashboard/stats')

        .then(response => response.json())

        .then(data => {

            document.getElementById('totalCategories')
                .innerText = data.categories;

            document.getElementById('totalBooks')
                .innerText = data.books;

            document.getElementById('totalMembers')
                .innerText = data.members;

            document.getElementById('totalBorrowings')
                .innerText = data.borrowings;

        });
</script>

@endsection