@extends('layouts.master')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h1 class="display-6 mb-3">Member Management</h1>

    <a href="{{ route('members.create') }}"
        class="btn btn-primary">
        Add Member
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
            <th>NIM</th>
            <th>Member Name</th>
            <th>Email</th>
            <th>Address</th>
            <th width="180">Action</th>
        </tr>
    </thead>

    <tbody>

        @forelse($members as $member)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td class="">{{ $member->nim }}</td>
            <td class="">{{ $member->name }}</td>
            <td class="">{{ $member->email }}</td>
            <td class="">{{ $member->address }}</td>

            <td>

                <a href="{{ route('members.edit', $member) }}"
                    class="btn btn-warning btn-sm px-3">
                    Edit
                </a>

                <form action="{{ route('members.destroy', $member) }}"
                    method="POST"
                    class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="btn btn-danger btn-sm px-4"
                        onclick="return confirm('Delete this member?')">
                        Delete
                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>
            <td colspan="7" class="text-center">
                No members found.
            </td>
        </tr>

        @endforelse

    </tbody>

</table>

@endsection