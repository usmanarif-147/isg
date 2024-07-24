<div class="row">
    <div class="col-8">
        <h1 class="app-page-title">Template Details</h1>

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
                            <x-custom.form-input :formElementType="'input'" :width="''" :margin="'mb-3'"
                                :labelTitle="'Upload Logo'" :model="'logo'" :inputType="'file'" :placeholder="''"
                                :isRequired="1" />
                        </div>
                        <button type="submit" class="btn app-btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
        <hr class="my-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-4">
                <h3 class="section-title">Front Side</h3>
                @if (session()->has('frontSideMessage'))
                    <div class="alert alert-primary" role="alert">
                        {{ session('frontSideMessage') }}
                    </div>
                @endif
            </div>
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <form wire:submit.prevent="updateFrontSideFields">
                        <div class="app-card-body">
                            @foreach ($front_side_fields as $key => $field)
                                <div class="form-check mb-3">
                                    <input class="form-check-input" wire:model="selected_front_side_fields"
                                        type="checkbox" value="{{ $key }}"
                                        {{ in_array($key, $selected_front_side_fields) ? 'checked' : '' }}
                                        style="border: 1px solid black; font-size: 16px">
                                    <label class="form-check-label">
                                        {{ $field['label'] }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn app-btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
        <hr class="my-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-4">
                <h3 class="section-title">Back Side</h3>
                @if (session()->has('backSideMessage'))
                    <div class="alert alert-primary" role="alert">
                        {{ session('backSideMessage') }}
                    </div>
                @endif
            </div>
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <form wire:submit.prevent="updateBackSideFields">
                        <div class="app-card-body">
                            @foreach ($back_side_fields as $key => $field)
                                <div class="form-check mb-3">
                                    <input class="form-check-input" wire:model="selected_back_side_fields"
                                        type="checkbox" value="{{ $key }}"
                                        {{ in_array($key, $selected_back_side_fields) ? 'checked' : '' }}
                                        style="border: 1px solid black; font-size: 16px">
                                    <label class="form-check-label">
                                        {{ $field['label'] }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn app-btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
