<div class="p-lg-5 p-4">
    <h4 class="fw-600">Share your profile via QR code</h4>
    <div class="d-flex justify-content-center align-items-center">
        <div class="my-qr-code mt-5 mb-4 text-center">
            {!! $qrCode !!}
        </div>
    </div>
    <p class="text-center">Tap to save QR code</p>
    <div class="d-flex justify-content-center align-items-center">
        <button data-bs-toggle="modal" data-bs-target="#exampleModal"
            class="btn btn-custom-bg rounded-pill px-5 d-flex align-items-center justify-content-center gap-2">
            <div>
                <img src="{{ asset('student/images/send-icon.svg') }}" class="img-fluid" alt="">
            </div>
            <div>
                <p class="text-white m-0">Share</p>
            </div>
        </button>
    </div>

    <div class="d-flex justify-content-center">
        <div
            class="d-flex justify-content-between copy-profile-url-bg rounded-3 align-items-center gap-5 bg-light-secondary px-3 py-2 my-3">
            <div>
                <p class="m-0">
                    {{ url('') . '/' . $rollNumber }}
                </p>
            </div>
            <div>
                <button class="btn p-0">
                    <img src="{{ asset('student/images/copy.svg') }}" class="img-fluid" alt="">
                </button>
            </div>
        </div>
    </div>
</div>
