@extends('layouts.master')

@section('content')
<div class="card card-body shadow-sm border-0 mx-auto">

    <div class="mb-4">

        <h1 class="h3 fw-bold mb-1">
            Dashboard
        </h1>

        <p class="text-muted mb-0">
            Welcome to Library Management System.
        </p>


    </div>

    <div class="row g-4">

        <div class="col-md-6 col-xl-3">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <h6 class="text-muted mb-2">
                        Total Categories
                    </h6>

                    <h2 class="fw-bold"
                        id="totalCategories">

                        ...

                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-6 col-xl-3">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <h6 class="text-muted mb-2">
                        Total Books
                    </h6>

                    <h2 class="fw-bold"
                        id="totalBooks">

                        ...

                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-6 col-xl-3">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <h6 class="text-muted mb-2">
                        Total Members
                    </h6>

                    <h2 class="fw-bold"
                        id="totalMembers">

                        ...

                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-6 col-xl-3">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <h6 class="text-muted mb-2">
                        Active Borrowings
                    </h6>

                    <h2 class="fw-bold"
                        id="totalBorrowings">

                        ...

                    </h2>

                </div>

            </div>

        </div>

    </div>

    <div class="row mt-4">

        <div class="col-lg-8 mb-4">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <h5 class="mb-2 h4 fw-bold">
                        System Overview
                    </h5>

                    <p class="text-muted mb-0">

                        This library management system helps manage
                        categories, books, members, and borrowing
                        transactions efficiently.

                    </p>

                </div>

            </div>

        </div>

        <div class="col-lg-4 mb-4">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <h5 class="mb-2 h4 fw-bold">
                        Logged In User
                    </h5>

                    <p class="mb-2 fst-italic" >

                        <strong>Name:</strong>

                        {{ Auth::user()->name }}

                    </p>

                    <p class="mb-0 fst-italic">

                        <strong>Email:</strong>

                        {{ Auth::user()->email }}

                    </p>

                </div>

            </div>

        </div>

    </div>
</div>

<script>
    fetch('/dashboard/stats')

        .then(response => response.json())

        .then(data => {

            document.getElementById('totalCategories').innerText = data.categories;
            document.getElementById('totalBooks').innerText = data.books;
            document.getElementById('totalMembers').innerText = data.members;
            document.getElementById('totalBorrowings').innerText = data.borrowings;

        });
</script>

@endsection