<div>

    @if (count($frontSide) || count($backSide))
        <div class="row mt-5">
            <div class="col-4">
                <h5> <strong>{{ trans('student.profile_tab_card.status') }}:</strong> <span
                        class="{{ $status == 3 ? 'text-danger' : ($status == 4 ? 'text-info' : ($status == 1 ? 'text-warning' : ($status == 2 ? 'text-success' : 'text-secondary'))) }}">
                        {{ $status == 1 ? 'Pending' : ($status == 2 ? 'Active' :  ($status == 3 ? 'Inactive' : ($status == 4 ? 'Updation' : 'Not Define'))) }}
                    </span>
                </h5>
            </div>
            <div class="col-4 offset-1">
                @if($status == 2)
                    <div class="form-floating">
                        <select class="form-select form-control" id="floatingSelectGrid" wire:model="studentCardRequest"
                            aria-label="Floating label select example">
                            <option selected value="1">{{ trans('student.profile_tab_card.update_request') }}</option>
                            <option value="2">{{ trans('student.profile_tab_card.stollen_request') }}</option>
                        </select>
                        <label for="floatingSelectGrid">{{ trans('student.profile_tab_card.select_request') }}</label>
                    </div>
                @endif
            </div>
            <div class="col-3 align-content-center">
                @if($status == 2)
                    <button class="btn btn-outline-primary" wire:click=confirmRequestCard()
                        type="button">{{ trans('student.profile_tab_card.send_request') }}
                    </button>
                @elseif($status == 4)
                    <a href="{{ route('student.product') }}">
                        <button class="btn btn-outline-info" 
                            type="button">{{ trans('student.profile_tab_card.update') }}
                        </button>
                    </a>
                @endif
            </div>
            <div class="col-6">
                <div class="border border-1 shadow position-relative rounded-3 pb-5 student-card mt-5">
                    <div class="container p-0">
                        <div class="row align-items-center m-1">
                            <div class="col-5 p-0">
                                <div class="bg-charcol d-flex justify-content-center align-items-center">
                                    <div class="d-flex gap-2 align-items-center">
                                        <div>
                                            <img src="{{ asset(Storage::url($schoolLogo)) }}"
                                                class="img-fluid rounded-circle" alt="" height="60"
                                                width="60">
                                        </div>
                                        <div>
                                            <p class="m-0">{{ $schoolName }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7 p-0">
                                <div class="bg-navy-blue d-flex justify-content-center align-items-center">
                                    <h3 class="m-0">{{ trans('student.profile_tab_card.front') }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3 mx-5 my-2">
                        <div>
                            <div class="profile-image-card border-3 shadow border-white border rounded-circle">
                                <img src="{{ $frontSide['photo'] ? asset('storage/' . $frontSide['photo']) : $frontSidePhoto }}"
                                    class="img-fluid rounded-circle" alt="">
                            </div>
                        </div>
                        <div>
                            @foreach ($frontSide as $key => $value)
                                @if ($key != 'photo')
                                    @if ($key == 'gender')
                                        <p class="fw-600 m-0">{{ strtoupper(str_replace('_', ' ', $key)) }}</p>
                                        <h5 class="navy-blue fw-bold">{{ $value == 1 ? 'Female' : 'Male' }}</h5>
                                    @else
                                        <p class="fw-600 m-0">{{ strtoupper(str_replace('_', ' ', $key)) }}</p>
                                        <h5 class="navy-blue fw-bold">{{ $value }}</h5>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="position-absolute card-bottom">
                        <img src="{{ asset('student/images/card-bottom.svg') }}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="border border-1 shadow position-relative rounded-3 pb-5 student-card mt-5">
                    <div class="container p-0">
                        <div class="row align-items-center m-1">
                            <div class="col-5 p-0">
                                <div class="bg-charcol d-flex justify-content-center align-items-center">
                                    <div class="d-flex gap-2 align-items-center">
                                        <div>
                                            <img src="{{ asset(Storage::url($schoolLogo)) }}"
                                                class="img-fluid rounded-circle" alt="" height="60"
                                                width="60">
                                        </div>
                                        <div>
                                            <p class="m-0">{{ $schoolName }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7 p-0">
                                <div class="bg-navy-blue d-flex justify-content-center align-items-center">
                                    <h3 class="m-0">{{ trans('student.profile_tab_card.back') }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3 mx-5 my-2">
                        <div>
                            <div class="profile-image-card border-3 shadow border-white border rounded-circle">
                                <img src="{{ $backSide['photo'] ? asset('storage/' . $backSide['photo']) : $backSidePhoto }}"
                                    class="img-fluid rounded-circle" alt="">
                            </div>
                        </div>
                        <div>
                            @foreach ($backSide as $key => $value)
                                @if ($key != 'photo')
                                    @if ($key == 'gender')
                                        <p class="fw-600 m-0">{{ strtoupper(str_replace('_', ' ', $key)) }}</p>
                                        <h5 class="navy-blue fw-bold">{{ $value == 1 ? 'Female' : 'Male' }}</h5>
                                    @else
                                        <p class="fw-600 m-0">{{ strtoupper(str_replace('_', ' ', $key)) }}</p>
                                        <h5 class="navy-blue fw-bold">{{ $value }}</h5>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="position-absolute card-bottom">
                        <img src="{{ asset('student/images/card-bottom.svg') }}" class="img-fluid" alt="">
                    </div>
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
    <x-custom.confirm-popup :method="$method" :actionBtnText="$btnText" :actionBtnColor="$btnColor" :body="$body" />
    <script>
        window.addEventListener('confirm-popup', event => {
            $('#confirmPopup').modal('show')
        });
        window.addEventListener('swal:modal', event => {
            $('#confirmPopup').modal('hide');
            Swal.fire({
                title: event.detail[0].title,
                text: event.detail[0].text,
                icon: event.detail[0].icon
            });

        });
    </script>

</div>
