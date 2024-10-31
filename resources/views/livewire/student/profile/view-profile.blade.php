<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-5">
                <div class="bg-profile px-3">
                    <div class="custom-margin">
                        <div class="profile-card bg-white p-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="user-profile-picture">
                                    <img src="{{ asset('storage/' . $student->photo) }}"
                                        class="img-fluid shadow rounded-circle" alt="">
                                </div>
                            </div>
                            <h6 class="text-center mt-2">{{ $student->first_name }} {{ $student->last_name }}</h6>
                            <p class="text-center ">{{ $student->email }}</p>
                            <h6 class="">About Me</h6>
                            @php
                                $studentProfile = $student->student_profile;
                                $aboutMe =
                                    collect($studentProfile)->firstWhere('about_me')['about_me'] ?? 'Not available';
                            @endphp
                            <p>{{ $aboutMe }}</p>

                            <div class="d-flex justify-content-center">

                                <a href="#">
                                    <button class="btn bg-warning">Save Contact</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="py-4">
                        @foreach ($platforms as $platform)
                            <div class="bg-white p-2 rounded social-links rounded-5 my-2">
                                <a wire:click.prevent="platformClick('{{ $platform->id }}', '{{ $platform->path }}')"
                                    class="d-flex gap-2 align-items-center text-decoration-none">
                                    <div class="social-media-icon">
                                        <img src="{{ asset('storage/' . $platform->icon) }}"
                                            class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <div>
                                        <h6 class="m-0 text-dark">{{ $platform->title }}</h6>
                                        <p class="m-0 text-secondary social-link-text">
                                            {{ $platform->path }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('navigateTo', event => {
            window.open(event.detail[0].url, '_blank');
        });
    </script>
</div>
