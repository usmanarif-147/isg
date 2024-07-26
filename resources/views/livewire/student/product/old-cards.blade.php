<div>
    <h4 class="fw-600">Card Preview</h4>
    <div class="">
        <div class="d-flex justify-content-center align-items-center">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link nav-card px-5 rounded-pill fw-600 active" id="pills-front-tab"
                        data-bs-toggle="pill" data-bs-target="#pills-front" type="button" role="tab"
                        aria-controls="pills-front" aria-selected="true">
                        Front
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link nav-card px-5 rounded-pill fw-600" id="pills-back-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-back" type="button" role="tab" aria-controls="pills-back"
                        aria-selected="false">
                        Back
                    </button>
                </li>
            </ul>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade active show" id="pills-front" role="tabpanel" aria-labelledby="pills-front-tab">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="border border-1 shadow position-relative rounded-3 pb-5 student-card">
                        <div class="container p-0">
                            <div class="row align-items-center m-1">
                                <div class="col-5 p-0">
                                    <div class="bg-charcol d-flex justify-content-center align-items-center">
                                        <div class="d-flex gap-2 align-items-center">
                                            <div>
                                                <img src="{{ asset('student/images/school-logo.svg') }}"
                                                    class="img-fluid" alt="">
                                            </div>
                                            <div>
                                                <h5 class="m-0 text-white">Larana</h5>
                                                <p class="m-0 text-white">High School</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-7 p-0">
                                    <div class="bg-navy-blue d-flex justify-content-center align-items-center">
                                        <h3 class="text-white m-0">Student Card</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3 mx-5 my-2">
                            <div>
                                <div class="profile-image-card border-3 shadow border-white border rounded-circle">
                                    <img src="https://img.freepik.com/free-psd/3d-illustration-person-with-sunglasses_23-2149436188.jpg?t=st=1716804080~exp=1716807680~hmac=f544d7e2421c72cab962a627fa919c2d9a3849e1ccc759486401d83c64602064&amp;w=740"
                                        class="img-fluid rounded-circle" alt="">
                                </div>
                            </div>
                            <div>
                                <p class="fw-600 m-0">Name</p>
                                <h5 class="navy-blue fw-bold">Abdul Haseeb</h5>
                                <p class="fw-600 m-0">ID</p>
                                <h5 class="navy-blue fw-bold">123-456-7890</h5>
                                <p class="fw-600 m-0">ADDRESS</p>
                                <h5 class="navy-blue fw-bold">
                                    123 Anywhere St., Any City
                                </h5>
                                <p class="text-uppercase fw-600 m-0">
                                    Expirey Date
                                </p>
                                <h5 class="navy-blue fw-bold">25 May, 2024</h5>
                            </div>
                        </div>
                        <div class="position-absolute card-bottom">
                            <img src="{{ asset('student/images/card-bottom.svg') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="pills-back" role="tabpanel" aria-labelledby="pills-back-tab">
                ...
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h6 class="fw-600">Fill Card Details</h6>
        <div class="row gy-3">
            <div class="col-12 col-lg-4">
                <input type="text" placeholder="Student Name" class="form-control">
            </div>
            <div class="col-12 col-lg-4">
                <input type="text" placeholder="Student ID" class="form-control">
            </div>
            <div class="col-12 col-lg-4">
                <input type="text" placeholder="Address" class="form-control">
            </div>
            <div class="col-12 col-lg-4">
                <input type="text" placeholder="Student Name" class="form-control">
            </div>
            <div class="col-12 col-lg-4">
                <input type="text" placeholder="Student Name" class="form-control">
            </div>
            <div class="col-12 col-lg-4">
                <input type="text" placeholder="Student Name" class="form-control">
            </div>
        </div>

        <div
            class="shadow-sm border-1 border p-2 rounded-3 upload-box my-2 d-flex justify-content-center align-items-center">
            <label for="file-upload">
                <img src="{{ asset('student/images/upload-student-picture.svg') }}" class="img-fluid"
                    style="cursor: pointer;" alt="Upload Image">
            </label>
            <input type="file" id="file-upload" style="display: none;">
        </div>
        <p class="fw-600 mb-1">
            <span class="text-success">Click </span>to upload image
        </p>
        <button class="btn btn-custom-bg text-white px-5 my-2">
            Apply
        </button>
    </div>

</div>
