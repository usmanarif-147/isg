<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content radius-20 p-3">
        <div class="modal-body">
            <div class="d-flex justify-content-center align-items-center">
                <div class="p-3 bg-light-secondary rounded-circle">
                    <img src="{{ $icon }}" height="50" width="50" alt="">
                </div>
            </div>
            <h4 class="fw-600 pb-2">{{ $title }}</h4>
            <form wire:submit.prevent="saveLink">
                <div class="row">
                    <div class="col-lg-10 col-9">
                        <input type="text" class="form-control" placeholder="Enter lable here"
                            wire:model.live="label">
                        @error('label')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="col-lg-10 col-9">
                        <input type="text" class="form-control" placeholder="Enter path here" wire:model.live="path">
                        @error('path')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="col-lg-2 col-3 ps-0">
                        <button type="submit" class="btn btn-modal-add text-white w-100">
                            Add
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
