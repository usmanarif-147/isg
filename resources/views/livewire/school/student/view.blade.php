<div>
    <h1 class="app-page-title">Student Details</h1>

    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-4">
            <h3 class="section-title">
                General
            </h3>
        </div>
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4">
                <form wire:submit.prevent="updateGeneral">
                    <div class="app-card-body">
                        <x-custom.form-input :formElementType="'input'" :width="''" :margin="'mb-3'" :labelTitle="'First Name'"
                            :model="'first_name'" :inputType="'text'" :placeholder="'Enter First Name'" :isRequired="1" />
                        <x-custom.form-input :formElementType="'input'" :width="''" :margin="'mb-3'" :labelTitle="'Last Name'"
                            :model="'last_name'" :inputType="'text'" :placeholder="'Enter Last Name'" :isRequired="1" />
                        <x-custom.file :photoPreviewUrl="$photoPreviewUrl" :model="'photo'" />
                    </div>
                    <button type="submit" class="btn app-btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
    <hr class="my-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-4">
            <h3 class="section-title">
                Login
            </h3>
        </div>
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4">
                <form wire:submit.prevent="updateLogin">
                    <div class="app-card-body">
                        <x-custom.form-input :formElementType="'input'" :width="''" :margin="'mb-3'" :labelTitle="'Email'"
                            :model="'email'" :inputType="'email'" :placeholder="'Enter Email'" :isRequired="1" />
                        <x-custom.form-input :formElementType="'input'" :width="''" :margin="'mb-3'" :labelTitle="'Password'"
                            :model="'password'" :inputType="'password'" :placeholder="'Enter Password'" :isRequired="1" />
                    </div>
                    <button type="submit" class="btn app-btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
    <hr class="my-4">

    <div class="row g-4 settings-section">
        <div class="col-12 col-md-4">
            <h3 class="section-title">Platforms</h3>
        </div>
        @if ($platforms->isNotEmpty())
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4">
                <form wire:submit.prevent="updatePlatform">
                    <div class="app-card-body">
                        @foreach ($platforms as $key => $platform)
                            <div class="form-check mb-3">
                                <input class="form-check-input" wire:model="selected_platforms" type="checkbox"
                                    value="{{ $key }}"
                                    {{ in_array($key, $selected_platforms) ? 'checked' : '' }}
                                    style="border: 1px solid black; font-size: 16px">
                                <label class="form-check-label">
                                    {{ $platform }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn app-btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
    @endif

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
