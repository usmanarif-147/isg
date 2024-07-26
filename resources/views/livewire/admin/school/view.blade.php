<div>
    <h1 class="app-page-title">School Details</h1>

    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-4">
            <h3 class="section-title">
                General
            </h3>
            @if (session()->has('generalMessage'))
                <div class="alert alert-primary" role="alert">
                    {{ session('generalMessage') }}
                </div>
            @endif
        </div>
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4">
                <form wire:submit.prevent="updateGeneral">
                    <div class="app-card-body">
                        <x-custom.form-input :formElementType="'input'" :width="''" :margin="'mb-3'" :labelTitle="'Name'"
                            :model="'name'" :inputType="'text'" :placeholder="'Enter Name'" :isRequired="1" />

                        <div>
                            <div class="shadow-sm border-1 border p-2 rounded-3 my-2 d-flex justify-content-center align-items-center"
                                style="height:150px; width:150px">
                                <label for="file-upload">
                                    <img src="{{ $photoPreviewUrl ? $photoPreviewUrl : asset('student/images/upload-student-picture.svg') }}"
                                        class="img-fluid" style="cursor: pointer;" alt="Upload Image">
                                </label>
                                <input type="file" id="file-upload" wire:model.blur="photo" style="display: none;"
                                    accept="image/jpeg,image/png,image/jpg,image/webp">
                            </div>
                            <p class="fw-600 mb-1">
                                <span class="text-success">Click </span>to upload image
                            </p>
                            <span class="text-danger">
                                @error('photo')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="btn app-btn-primary" wire:loading.attr="disabled">Save
                        Changes</button>
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
            @if (session()->has('loginMessage'))
                <div class="alert alert-primary" role="alert">
                    {{ session('loginMessage') }}
                </div>
            @endif
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
</div>
