<div>
    <div class="row g-4 mb-4">
        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Schools</h4>
                    <div class="stats-figure">{{ $totalSchools }}</div>
                </div>
                <a class="app-card-link-mask" href="#"></a>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Students</h4>
                    <div class="stats-figure">{{ $totalStudents }}</div>
                </div>
                <a class="app-card-link-mask" href="#"></a>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Platforms</h4>
                    <div class="stats-figure">{{ $totalPlatforms }}</div>
                </div>
                <a class="app-card-link-mask" href="#"></a>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Student Cards</h4>
                    <div class="stats-figure">{{ $totalCards }}</div>
                </div>
                <a class="app-card-link-mask" href="#"></a>
            </div>
        </div>
    </div>
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Schools</h1>
    </div>
    <br>
    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade active show" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">photo</th>
                                    <th class="cell">Name</th>
                                    <th class="cell">Email</th>
                                    <th class="cell">Created At</th>
                                    <th class="cell">Status</th>
                                    <th class="cell">Total Students</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schools as $school)
                                    <tr>
                                        <td class="cell">
                                            <img src="{{ $school->photo ? asset('storage/' . $school->photo) : asset('admin/images/school-avatar.png') }}" height="60" width="70" alt="">
                                        </td>
                                        <td class="cell">
                                            {{ $school->name }}
                                        </td>
                                        <td class="cell">{{ $school->email }}</td>
                                        <td class="cell"><span>17 Oct</span><span
                                                class="note">{{ defaultDateFormat($school->created_at) }}</span></td>
                                        <td class="cell">
                                            @if ($school->status)
                                                <span class="badge bg-success">
                                                    Active
                                                </span>
                                            @else
                                                <span class="badge bg-danger">
                                                    Not Active
                                                </span>
                                            @endif
                                        </td>
                                        <td class="cell">{{ $school->students_count }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <nav class="app-pagination">
                <ul class="pagination justify-content-center">
                    @if ($schools->onFirstPage())
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $schools->previousPageUrl() }}">Previous</a>
                        </li>
                    @endif
                    @foreach ($schools->links()->elements[0] as $page => $url)
                        <li class="page-item {{ $page == $schools->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
                    @if ($schools->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $schools->nextPageUrl() }}">Next</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Next</a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>


</div>
