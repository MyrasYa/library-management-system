<section>

    <h5 class="fw-bold text-danger mb-1 fs-3 h3">Delete Account</h5>

    <p class="text-muted small">
        Once deleted, all data will be permanently removed.
    </p>

    <!-- Button trigger modal -->
    <button class="btn btn-danger mt-3"
        data-bs-toggle="modal"
        data-bs-target="#deleteAccountModal">
        Delete Account
    </button>

    <!-- Modal -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="modal-body">

                        <p>Are you sure you want to delete your account?</p>

                        <input type="password"
                            name="password"
                            class="form-control"
                            placeholder="Enter password">

                    </div>

                    <div class="modal-footer">

                        <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">
                            Cancel
                        </button>

                        <button class="btn btn-danger">
                            Delete
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>