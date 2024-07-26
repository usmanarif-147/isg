<div class="p-lg-5 p-4">
    <div class="cover-picture position-relative"
        style="background-image: url('{{ $cover_photo ? $cover_photo : asset('student/images/cover-picture.svg') }}');">
    </div>

    <div class="px-lg-5 px-3">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6">
                <div class="d-flex gap-lg-4 gap-3 justify-content-between align-items-center">
                    <div>
                        <div class="profile-pic position-relative">
                            <img src="{{ $profile_photo ? $profile_photo : 'https://cdn-icons-png.flaticon.com/512/4537/4537019.png' }}"
                                class="img-fluid rounded-circle" alt="">
                        </div>
                    </div>
                    <div>
                        <h4 class="fw-600 mb-1 mt-2">{{ $full_name }}</h4>
                        <p class="fs-13 bio-text">
                            {{ $about_me }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#newShareModal">
                        <img src="{{ asset('student/images/share-modal-icon.svg') }}" class="img-fluid" alt="">
                    </button>
                </div>
                <div class="d-flex justify-content-lg-end justify-content-start my-2">
                    <div class="d-flex gap-2 align-items-center">
                        @foreach ($activePlatforms as $platform)
                            <div>
                                <a href="#">
                                    <img src="{{ asset(Storage::url($platform->icon)) }}" width="30" height="30"
                                        class="img-fluid" alt="">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-3">
            <a href="{{ route('student.edit.profile') }}" class="text-decoration-none">
                <div class="d-flex align-items-center gap-2">
                    <div>
                        <img src="{{ asset('student/images/edit-profile-icon.svg') }}" class="img-fluid" alt="">
                    </div>
                    <div>
                        <p class="m-0 link-text">Edit Profile</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link {{ $tab == 1 ? 'active' : '' }}" type="button"
                            wire:click="showDetailsTab">
                            <div class="d-flex gap-2 align-items-center">
                                <div class="mobile-hidden">
                                    <i class="fa fa-user mobile-hidden" aria-hidden="true"></i>
                                </div>
                                <div>
                                    <p class="m-0">My Details</p>
                                </div>
                            </div>
                        </button>
                        <button class="nav-link {{ $tab == 2 ? 'active' : '' }}" type="button"
                            wire:click="showLinksTab">
                            <div class="d-flex gap-2 align-items-center gap-1">
                                <div class="mobile-hidden">
                                    <i class="fa fa-link mobile-hidden" aria-hidden="true"></i>
                                </div>
                                <div>
                                    <p class="m-0">Attached links</p>
                                </div>
                            </div>
                        </button>
                        <button class="nav-link {{ $tab == 3 ? 'active' : '' }}" type="button"
                            wire:click="showCardsTab">
                            <div class="d-flex gap-2 align-items-center gap-1">
                                <div class="mobile-hidden">
                                    <i class="fa fa-address-card-o" aria-hidden="true"></i>
                                </div>
                                <div>
                                    <p class="m-0">Cards</p>
                                </div>
                            </div>
                        </button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade {{ $tab == 1 ? 'active show' : '' }}">
                        @include('livewire.student.profile.includes.detail-view')
                    </div>
                    <div class="tab-pane fade {{ $tab == 2 ? 'active show' : '' }}">
                        @include('livewire.student.profile.includes.platform-view')
                    </div>
                    <div class="tab-pane fade {{ $tab == 3 ? 'active show' : '' }}">
                        @include('livewire.student.profile.includes.card-view')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
