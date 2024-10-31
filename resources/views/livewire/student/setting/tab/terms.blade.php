<div>
    <h5 class="fw-500">{{ trans('student.terms_and_conditions.title') }}</h5>
    <hr class="mb-0">
    <div class="pt-3">
        <p class="fs-15">
            {{ trans('student.terms_and_conditions.intro') }}
        </p>
        <p class="fs-15">
            <span class="fw-600">1.</span>
            {{ trans('student.terms_and_conditions.Acceptance') }}
        </p>
        <p class="fs-15">
            <span class="fw-600">2.</span>
            {{ trans('student.terms_and_conditions.Eligibility') }}
        </p>
        <p class="m-0">
            <span class="fw-600">3. {{ trans('student.terms_and_conditions.User_Account') }}</span>
        </p>
        <ul>
            <li class="fs-15">
                {{ trans('student.terms_and_conditions.User_Account_1') }}
            </li>
            <li class="fs-15">{{ trans('student.terms_and_conditions.User_Account_2') }}</li>
            <li class="fs-15">{{ trans('student.terms_and_conditions.User_Account_3') }}
            </li>
        </ul>
        <p></p>
        <p class="m-0">
            <span class="fw-600">4. {{ trans('student.terms_and_conditions.Application_Process') }}</span>
        </p>
        <ul>
            <li class="fs-15">{{ trans('student.terms_and_conditions.Application_Process_1') }}
            </li>
            <li class="fs-15">{{ trans('student.terms_and_conditions.Application_Process_2') }}
            </li>
            <li class="fs-15">{{ trans('student.terms_and_conditions.Application_Process_3') }}
            </li>
        </ul>
        <p></p>
        <p class="m-0">
            <span class="fw-600">5. {{ trans('student.terms_and_conditions.NFC_Card') }}</span>
        </p>
        <ul>
            <li class="fs-15">{{ trans('student.terms_and_conditions.NFC_Card_1') }}
            </li>
            <li class="fs-15">{{ trans('student.terms_and_conditions.NFC_Card_2') }}
            </li>
            <li class="fs-15">{{ trans('student.terms_and_conditions.NFC_Card_3') }}
            </li>
        </ul>
        <p></p>
        <p class="m-0">
            <span class="fw-600">6. {{ trans('student.terms_and_conditions.Privacy_Policy') }}</span>
        </p>
        <ul>
            <li class="fs-15">{{ trans('student.terms_and_conditions.Privacy_Policy_1') }}
            </li>
            <li class="fs-15">{{ trans('student.terms_and_conditions.Privacy_Policy_2') }}
        </ul>
        <p></p>
        <p class="m-0">
            <span class="fw-600">7. {{ trans('student.terms_and_conditions.Intellectual_Property') }}</span>
        </p>
        <ul>
            <li class="fs-15">{{ trans('student.terms_and_conditions.Intellectual_Property_1') }}
            </li>
            <li class="fs-15">{{ trans('student.terms_and_conditions.Intellectual_Property_2') }}
            </li>
        </ul>
        <p></p>
        <p class="m-0">
            <span class="fw-600">8. {{ trans('student.terms_and_conditions.Liability') }}</span>
        </p>
        <ul>
            <li class="fs-15">{{ trans('student.terms_and_conditions.Liability_1') }}
            </li>
            <li class="fs-15">{{ trans('student.terms_and_conditions.Liability_2') }}
            </li>
        </ul>
        <p></p>
        <p class="fs-15">
            <span class="fw-600">10. </span>
            {{ trans('student.terms_and_conditions.Governing_Law') }}
        </p>
        <p class="m-0 fs-15">
            <span class="fw-600">11. </span>
            {{ trans('student.terms_and_conditions.Contact') }} support@isg.edu.
        </p>

        <div class="d-flex gap-2 my-2">
            <div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" wire:model="terms_accepted"
                        {{ $terms_accepted == 1 ? 'checked' : '' }} id="flexCheckDefault">

                </div>
            </div>
            <div>
                <p class="fs-15">
                    {{ trans('student.terms_and_conditions.Agree') }}
                </p>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-custom-bg px-5 text-white" wire:click="saveTerms">
                {{ trans('student.terms_and_conditions.Save') }}
            </button>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-success mt-3">
                {{ session('message') }}
            </div>
        @endif
    </div>
</div>
