<section>

    <h5 class="fw-bold mb-3 fs-3 h3">Profile Information</h5>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text"
                name="name"
                class="form-control"
                value="{{ old('name', $user->name) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email"
                name="email"
                class="form-control"
                value="{{ old('email', $user->email) }}">
        </div>

        <button class="btn btn-primary mt-1">
            Save
        </button>

    </form>

</section>