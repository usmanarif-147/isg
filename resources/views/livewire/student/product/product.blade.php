<div>
    <div class="p-lg-5 p-4">
        <div class="d-flex justify-content-center align-items-center product-card">
            @if ($card->status == 0)
                @if (!empty($hasEnabledFront) && !empty($hasEnabledBack))
                    <div class="text-center">
                        <h5 class="fw-600">{{ trans('student.product.not_found') }}</h5>
                        <a href="{{ route('student.card') }}">
                            <button class="btn btn-custom-bg text-white rounded-3 px-4">
                                {{ trans('student.product.apply') }}
                            </button>
                        </a>
                    </div>
                @else
                    <div class="text-center">
                        <h5 class="fw-600">{{ trans('student.product.not_found') }}</h5>
                        <p class="fw-600">{{ trans('student.product.template') }}</p>
                    </div>
                @endif
            @elseif($card->status == 4)
                <div class="text-center">
                    <h5 class="fw-600">{{ trans('student.product.update') }}</h5>
                    <a href="{{ route('student.card') }}">
                        <button class="btn btn-custom-bg text-white rounded-3 px-4">
                            {{ trans('student.product.update_apply') }}
                        </button>
                    </a>
                </div>
            @elseif (in_array($card->status, [1, 2, 3]))
                <div class="text-center">
                    <ul class="list-unstyled fw-600">
                        @foreach ([1 => trans('student.product.pending'), 2 => trans('student.product.active'), 3 => trans('student.product.inactive')] as $status => $message)
                            @if ($card->status == $status)
                                <li>{{ $message }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>
</div>
