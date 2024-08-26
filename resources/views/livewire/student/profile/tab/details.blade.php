<div>
    <div class="p-4 card-shadow my-4">
        <h5 class="navy-blue fw-bold">{{trans('student.profile_tab_details.about_me')}}</h5>
        <p class="fs-13 m-0">
            {{ $about_me }}
        </p>
    </div>
    <div class="row gy-3">
        <div class="col-12 col-lg-8">
            <div class="card-shadow p-4">
                <h5 class="navy-blue fw-bold">
                    {{trans('student.profile_tab_details.personal_information')}}
                </h5>
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="d-flex justify-content-between align-items-center my-4 gap-2">
                            <div>
                                <h6 class="navy-blue fw-600 m-0">{{trans('student.profile_tab_details.name')}}:</h6>
                            </div>
                            <div>
                                <p class="info-text fs-15 m-0">
                                    {{ $full_name }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="d-flex justify-content-between align-items-center my-4 gap-2">
                            <div>
                                <h6 class="navy-blue fw-600 m-0">{{trans('student.profile_tab_details.cnic')}}:</h6>
                            </div>
                            <div>
                                <p class="info-text fs-15 m-0">
                                    {{ $cnic }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="d-flex justify-content-between align-items-center my-4 gap-2">
                            <div>
                                <h6 class="navy-blue fw-600 m-0">
                                    {{trans('student.profile_tab_details.blood_gr')}}:
                                </h6>
                            </div>
                            <div>
                                <p class="info-text fs-15 m-0">{{ $blood_group }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="d-flex justify-content-between align-items-center my-4 gap-2">
                            <div>
                                <h6 class="navy-blue fw-600 m-0">{{trans('student.profile_tab_details.dob')}}:</h6>
                            </div>
                            <div>
                                <p class="info-text fs-15 m-0">{{ $dob }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="d-flex justify-content-between align-items-center my-4 gap-2">
                            <div>
                                <h6 class="navy-blue fw-600 m-0">{{trans('student.profile_tab_details.phone')}}:</h6>
                            </div>
                            <div>
                                <p class="info-text fs-15 m-0">
                                    {{ $phone }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="d-flex justify-content-between align-items-center my-4 gap-2">
                            <div>
                                <h6 class="navy-blue fw-600 m-0">
                                    {{trans('student.profile_tab_details.nationality')}}:
                                </h6>
                            </div>
                            <div>
                                <p class="info-text fs-15 m-0">{{ $nationality }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="d-flex justify-content-between align-items-center mt-3 mb-0 gap-2">
                            <div>
                                <h6 class="navy-blue fw-600 m-0">
                                    {{trans('student.profile_tab_details.gender')}}:
                                </h6>
                            </div>
                            <div>
                                <p class="info-text fs-15 m-0">{{ $gender }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="d-flex justify-content-between align-items-center mt-3 mb-0 gap-2">
                            <div>
                                <h6 class="navy-blue fw-600 m-0">{{trans('student.profile_tab_details.email')}}:</h6>
                            </div>
                            <div>
                                <p class="info-text fs-15 m-0">
                                    {{ auth()->user()->email }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row mt-4 mb-5">
        <div class="col-12">
            <div class="card-shadow p-4">
                <h5 class="navy-blue fw-bold mb-2">Skills</h5>
                <div class="row">
                    <div class="col-auto my-2">
                        <button class="btn btn-skills-bg rounded-pill px-4">
                            Figma
                        </button>
                    </div>
                    <div class="col-auto my-2">
                        <button class="btn btn-skills-bg rounded-pill px-4">
                            Adobe Photoshop
                        </button>
                    </div>
                    <div class="col-auto my-2">
                        <button class="btn btn-skills-bg rounded-pill px-4">
                            Adobe Illustrator
                        </button>
                    </div>
                    <div class="col-auto my-2">
                        <button class="btn btn-skills-bg rounded-pill px-4">
                            Sketch
                        </button>
                    </div>
                    <div class="col-auto my-2">
                        <button class="btn btn-skills-bg rounded-pill px-4">
                            Adobe XD
                        </button>
                    </div>
                    <div class="col-auto my-2">
                        <button class="btn btn-skills-bg rounded-pill px-4">
                            Canva
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
