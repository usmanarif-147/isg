<div>
    <h1 class="app-page-title">Change Password</h1>

    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-4">
            <h3 class="section-title">
                Password
            </h3>
        </div>
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4">
                <form wire:submit.prevent="updatePassword">
                    <div class="app-card-body">
                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">
                                Old Password
                                <span class="text-danger">*</span>
                                <span class="text-danger">
                                    @error('old_password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <input type="text" class="form-control" wire:model.live="old_password"
                                placeholder="Enter Old Password">
                        </div>
                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">
                                New Password
                                <span class="text-danger">*</span>
                                <span class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <input type="text" class="form-control" wire:model.live="password"
                                placeholder="Enter New Password">
                        </div>
                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">
                                Confirm Password
                                <span class="text-danger">*</span>
                                <span class="text-danger">
                                    @error('password_confirmation')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <input type="text" class="form-control" wire:model.live="password_confirmation"
                                placeholder="Confirm Password">
                        </div>
                    </div>
                    <button type="submit" class="btn app-btn-primary">
                        Save Changes
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('swal:modal', event => {
            Swal.fire({
                title: event.detail[0].title,
                text: event.detail[0].text,
                icon: event.detail[0].icon,
                confirmButtonText: 'OK',
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false
            }).then((result) => {
                if (result.isConfirmed) {

                }
            });
        });
    </script>

</div>
