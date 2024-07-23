<div>
    <div class="p-4 card-shadow my-4">
        <h5 class="navy-blue fw-bold">About Me</h5>
        <p class="fs-13 m-0">
            {{ $student->about_me }}
        </p>
    </div>
    <div class="row gy-3">
        <div class="col-12 col-lg-8">
            <div class="card-shadow p-4">
                <h5 class="navy-blue fw-bold">
                    Personal information
                </h5>
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="d-flex justify-content-between align-items-center my-4 gap-2">
                            <div>
                                <h6 class="navy-blue fw-600 m-0">Name:</h6>
                            </div>
                            <div>
                                <p class="info-text fs-15 m-0">
                                    {{ $student->full_name }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="d-flex justify-content-between align-items-center my-4 gap-2">
                            <div>
                                <h6 class="navy-blue fw-600 m-0">CNIC:</h6>
                            </div>
                            <div>
                                <p class="info-text fs-15 m-0">
                                    {{ $student->cnic }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="d-flex justify-content-between align-items-center my-4 gap-2">
                            <div>
                                <h6 class="navy-blue fw-600 m-0">
                                    Blood Gr:
                                </h6>
                            </div>
                            <div>
                                <p class="info-text fs-15 m-0">{{ $student->blood_group }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="d-flex justify-content-between align-items-center my-4 gap-2">
                            <div>
                                <h6 class="navy-blue fw-600 m-0">DOB:</h6>
                            </div>
                            <div>
                                <p class="info-text fs-15 m-0">{{ $student->dob }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="d-flex justify-content-between align-items-center my-4 gap-2">
                            <div>
                                <h6 class="navy-blue fw-600 m-0">Phone:</h6>
                            </div>
                            <div>
                                <p class="info-text fs-15 m-0">
                                    {{ $student->phone }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="d-flex justify-content-between align-items-center my-4 gap-2">
                            <div>
                                <h6 class="navy-blue fw-600 m-0">
                                    Nationality:
                                </h6>
                            </div>
                            <div>
                                <p class="info-text fs-15 m-0">{{ $student->nationality }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="d-flex justify-content-between align-items-center mt-3 mb-0 gap-2">
                            <div>
                                <h6 class="navy-blue fw-600 m-0">
                                    Gander:
                                </h6>
                            </div>
                            <div>
                                <p class="info-text fs-15 m-0">{{ $student->gender }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="d-flex justify-content-between align-items-center mt-3 mb-0 gap-2">
                            <div>
                                <h6 class="navy-blue fw-600 m-0">Email:</h6>
                            </div>
                            <div>
                                <p class="info-text fs-15 m-0">
                                    haseeb7063952@gmail.com
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
