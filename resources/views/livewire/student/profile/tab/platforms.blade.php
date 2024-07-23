<div>
    <div class="py-4">
        <div wire:ignore.self class="modal fade" id="addPlatformModal" data-bs-backdrop="static" aria-hidden="true"
            aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $modalTitle }} {{ $platformTitle }}</h5>
                        <button type="button" class="btn-close" aria-label="Close" wire:click="closeModal"></button>
                    </div>
                    <form wire:submit.prevent="{{ $modalFormAction }}">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Enter Path
                                            <span class="text-danger">
                                                *
                                                @error('path')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                        <input type="text" class="form-control" wire:model.live="path"
                                            placeholder="Enter Path">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn {{ $modalBtnColor }}">{{ $modalBtnText }}</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <div class="row my-3">
            @foreach ($platforms as $platform)
                <div class="col-12 col-lg-4">
                    <div class="card-shadow p-3 my-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="d-flex align-items-center gap-2">
                                    <div
                                        class="rounded-circle attached-links-bg d-flex justify-content-center align-items-center">
                                        <div
                                            class="d-flex justify-content-center align-items-center attached-social-links">
                                            <img src="{{ asset(Storage::url($platform->platform_icon)) }}"
                                                class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="m-0 fw-600 fs-13">
                                            {{ $platform->platform_title }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex align-items-center">
                                    @if ($platform->platform_user_path)
                                        <div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                    wire:change="changePlatformStatus({{ $platform->platform_id }})"
                                                    {{ $platform->platform_user_status ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                        <div>
                                            <button class="btn btn-sm btn-warning"
                                                wire:click="editPlatform('{{ $platform->platform_id }}', '{{ $platform->platform_title }}')">
                                                Update
                                            </button>
                                        </div>
                                    @else
                                        <div>
                                            <button class="btn btn-sm btn-primary"
                                                wire:click="addPlatform('{{ $platform->platform_id }}', '{{ $platform->platform_title }}')">
                                                Add
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('show-modal', event => {
            $('#addPlatformModal').modal('show');
        });
        document.addEventListener('hide-modal', event => {
            $('#addPlatformModal').modal('hide');
        });
    </script>

</div>
