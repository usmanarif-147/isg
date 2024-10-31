<div>
    <h5 class="fw-500">{{ trans('student.tab_privacy.privacy') }}</h5>
    <hr class="mb-0">
    <p class="pt-2">{{ trans('student.tab_privacy.what_you_want_to_show') }}</p>
    <div class="row">
        <div class="col-lg-5 col-12">
            <h5 class="pb-2">{{ trans('student.tab_privacy.personal_information') }}</h5>
            @foreach ($studentProfile as $key => $item)
                @if (isset($item['enabled']))
                    <div class="d-flex justify-content-between align-items-center my-3">
                        <div>
                            <h6 class="fw-600 personal-info-text">
                                @if (array_key_exists('cnic', $item))
                                    CNIC
                                @elseif(array_key_exists('blood_group', $item))
                                    {{ trans('student.tab_privacy.blood_group') }}
                                @elseif(array_key_exists('dob', $item))
                                    {{ trans('student.tab_privacy.date_of_birth') }}
                                @elseif(array_key_exists('phone', $item))
                                    {{ trans('student.tab_privacy.phone') }}
                                @elseif(array_key_exists('gender', $item))
                                    {{ trans('student.tab_privacy.gender') }}
                                @elseif(array_key_exists('nationality', $item))
                                    {{ trans('student.tab_privacy.nationality') }}
                                @elseif(array_key_exists('about_me', $item))
                                    {{ trans('student.tab_privacy.about_me') }}
                                @elseif(array_key_exists('full_name', $item))
                                    {{ trans('student.tab_privacy.full_name') }}
                                @elseif(array_key_exists('bio', $item))
                                    Bio
                                @elseif(array_key_exists('profile_photo', $item))
                                    {{ trans('student.tab_privacy.profile_photo') }}
                                @elseif(array_key_exists('cover_photo', $item))
                                    {{ trans('student.tab_privacy.cover_photo') }}
                                @else
                                    {{ ucfirst($key) }}
                                @endif
                            </h6>
                        </div>
                        <div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox"
                                    wire:click="toggleEnabled('{{ $key }}')"
                                    {{ $item['enabled'] == 1 ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            <h5 class="pb-2">{{ trans('student.tab_privacy.student_information') }}</h5>

            <div class="d-flex justify-content-between align-items-center my-3">
                <div>
                    <h6 class="fw-600 personal-info-text">{{ trans('student.tab_privacy.roll_no') }}</h6>
                </div>
                <div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center my-3">
                <div>
                    <h6 class="fw-600 personal-info-text">{{ trans('student.tab_privacy.degree') }}</h6>
                </div>
                <div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center my-3">
                <div>
                    <h6 class="fw-600 personal-info-text">{{ trans('student.tab_privacy.batch') }}</h6>
                </div>
                <div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center my-3">
                <div>
                    <h6 class="fw-600 personal-info-text">{{ trans('student.tab_privacy.section') }}</h6>
                </div>
                <div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center my-3">
                <div>
                    <h6 class="fw-600 personal-info-text">{{ trans('student.tab_privacy.campus') }}</h6>
                </div>
                <div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
