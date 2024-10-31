<div>
    <div class="row g-4 mb-4">
        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Students</h4>
                    <div class="stats-figure">{{ $totalStudents }}</div>
                </div>
                <a class="app-card-link-mask" href="{{ route('school.students') }}"></a>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Platforms</h4>
                    <div class="stats-figure">{{ $totalPlatforms }}</div>
                </div>
                {{-- <a class="app-card-link-mask" href="#"></a> --}}
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Student Cards</h4>
                    <div class="stats-figure">{{ $totalCards }}</div>
                </div>
                <a class="app-card-link-mask" href="{{ route('school.cards') }}"></a>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Announcements</h4>
                    <div class="stats-figure">{{ $totalAnnouncements }}</div>
                </div>
                <a class="app-card-link-mask" href="{{ route('school.announcements') }}"></a>
            </div>
        </div>
    </div>
    <div class="row my-lg-5 my-3 g-3">
        <div class="col-12">
            <div class="row gy-3">
                <div class="col-12">
                    <div class="card radius-20 shadow p-4 bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Students Registration</h5>
                            <select wire:model.live="timeframe" class="form-select form-select-sm w-auto">
                                <option value="weekly">Weekly</option>
                                <option value="monthly">Monthly</option>
                                <option value="yearly">Yearly</option>
                            </select>
                        </div>
                        <canvas id="studentsChart" width="717" height="358"
                            style="display: block; box-sizing: border-box; height: 358px; width: 717px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row gy-3">
                <div class="col-12">
                    <div class="card radius-20 shadow p-4 bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Top Profile View Students</h5>
                        </div>
                        <canvas id="topStudentsChart" width="717" height="358"
                            style="display: block; box-sizing: border-box; height: 358px; width: 717px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('script')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctx1 = document.getElementById('studentsChart').getContext('2d');

                // Initialize the Chart
                let studentsChart = new Chart(ctx1, {
                    type: 'line',
                    data: {
                        labels: [],
                        datasets: [{
                            label: 'Student Registrations',
                            data: [],
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderWidth: 1,
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                type: 'time',
                                time: {
                                    unit: 'day'
                                },
                                title: {
                                    display: true,
                                    text: 'Date'
                                }
                            },
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Registrations'
                                },
                                ticks: {
                                    stepSize: 1,
                                    callback: function(value) {
                                        return Number.isInteger(value) ? value : null;
                                    }
                                },
                            }
                        }
                    }
                });

                // Listen for Livewire events to update the chart
                window.addEventListener('refreshChart', event => {
                    const data = event.detail[0].data;
                    if (data && Array.isArray(data)) {
                        const labels = data.map(item => item.date);
                        const counts = data.map(item => item.count);

                        studentsChart.data.labels = labels;
                        studentsChart.data.datasets[0].data = counts;
                        studentsChart.update();
                    } else {
                        console.error("Data for chart update is missing or not an array");
                    }
                });

                const canvas = document.getElementById('topStudentsChart');
                const ctx = canvas.getContext('2d');

                const chartData = @json($chartData);

                // Custom plugin to draw images next to labels
                const imagePlugin = {
                    id: 'imagePlugin',
                    afterDatasetsDraw: function(chart) {
                        const ctx = chart.ctx;
                        const meta = chart.getDatasetMeta(0);

                        const imgSize = 30;
                        chartData.photos.forEach(function(photoUrl, index) {
                            const dataPoint = meta.data[index];
                            const img = new Image();
                            img.src = photoUrl;
                            img.onload = function() {
                                const position = dataPoint
                                    .tooltipPosition();
                                const x = position.x - (imgSize - 8);
                                const y = chart.chartArea.bottom - 25;

                                // Create a circular clipping path
                                ctx.save();
                                ctx.beginPath();
                                ctx.arc(x + imgSize / 2, y + imgSize / 2, imgSize / 2, 0, Math.PI *
                                    2);
                                ctx.closePath();
                                ctx.clip(); // Clip to the circular area

                                // Draw the image
                                ctx.drawImage(img, x, y, imgSize, imgSize);
                                ctx.restore(); // Restore the context
                            };
                        });
                    }
                };

                // Create the chart
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: chartData.labels,
                        datasets: [{
                            label: 'Total views',
                            data: chartData.data,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                            },
                            x: {
                                ticks: {
                                    autoSkip: false // Ensure all labels are displayed
                                }
                            }
                        }
                    },
                    plugins: [imagePlugin] // Add the custom image plugin
                });
            });
        </script>
    @endsection
</div>
