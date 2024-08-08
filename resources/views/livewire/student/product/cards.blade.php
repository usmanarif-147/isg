<div>
    <h4 class="fw-600">Card Preview</h4>
    <div class="">
        <div class="d-flex justify-content-center align-items-center">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link nav-card px-5 rounded-pill fw-600 {{ $tab == 1 ? 'active' : '' }}"
                        type="button" wire:click="showFrontForm">
                        Front
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link nav-card px-5 rounded-pill fw-600 {{ $tab == 2 ? 'active' : '' }}"
                        type="button" wire:click="showBackForm">
                        Back
                    </button>
                </li>
            </ul>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade {{ $tab == 1 ? 'active show' : '' }}" id="pills-front" role="tabpanel"
                aria-labelledby="pills-front-tab">
                @include('livewire.student.product.front-side-form')
            </div>
            <div class="tab-pane fade {{ $tab == 2 ? 'active show' : '' }}" id="pills-back" role="tabpanel"
                aria-labelledby="pills-back-tab">
                @include('livewire.student.product.back-side-form')
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('swal:modal', event => {
            Swal.fire({
                title: event.detail[0].title,
                text: event.detail[0].text,
                icon: event.detail[0].icon,
                confirmButtonText: 'OK',
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false
            }).then((result) => {
                if (result.isConfirmed) {

                }
            });
        });
    </script>

</div>
