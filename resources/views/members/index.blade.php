@extends('layouts.master')

@section('content')

<div class="card shadow-sm border-0">

<div class="card-body">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">

        <div>

            <h1 class="h3 fw-bold mb-1">
                Member Management
            </h1>

            <p class="text-muted mb-0">
                Manage all library members.
            </p>

        </div>

        <a href="{{ route('members.create') }}"
           class="btn btn-primary mt-3 mt-md-0">
            Add Member
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
                    <th>No</th>
                    <th>NIM</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th width="180">Action</th>
                </tr>

            </thead>

            <tbody>

                @forelse($members as $member)

                    <tr>

                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $member->nim }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->address }}</td>

                        <td>

                            <a href="{{ route('members.edit', $member) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('members.destroy', $member) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this member?')">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6"
                            class="text-center text-muted py-4">

                            No members found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</div>

@endsection
