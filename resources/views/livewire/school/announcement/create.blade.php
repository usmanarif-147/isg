<div>
    <h1 class="app-page-title">Create Announcement</h1>

    <hr class="mb-4">
    <form wire:submit.prevent="storeAnnouncement">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-4">
                <h3 class="section-title">Announcement</h3>
            </div>
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-body">
                        <x-custom.form-input :formElementType="'input'" :width="''" :margin="'mb-3'" :labelTitle="'Title'"
                            :model="'title'" :inputType="'text'" :placeholder="'Enter Title'" :isRequired="1" />
                        <x-custom.form-input :formElementType="'input'" :width="''" :margin="'mb-3'" :labelTitle="'Message'"
                            :model="'message'" :inputType="'text'" :placeholder="'Enter Message'" :isRequired="1" />
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn app-btn-primary">Save Changes</button>
    </form>

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
                    Livewire.dispatch('ok-button-clicked');
                }
            });
        });
    </script>

</div>
