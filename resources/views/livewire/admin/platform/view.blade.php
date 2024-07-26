<div>


    <h1 class="app-page-title">Platform Details</h1>

    @if (session()->has('message'))
        <div class="alert alert-primary" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <hr class="mb-4">
    <form wire:submit.prevent="updatePlatform">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-4">
                <h3 class="section-title">General</h3>
            </div>
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-body">
                        <x-custom.form-input :formElementType="'input'" :width="''" :margin="'mb-3'" :labelTitle="'Title'"
                            :model="'title'" :inputType="'text'" :placeholder="'Enter Title'" :isRequired="1" />
                        <div>
                            <div class="shadow-sm border-1 border p-2 rounded-3 my-2 d-flex justify-content-center align-items-center"
                                style="height:150px; width:150px">
                                <label for="file-upload">
                                    <img src="{{ $photoPreviewUrl ? $photoPreviewUrl : asset('student/images/upload-student-picture.svg') }}"
                                        class="img-fluid" style="cursor: pointer;" alt="Upload Image">
                                </label>
                                <input type="file" id="file-upload" wire:model.blur="icon" style="display: none;"
                                    accept="image/jpeg,image/png,image/jpg,image/webp">
                            </div>
                            <p class="fw-600 mb-1">
                                <span class="text-success">Click </span>to upload image
                            </p>
                            <span class="text-danger">
                                @error('icon')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-4">
        <button type="submit" class="btn app-btn-primary">Save Changes</button>
    </form>
</div>
