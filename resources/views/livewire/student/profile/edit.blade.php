<div>
    <div class="cover-picture position-relative"
        style="background-image: url('{{ $cover_photo_preview ?? asset('student/images/cover-picture.svg') }}');">
        <div
            class="position-absolute camera-icon d-flex justify-content-center align-items-center rounded-circle bottom-0 end-0 m-3">
            <input type="file" class="img-fluid" wire:model="cover_photo"
                style="
              opacity: 0;
              position: absolute;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
              cursor: pointer;
            "
                accept="image/*" alt="">
            <img src="{{ asset('student/images/camera-icon.svg') }}" class="img-fluid" alt="">
        </div>
    </div>

    <div class="px-lg-5 px-3">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6">
                <div class="d-flex gap-lg-4 gap-3 justify-content-between align-items-center">
                    <div>
                        <div class="profile-pic position-relative">
                            <img src="{{ $profile_photo_preview ?? 'https://cdn-icons-png.flaticon.com/512/4537/4537019.png' }}"
                                class="img-fluid rounded-circle" alt="">
                            <div
                                class="position-absolute camera-icon-small d-flex justify-content-center align-items-center rounded-circle">
                                <input type="file" class="img-fluid" wire:model="profile_photo"
                                    style="
                        opacity: 0;
                        position: absolute;
                        width: 100%;
                        height: 100%;
                        cursor: pointer;
                      "
                                    accept="image/*" alt="">
                                <img src="{{ asset('student/images/camera-icon.svg') }}" class="img-fluid camera-img"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <div class="row">
            <form wire:submit.prevent="updateProfile">
                @csrf
                <h5 class="fw-700 pt-3 pb-2">About Me</h5>
                <div class="mb-3">
                    <textarea wire:model.live="about_me" class="form-control bg-transparent" rows="5"></textarea>
                    @error('about_me')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <h5 class="fw-700 py-3 m-0">Personal Information</h5>
                <div class="container">
                    <div class="row gy-3 mb-3">
                        <div class="col-12 col-lg-6">
                            <div class="form-floating">
                                <input wire:model.live="full_name" type="text" class="form-control input-radius"
                                    id="full_name">
                                <label for="full_name">Full Name</label>
                                @error('full_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-floating">
                                <input wire:model.live="cnic" type="text" class="form-control input-radius"
                                    id="cnic">
                                <label for="cnic">CNIC</label>
                                @error('cnic')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" wire:model.live="blood_group">
                                    <option selected>Select Blood Group</option>
                                    @foreach (get_blood_groups() as $group)
                                        <option value="{{ $group }}"
                                            {{ $group == $blood_group ? 'selected' : '' }}>{{ $group }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="blood_group">Blood Group</label>
                                @error('blood_group')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-floating">
                                <input wire:model.live="dob" type="date" class="form-control input-radius"
                                    id="dob">
                                <label for="dob">DOB</label>
                                @error('dob')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-floating">
                                <input wire:model.live="phone" type="text" class="form-control input-radius"
                                    id="phone">
                                <label for="phone">Phone</label>
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">

                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" wire:model.live="nationality">
                                    <option selected>Select Nationaltiy</option>
                                    @foreach (get_nationalities() as $n)
                                        <option value="{{ $n }}"
                                            {{ $n == $nationality ? 'selected' : '' }}>{{ $n }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="nationality">Nationality</label>
                                @error('nationality')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">

                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" wire:model.live="gender">
                                    <option value="0" selected>Select Gender</option>
                                    <option value="Male" {{ $gender == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $gender == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                                <label for="nationality">Gender</label>
                                @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-floating">
                                <textarea wire:model.live="bio" class="form-control input-radius" id="bio" rows="5"></textarea>
                                <label for="bio">Bio</label>
                                @error('bio')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mb-4">
                    <div class="col-12 col-lg-5">
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-outline-dark w-100 px-5">Cancel</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" wire:loading.attr="disabled"
                                    class="btn btn-custom-bg text-white w-100 px-5">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('swal:modal', event => {
            Swal.fire({
                title: event.detail[0].title,
                text: event.detail[0].text,
                icon: event.detail[0].icon,
                confirmButtonText: 'OK',
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false
            }).then((result) => {
                if (result.isConfirmed) {

                }
            });
        });
    </script>

</div>
