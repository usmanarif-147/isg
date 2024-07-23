<div class="p-lg-5 p-4">
    <div class="banner-bg">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 px-5 py-4">
                <p class="fs-13 light-dark">September 4, 2023</p>
                <h3 class="text-white pt-lg-5 pt-2">Welcome back, {{ $full_name }}!</h3>
                <p class="light-dark fs-13 m-0">
                    {{ $about_me }}
                </p>
            </div>
            <div class="col-12 col-lg-6">
                <div class="school-bag">
                    <img src="{{ asset('student/images/school-bag.svg') }}" class="img-fluid w-100" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="row my-lg-5 my-3 g-3">
        <div class="col-12 col-lg-9">
            <div class="row gy-3">
                <div class="col-12 col-lg-4">
                    <a href="#" class="text-decoration-none">
                        <div class="card-shadow p-3">
                            <p class="m-0 liver-color fw-500">Profile Views</p>
                            <h2 class="text-center liver-color">0</h2>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-4">
                    <a href="#" class="text-decoration-none">
                        <div class="card-shadow p-3">
                            <p class="m-0 liver-color fw-500">Link Taps</p>
                            <h2 class="text-center liver-color">0</h2>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-4">
                    <a href="#" class="text-decoration-none">
                        <div class="card-shadow p-3">
                            <p class="m-0 liver-color fw-500">Leads</p>
                            <h2 class="text-center liver-color">0</h2>
                        </div>
                    </a>
                </div>

                <div class="col-12">
                    <div class="card radius-20 shadow p-4 bg-white">
                        <h6>Leads</h6>
                        <canvas id="myChart" width="717" height="358"
                            style="display: block; box-sizing: border-box; height: 358px; width: 717px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card-shadow p-lg-3 p-4">
                <p class="liver-color">Top Taped Links</p>
                @foreach ($activePlatforms as $platform)
                    <div class="d-flex justify-content-between align-items-center my-3">
                        <div>
                            <img src="{{ asset(Storage::url($platform->icon)) }}" class="img-fluid" width="40"
                                height="40" alt="">
                        </div>
                        <div>
                            <h6 class="m-0">0</h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
