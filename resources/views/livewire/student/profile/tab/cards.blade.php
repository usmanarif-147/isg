<div>

    @if (count($frontSide) || count($backSide))
        <div class="row mt-5">
            <div class="col-4">
                <h5> <strong>Status:</strong> <span class="{{ $status ? 'text-success' : 'text-danger' }}">
                        {{ $status ? 'Active' : 'Inactive' }}
                    </span>
                </h5>
            </div>
            <div class="col-4 offset-4">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Select</option>
                    <option value="1">Stollen Request</option>
                    <option value="2">Update Request</option>
                </select>
            </div>
            <div class="col-6">
                <div class="border border-1 shadow position-relative rounded-3 pb-5 student-card mt-5">
                    <div class="container p-0">
                        <div class="row align-items-center m-1">
                            <div class="col-5 p-0">
                                <div class="bg-charcol d-flex justify-content-center align-items-center">
                                    <div class="d-flex gap-2 align-items-center">
                                        <div>
                                            <img src="{{ asset(Storage::url($schoolLogo)) }}" class="img-fluid"
                                                alt="" height="80" width="80">
                                        </div>
                                        <div>
                                            <p class="m-0">{{ $schoolName }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7 p-0">
                                <div class="bg-navy-blue d-flex justify-content-center align-items-center">
                                    <h3 class="m-0">Front Side</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3 mx-5 my-2">
                        <div>
                            <div class="profile-image-card border-3 shadow border-white border rounded-circle">
                                <img src="{{ $frontSidePhoto }}" class="img-fluid rounded-circle" alt="">
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
                                            <img src="{{ asset(Storage::url($schoolLogo)) }}" class="img-fluid"
                                                alt="" height="80" width="80">
                                        </div>
                                        <div>
                                            <p class="m-0">{{ $schoolName }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7 p-0">
                                <div class="bg-navy-blue d-flex justify-content-center align-items-center">
                                    <h3 class="m-0">Back Side</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3 mx-5 my-2">
                        <div>
                            <div class="profile-image-card border-3 shadow border-white border rounded-circle">
                                <img src="{{ $backSidePhoto }}" class="img-fluid rounded-circle" alt="">
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
                    <h2> Card Not Found </h2>
                </div>
            </div>
        </div>
    @endif



</div>
