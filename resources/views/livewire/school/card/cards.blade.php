<div>
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">{{ $heading }} ({{ $total }})</h1>
        </div>
        <div class="col-auto">
            <div class="page-utilities">
                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                    <div class="col-auto">
                        <form class="table-search-form row gx-1 align-items-center">
                            <div class="col-auto">
                                <input type="text" id="search-orders" wire:model.live="search"
                                    class="form-control search-orders" placeholder="Search">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($studentCards->count())
        <div class="tab-content" id="orders-table-tab-content">
            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table app-table-hover mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="cell">Name</th>
                                        <th class="cell">Email</th>
                                        <th class="cell">Created At</th>
                                        <th class="cell">Status</th>
                                        <th class="cell"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($studentCards as $card)
                                        <tr>
                                            <td class="cell">
                                                <span class="truncate">
                                                    {{ $card->student->first_name . ' ' . $card->student->last_name }}
                                                </span>
                                            </td>
                                            <td class="cell">
                                                {{ $card->student->email }}
                                            </td>
                                            <td class="cell">
                                                {{ defaultDateFormat($card->created_at) }}
                                            </td>
                                            <td class="cell">
                                                @if ($card->status == 1)
                                                    <span class="badge bg-warning">
                                                        Pending
                                                    </span>
                                                @elseif($card->status == 2)
                                                    <span class="badge bg-success">
                                                        Active
                                                    </span>
                                                @elseif($card->status == 3)
                                                    <span class="badge bg-danger">
                                                        Inactive
                                                    </span>
                                                @elseif($card->status == 4)
                                                    <span class="badge bg-warning">
                                                        Updation in Progress
                                                    </span>
                                                @else
                                                    <span class="badge bg-success">
                                                        Updated
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="cell">
                                                @if ($card->status == 1)
                                                    <button class="btn btn-sm btn-danger text-white"
                                                        wire:click="confirmDeactivateCard({{ $card->student->id }}, {{ $card->id }})">
                                                        Deactivate
                                                    </button>
                                                    <button class="btn btn-sm btn-success text-white"
                                                        wire:click="confirmActivateCard({{ $card->student->id }}, {{ $card->id }})">
                                                        Activate
                                                    </button>
                                                @elseif ($card->status == 2)
                                                    <button class="btn btn-sm btn-danger text-white"
                                                        wire:click="confirmDeactivateCard({{ $card->student->id }}, {{ $card->id }})">
                                                        Deactivate
                                                    </button>
                                                @elseif($card->status == 3)
                                                    <button class="btn btn-sm btn-success text-white"
                                                        wire:click="confirmActivateCard({{ $card->student->id }}, {{ $card->id }})">
                                                        Activate
                                                    </button>
                                                @elseif($card->status == 4)
                                                    <span class="badge bg-warning">No Action</span>
                                                    {{-- @else
                                                    <button class="btn btn-sm btn-success text-white">
                                                        Accept
                                                    </button>
                                                    <button class="btn btn-sm btn-danger text-white">
                                                        Reject
                                                    </button>
                                                    <button class="btn btn-sm btn-warning text-white">
                                                        View Updation
                                                    </button> --}}
                                                @endif
                                                @if ($card->status != 5)
                                                    <button class="btn btn-sm btn-success text-white"
                                                        wire:click="viewCard({{ $card->student->id }}, {{ $card->id }})">
                                                        View
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{ $studentCards->links() }}
            </div>
        </div>
    @else
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="card text-center">
                <div class="card-header">
                    Cards Not Found
                </div>
            </div>
        </div>
    @endif

    <x-custom.confirm-popup :method="$method" :actionBtnText="$btnText" :actionBtnColor="$btnColor" :body="$body" />

    <div wire:ignore.self class="modal fade" id="reasonPopup" tabindex="-1" aria-labelledby="reasonPopupLabel"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <form wire:submit.prevent="deactivate">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="reasonPopupLabel">Reason For Deactivation Card</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">
                                Enter Reason
                                <span class="text-danger">*</span>
                                <span class="text-danger">
                                    @error('reason')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <textarea class="form-control" wire:model.live="reason" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- view Card Model --}}
    <div wire:ignore.self class="modal fade" id="viewPopup" tabindex="-1" aria-labelledby="viewPopupLabel"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="viewPopupLabel">View Card</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (count($frontSide) || count($backSide))
                        <div class="row">
                            <div class="col-6">
                                <div class="border border-1 shadow position-relative rounded-3 pb-5 student-card mt-5">
                                    <div class="container p-0">
                                        <div class="row align-items-center m-1">
                                            <div class="col-5 p-0">
                                                <div
                                                    class="bg-charcol d-flex justify-content-center align-items-center">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <div>
                                                            <img src="{{ asset(Storage::url($schoolLogo)) }}"
                                                                class="img-fluid" alt="" height="80"
                                                                width="80">
                                                        </div>
                                                        <div>
                                                            <p class="m-0">{{ $schoolName }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-7 p-0">
                                                <div
                                                    class="bg-navy-blue d-flex justify-content-center align-items-center">
                                                    <h3 class="m-0">{{ trans('student.profile_tab_card.front') }}
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-3 mx-5 my-2">
                                        <div>
                                            <div
                                                class="profile-image-card border-3 shadow border-white border rounded-circle">
                                                <img src="{{ $frontSidePhoto }}" class="rounded-circle"
                                                    alt="" height="150" width="150">
                                            </div>
                                        </div>
                                        <div>
                                            @foreach ($frontSide as $key => $value)
                                                @if ($key != 'photo')
                                                    @if ($key == 'gender')
                                                        <p class="fw-600 m-0">
                                                            {{ strtoupper(str_replace('_', ' ', $key)) }}</p>
                                                        <h5 class="navy-blue fw-bold">
                                                            {{ $value == 1 ? 'Female' : 'Male' }}</h5>
                                                    @else
                                                        <p class="fw-600 m-0">
                                                            {{ strtoupper(str_replace('_', ' ', $key)) }}</p>
                                                        <h5 class="navy-blue fw-bold">{{ $value }}</h5>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    {{-- <div class="position-absolute card-bottom">
                                        <img src="{{ asset('student/images/card-bottom.svg') }}" class="img-fluid"
                                            alt="">
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="border border-1 shadow position-relative rounded-3 pb-5 student-card mt-5">
                                    <div class="container p-0">
                                        <div class="row align-items-center m-1">
                                            <div class="col-5 p-0">
                                                <div
                                                    class="bg-charcol d-flex justify-content-center align-items-center">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <div>
                                                            <img src="{{ asset(Storage::url($schoolLogo)) }}"
                                                                class="img-fluid" alt="" height="80"
                                                                width="80">
                                                        </div>
                                                        <div>
                                                            <p class="m-0">{{ $schoolName }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-7 p-0">
                                                <div
                                                    class="bg-navy-blue d-flex justify-content-center align-items-center">
                                                    <h3 class="m-0">{{ trans('student.profile_tab_card.back') }}
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-3 mx-5 my-2">
                                        <div>
                                            <div
                                                class="profile-image-card border-3 shadow border-white border rounded-circle">
                                                <img src="{{ $backSidePhoto }}" class="rounded-circle"
                                                    alt="" height="150" width="150">
                                            </div>
                                        </div>
                                        <div>
                                            @foreach ($backSide as $key => $value)
                                                @if ($key != 'photo')
                                                    @if ($key == 'gender')
                                                        <p class="fw-600 m-0">
                                                            {{ strtoupper(str_replace('_', ' ', $key)) }}</p>
                                                        <h5 class="navy-blue fw-bold">
                                                            {{ $value == 1 ? 'Female' : 'Male' }}</h5>
                                                    @else
                                                        <p class="fw-600 m-0">
                                                            {{ strtoupper(str_replace('_', ' ', $key)) }}</p>
                                                        <h5 class="navy-blue fw-bold">{{ $value }}</h5>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    {{-- <div class="position-absolute card-bottom">
                                        <img src="{{ asset('student/images/card-bottom.svg') }}" class="img-fluid"
                                            alt="">
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row mt-5">
                            <div class="card text-center">
                                <div class="card-header">
                                    <h2>{{ trans('student.profile_tab_card.not_found') }}</h2>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('confirm-popup', event => {
            $('#confirmPopup').modal('show')
        });

        window.addEventListener('view-popup', event => {
            $('#viewPopup').modal('show')
        });

        window.addEventListener('reason-popup', event => {
            $('#confirmPopup').modal('hide')
            $('#reasonPopup').modal('show')
        });

        window.addEventListener('swal:modal', event => {
            $('#confirmPopup').modal('hide');
            $('#reasonPopup').modal('hide')
            Swal.fire({
                title: event.detail[0].title,
                text: event.detail[0].text,
                icon: event.detail[0].icon
            });

        });
    </script>

</div>
