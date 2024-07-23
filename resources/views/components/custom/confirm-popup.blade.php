<div wire:ignore.self class="modal fade" id="confirmPopup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="confirmPopupLabel" aria-hidden="true">
    <div>
        <form wire:submit.prevent="{{ $method }}">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h3 class="modal-title w-100" id="disableLabel">Are you sure</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="font-size: 20px">{{ $body }}</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn {{ $actionBtnColor }}" style="color:white">
                            {{ $actionBtnText }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
