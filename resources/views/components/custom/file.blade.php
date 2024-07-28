<div>
    <div class="shadow-sm border-1 border p-2 rounded-3 my-2 d-flex justify-content-center align-items-center"
        style="height:150px; width:150px">
        <label for="file-upload">
            <img src="{{ $photoPreviewUrl ? $photoPreviewUrl : asset('student/images/upload-student-picture.svg') }}"
                class="img-fluid" style="cursor: pointer;" alt="Upload Image">
        </label>
        <input type="file" id="file-upload" wire:model.blur="{{ $model }}" style="display: none;"
            accept="image/jpeg,image/png,image/jpg,image/webp">
    </div>
    <p class="fw-600 mb-1">
        <span class="text-success">Click </span>to upload image
    </p>
    <span class="text-danger">
        @error($model)
            {{ $message }}
        @enderror
    </span>
</div>
