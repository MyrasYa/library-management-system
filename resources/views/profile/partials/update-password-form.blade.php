<section>

    <h5 class="fw-bold mb-3 fs-3 h3">Update Password</h5>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="mb-3">
            <label class="form-label">Current Password</label>
            <input type="password"
                name="current_password"
                class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">New Password</label>
            <input type="password"
                name="password"
                class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password"
                name="password_confirmation"
                class="form-control">
        </div>

        <button class="btn btn-primary mt-1">
            Save Password
        </button>

    </form>

</section>