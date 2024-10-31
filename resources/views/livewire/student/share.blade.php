<div class="p-lg-5 p-4">
    <h4 class="fw-600">{{ trans('student.share.share') }}</h4>
    <div class="d-flex justify-content-center align-items-center">
        <div class="my-qr-code mt-5 mb-4 text-center">
            {!! $qrCode !!}
        </div>
    </div>
    <p class="text-center">{{ trans('student.share.share_text') }}</p>
    @if ($showShareOptions)
        <div class="d-flex gap-2 justify-content-center align-items-center mb-3">
            <a href="{{ $shareUrls['facebook'] }}" target="_blank" class="btn btn-primary"><i
                    class="fab fa-facebook"></i></a>
            <a href="{{ $shareUrls['twitter'] }}" target="_blank" class="btn btn-info"><i
                    class="fab fa-twitter"></i></a>
            <a href="{{ $shareUrls['linkedin'] }}" target="_blank" class="btn btn-primary"><i
                    class="fab fa-linkedin"></i></a>
            <a href="{{ $shareUrls['whatsapp'] }}" target="_blank" class="btn btn-success"><i
                    class="fab fa-whatsapp"></i></a>
        </div>
    @endif
    <div class="d-flex justify-content-center align-items-center">
        <button wire:click="toggleShareOptions"
            class="btn btn-custom-bg rounded-pill px-5 d-flex align-items-center justify-content-center gap-2">
            <div>
                <img src="{{ asset('student/images/send-icon.svg') }}" class="img-fluid" alt="">
            </div>
            <div>
                <p class="text-white m-0">{{ trans('student.share.share_button') }}</p>
            </div>
        </button>
    </div>

    <div class="d-flex justify-content-center">
        <div
            class="d-flex justify-content-between copy-profile-url-bg rounded-3 align-items-center gap-5 bg-light-secondary px-3 py-2 my-3">
            <div>
                <p class="m-0" id="urlText">
                    {{ $url }}
                </p>
            </div>
            <div class="position-relative d-inline-block">
                <button class="btn p-0" onclick="copyToClipboard()">
                    <img src="{{ asset('student/images/copy.svg') }}" class="img-fluid" alt="">
                </button>
                <span id="copyMessage" class="badge bg-primary text-white position-absolute start-50 translate-middle-x"
                    style="top: -30px; display: none;">
                    {{ trans('student.share.copy') }}
                </span>
            </div>
        </div>
    </div>
</div>
