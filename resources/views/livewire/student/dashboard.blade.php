<div class="p-lg-5 p-4">
    <div class="banner-bg">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 px-5 py-4">
                <p class="fs-13 light-dark">{{trans('student.dashboard.date')}}</p>
                <h3 class="text-white pt-lg-5 pt-2">{{trans('student.dashboard.name')}} {{ $full_name }}!</h3>
                <p class="light-dark fs-13 m-0">
                    {{ $email }}
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
                            <p class="m-0 liver-color fw-500">{{trans('student.dashboard.profile_Views')}}</p>
                            <h2 class="text-center liver-color">0</h2>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-4">
                    <a href="#" class="text-decoration-none">
                        <div class="card-shadow p-3">
                            <p class="m-0 liver-color fw-500">{{trans('student.dashboard.link_taps')}}</p>
                            <h2 class="text-center liver-color">0</h2>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-4">
                    <a href="#" class="text-decoration-none">
                        <div class="card-shadow p-3">
                            <p class="m-0 liver-color fw-500">{{trans('student.dashboard.leads')}}</p>
                            <h2 class="text-center liver-color">0</h2>
                        </div>
                    </a>
                </div>

                <div class="col-12">
                    <div class="card radius-20 shadow p-4 bg-white">
                        <h6>{{trans('student.dashboard.chart_leads')}}</h6>
                        <canvas id="myChart" width="717" height="358"
                            style="display: block; box-sizing: border-box; height: 358px; width: 717px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card-shadow p-lg-3 p-4">
                <p class="liver-color">{{trans('student.dashboard.top_taped_links')}}</p>
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
