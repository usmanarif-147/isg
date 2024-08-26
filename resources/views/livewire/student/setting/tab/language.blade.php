<div>
    <button class="btn p-0" wire:click="switchLanguage(0)">
        <div class="d-flex align-items-center gap-2">
            <div>
                <p class="m-0 fw-500 {{ $currentLanguage == 0 ? 'text-primary' : '' }}">English</p>
            </div>
            <div>
                <img src="{{ asset('assets/images/language-icon.svg') }}" class="img-fluid" alt="">
            </div>
        </div>
    </button>
    <div class="my-lg-2 my-3">
        <button class="btn p-0" wire:click="switchLanguage(1)">
            <p class="m-0 fw-500 {{ $currentLanguage == 1 ? 'text-primary' : '' }}">Spanish</p>
        </button>
    </div>
</div>
