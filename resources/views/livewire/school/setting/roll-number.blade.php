<div class="row">
    <div class="col-12">
        <h1 class="app-page-title">Roll Number Prefix Details</h1>

        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-4">
                <h3 class="section-title">
                    General
                </h3>
            </div>
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <form wire:submit.prevent="updatePrefix">
                        <div class="app-card-body">
                            <x-custom.form-input :formElementType="'input'" :width="''" :margin="'mb-3'" :labelTitle="'Prefix'"
                                :model="'prefix'" :inputType="'text'" :placeholder="'Enter Roll Number Prefix'" :isRequired="1" />
                        </div>
                        <button type="submit" class="btn app-btn-primary">Save Changes</button>
                    </form>
                </div>
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
