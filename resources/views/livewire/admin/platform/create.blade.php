<div>


    <h1 class="app-page-title">Create Platform</h1>

    @if (session()->has('message'))
        <div class="alert alert-primary" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <hr class="mb-4">
    <form wire:submit.prevent="storePlatform">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-4">
                <h3 class="section-title">General</h3>
            </div>
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-body">
                        <x-custom.form-input :formElementType="'input'" :width="''" :margin="'mb-3'" :labelTitle="'Title'"
                            :model="'title'" :inputType="'text'" :placeholder="'Enter Title'" :isRequired="1" />
                        <x-custom.form-input :formElementType="'input'" :width="''" :margin="'mb-3'" :labelTitle="'Upload Icon'"
                            :model="'icon'" :inputType="'file'" :placeholder="''" :isRequired="1" />
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-4">
        <button type="submit" class="btn app-btn-primary">Save Changes</button>
    </form>


</div>
