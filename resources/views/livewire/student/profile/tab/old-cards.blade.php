<div>
    <div class="row my-3 align-items-center">
        <div class="col-3 col-lg-6">
            <div class="d-flex gap-3 align-items-center">
                <div class="card-icon">
                    <img src="{{ asset('student/images/id-card-icon.svg') }}" class="img-fluid" alt="">
                </div>
                <div>
                    <h6 class="fw-700 m-0">ID</h6>
                    <p class="truncate m-0">
                        https://vlinq.co/p/8ee58242-a850-432a-8d99-e4844cf99120
                    </p>
                </div>
            </div>
        </div>
        <div class="col-3 col-lg-2">
            <h6 class="fw-700">Type</h6>
            <p class="m-0">Card</p>
        </div>
        <div class="col-3 col-lg-2">
            <h6 class="fw-700">Status</h6>
            <p class="m-0">Active</p>
        </div>
        <div class="col-3 col-lg-2">
            <h6 class="fw-700">Action</h6>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center">
        <div class="modal fade" id="customModal1" aria-hidden="true" aria-labelledby="customModalLabel1" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-2">
                    <div class="modal-body">
                        <div class="row my-lg-3 my-2">
                            <div class="col-lg-3 col-3"></div>
                            <div class="col-lg-7 col-8">
                                <h4>Activate card</h4>
                            </div>
                            <div class="col-lg-2 col-1">
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-custom-bg w-100 open-custom-modal2" data-bs-target="#customModal2"
                            data-bs-toggle="modal" data-bs-dismiss="modal">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="d-flex align-items-center gap-4">
                                    <div class="scan-by-qr">
                                        <img src="{{ asset('student/images/scan-by-qr.svg') }}" class="img-fluid"
                                            alt="">
                                    </div>
                                    <div>
                                        <p class="m-0 text-white">Scan by QR</p>
                                    </div>
                                </div>
                            </div>
                        </button>

                        <div class="separator-container my-2">
                            <hr class="line">
                            <span class="or-text">OR</span>
                            <hr class="line">
                        </div>
                        <div class="">
                            <button class="btn w-100 btn-custom-bg open-custom-modal3" data-bs-target="#customModal3"
                                data-bs-toggle="modal" data-bs-dismiss="modal">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="d-flex align-items-center gap-4">
                                        <div class="scan-by-qr">
                                            <img src="{{ asset('student/images/scan-by-nfc.svg') }}" class="img-fluid"
                                                alt="">
                                        </div>
                                        <div>
                                            <p class="m-0 text-white">
                                                Scan by NFC
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </button>

                            <div
                                class="px-3 py-1 border-dark mt-5 mb-0 border border-1 rounded-pill d-flex justify-content-between align-items-center">
                                <div>
                                    <input type="text" class="form-control border-0" placeholder="Activate By URL">
                                </div>
                                <div>
                                    <button class="btn p-0">
                                        <img src="{{ asset('student/images/send-url-icon.svg') }}" class="img-fluid"
                                            alt="">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="customModal2" aria-hidden="true" aria-labelledby="customModalLabel2" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="qr-code">
                                <img src="{{ asset('student/images/QR-code.svg') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="text-center mt-2">
                            <button class="btn btn-custom-bg text-white w-25 rounded-pill">
                                Scan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="customModal3" aria-hidden="true" aria-labelledby="customModalLabel3" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="qr-code">
                                <img src="{{ asset('student/images/nfc.svg') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="text-center">
                            <p class="text-danger">
                                Tap your NFC in mobile view only
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a class="btn btn-custom-bg my-5 activate-custom-card d-flex gap-2 align-items-center" data-bs-toggle="modal"
            href="#customModal1" role="button">
            <div>
                <img src="{{ asset('student/images/btn-QR.svg') }}" class="img-fluid" alt="">
            </div>
            <div>
                <h6 class="text-white m-0">Activate card</h6>
            </div>
        </a>
    </div>
</div>
