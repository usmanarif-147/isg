<div class="p-lg-5 p-4">
    <div class="banner-bg">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 px-5 py-4">
                <p class="fs-13 light-dark">{{ $created_at->format(trans('student.dashboard.date_format')) }}</p>
                <h3 class="text-white pt-lg-5 pt-2">{{ trans('student.dashboard.name') }} {{ $full_name }}!</h3>
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
                        <div class="card-shadow p-3" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="{{ $totalClicks }}">
                            <p class="m-0 liver-color fw-500">{{ trans('student.dashboard.profile_Views') }}</p>
                            <h2 class="text-center liver-color">{{ $totalClicks > 99 ? '99+' : $totalClicks }}</h2>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-4">
                    <a href="#" class="text-decoration-none">
                        <div class="card-shadow p-3" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="{{ $totalPlatformClicks }}">
                            <p class="m-0 liver-color fw-500">{{ trans('student.dashboard.link_taps') }}</p>
                            <h2 class="text-center liver-color">
                                {{ $totalPlatformClicks > 99 ? '99+' : $totalPlatformClicks }}</h2>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-4">
                    <a href="#" class="text-decoration-none">
                        <div class="card-shadow p-3">
                            <p class="m-0 liver-color fw-500">{{ trans('student.dashboard.leads') }}</p>
                            <h2 class="text-center liver-color">0</h2>
                        </div>
                    </a>
                </div>

                <div class="col-12">
                    <div class="card radius-20 shadow p-4 bg-white">
                        <h6>{{ trans('student.dashboard.chart_views') }}</h6>
                        <canvas id="myChart" width="717" height="358"
                            style="display: block; box-sizing: border-box; height: 358px; width: 717px;"></canvas>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card radius-20 shadow p-4 bg-white">
                        <h6>{{ trans('student.dashboard.chart_views_monthly') }}</h6>
                        <canvas id="myChartMonth" style="display: block; box-sizing: border-box;"></canvas>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card radius-20 shadow p-4 bg-white">
                        <h6>{{ trans('student.dashboard.chart_views_yearly') }}</h6>
                        <canvas id="myChartYear" style="display: block; box-sizing: border-box;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card-shadow p-lg-3 p-4">
                <p class="liver-color">{{ trans('student.dashboard.top_taped_links') }}</p>
                @foreach ($activePlatforms as $platform)
                    <div class="d-flex justify-content-between align-items-center my-3">
                        <div>
                            <img src="{{ asset(Storage::url($platform->icon)) }}" class="img-fluid" width="40"
                                height="40" alt="">
                        </div>
                        <div>
                            <span class="badge bg-dark m-0">
                                {{ $platform->clicks > 99 ? '99+' : $platform->clicks }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @section('script')
        <script>
            const ctx = document.getElementById("myChart");

            new Chart(ctx, {
                type: "bar",
                data: {
                    labels: @json($labels),
                    datasets: [{
                        label: "{{ trans('student.dashboard.profile_Views') }}",
                        data: @json($data),
                        borderWidth: 1,
                    }, ],
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1, // Set this to 1 to only show whole numbers
                                callback: function(value) {
                                    return Number.isInteger(value) ? value : null;
                                }
                            },
                        },
                    },
                },
            });
        </script>
        <script>
            const ctx1 = document.getElementById("myChartMonth").getContext("2d");
            new Chart(ctx1, {
                type: "pie",
                data: {
                    labels: @json($labelsMonth),
                    datasets: [{
                        label: "{{ trans('student.dashboard.profile_Views') }}",
                        data: @json($dataMonth),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)',
                            'rgba(199, 199, 199, 0.6)',
                            'rgba(83, 102, 255, 0.6)',
                            'rgba(223, 159, 64, 0.6)',
                            'rgba(135, 206, 235, 0.6)',
                            'rgba(220, 20, 60, 0.6)',
                            'rgba(240, 230, 140, 0.6)'
                        ],
                        borderWidth: 1,
                    }],
                },
                options: {
                    responsive: true,
                },
            });
        </script>
        <script>
            const ctx2 = document.getElementById("myChartYear").getContext("2d");
            new Chart(ctx2, {
                type: "doughnut",
                data: {
                    labels: @json($labelsYearly),
                    datasets: [{
                        label: "{{ trans('student.dashboard.profile_Views') }}",
                        data: @json($dataYearly),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)',
                            'rgba(199, 199, 199, 0.6)',
                            'rgba(83, 102, 255, 0.6)',
                            'rgba(223, 159, 64, 0.6)',
                            'rgba(135, 206, 235, 0.6)',
                            'rgba(220, 20, 60, 0.6)',
                            'rgba(240, 230, 140, 0.6)'
                        ],
                        borderWidth: 1,
                    }],
                },
                options: {
                    responsive: true,
                },
            });
        </script>
    @endsection
</div>
