<form wire:submit.prevent="saveFrontForm">
    <div class="row gy-3">
        @foreach ($frontFormFields as $field)
            @if ($field['input_type'] == 'text')
                <div class="col-12 col-lg-6">
                    <input type="text" placeholder="{{ $field['placeholder'] }}" class="form-control"
                        wire:model.live="frontFormData.{{ $field['model'] }}">
                    @error('frontFormData.' . $field['model'])
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            @endif
            @if ($field['input_type'] == 'email')
                <div class="col-12 col-lg-6">
                    <input type="email" placeholder="{{ $field['placeholder'] }}" class="form-control"
                        wire:model.live="frontFormData.{{ $field['model'] }}">
                    @error('frontFormData.' . $field['model'])
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            @endif
            @if ($field['input_type'] == 'file')
                <div class="col-12 col-lg-12">
                    {{-- <div
                        class="shadow-sm border-1 border p-2 rounded-3 upload-box my-2 d-flex justify-content-center align-items-center">
                        <label for="file-upload">
                            <img src="{{ asset('student/images/upload-student-picture.svg') }}" class="img-fluid"
                                style="cursor: pointer;" alt="Upload Image">
                        </label>
                        <input type="file" id="file-upload" style="display: none;"
                            wire:model.live="frontFormData.{{ $field['model'] }}">
                    </div>
                    <p class="fw-600 mb-1">
                        <span class="text-success">Click </span>to upload image
                    </p> --}}
                    <div class="col-12 col-lg-12">
                        <input type="file" wire:model.live="frontFormData.{{ $field['model'] }}">
                    </div>
                    @error('frontFormData.' . $field['model'])
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            @endif
            @if ($field['input_type'] == 'date')
                <div class="col-12 col-lg-6">
                    <input type="date" placeholder="{{ $field['placeholder'] }}" class="form-control"
                        wire:model.live="frontFormData.{{ $field['model'] }}">
                    @error('frontFormData.' . $field['model'])
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            @endif
            @if ($field['input_type'] == 'select')
                <div class="col-12 col-lg-6">
                    <select class="form-select" wire:model.live="frontFormData.{{ $field['model'] }}">
                        <option value="-1">Select {{ $field['label'] }}</option>
                        @foreach ($field['options'] as $key => $option)
                            <option value="{{ $key }}">{{ $option }}</option>
                        @endforeach
                    </select>
                    @error('frontFormData.' . $field['model'])
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            @endif
        @endforeach
    </div>
    <button type="submit" class="btn btn-custom-bg text-white px-5 my-2" {{ $cardStatus == 2 ? 'disabled' : '' }}>
        Save Front Side
    </button>
</form>
