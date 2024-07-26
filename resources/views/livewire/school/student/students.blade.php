<div>
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">{{ $heading }} ({{ $total }})</h1>
        </div>
        <div class="col-auto">
            <div class="page-utilities">
                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                    <div class="col-auto">
                        <form class="table-search-form row gx-1 align-items-center">
                            <div class="col-auto">
                                <input type="text" id="search-orders" wire:model.live="search"
                                    class="form-control search-orders" placeholder="Search">
                            </div>
                        </form>
                    </div>
                    <div class="col-auto">
                        <a class="btn app-btn-primary" href="{{ route('school.student.create') }}">
                            Create
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($students->count())
        <div class="tab-content" id="orders-table-tab-content">
            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table app-table-hover mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="cell">Photo</th>
                                        <th class="cell">Name</th>
                                        <th class="cell">Email</th>
                                        <th class="cell">Created At</th>
                                        <th class="cell">Platforms</th>
                                        <th class="cell">Status</th>
                                        {{-- <th class="cell">Total Cards</th> --}}
                                        <th class="cell"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td class="cell">
                                                <img src="{{ Storage::url($student->photo) }}" height="60"
                                                    width="70" alt="">
                                            </td>
                                            <td class="cell">
                                                <span class="truncate">
                                                    {{ $student->first_name . ' ' . $student->last_name }}
                                                </span>
                                            </td>
                                            <td class="cell">
                                                {{ $student->email }}
                                            </td>
                                            <td class="cell">
                                                {{ $student->created_at }}
                                            </td>
                                            <td class="cell">
                                                {{ $student->platforms_count }}
                                            </td>
                                            <td class="cell">
                                                @if ($student->status)
                                                    <span class="badge bg-success">
                                                        Active
                                                    </span>
                                                @else
                                                    <span class="badge bg-danger">
                                                        Not Active
                                                    </span>
                                                @endif

                                            </td>
                                            {{-- <td class="cell">
                                            0
                                        </td> --}}
                                            <td class="cell">
                                                <a class="btn btn-sm btn-success text-white"
                                                    href="{{ route('school.student.view', ['id' => $student->id]) }}">
                                                    View
                                                </a>
                                                @if ($student->status)
                                                    <button class="btn btn-sm btn-danger text-white"
                                                        wire:click="confirmDeactivateStudent({{ $student->id }})">
                                                        Deactivate
                                                    </button>
                                                @else
                                                    <button class="btn btn-sm btn-success text-white"
                                                        wire:click="confirmActivateStudent({{ $student->id }})">
                                                        Activate
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{ $students->links() }}

                {{-- <nav class="app-pagination">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav> --}}
            </div>
        </div>
    @else
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="card text-center">
                <div class="card-header">
                    Students Not Found
                </div>
            </div>
        </div>
    @endif

    <x-custom.confirm-popup :method="$method" :actionBtnText="$btnText" :actionBtnColor="$btnColor" :body="$body" />

    <script>
        document.addEventListener('confirm-popup', event => {
            $('#confirmPopup').modal('show')
        });

        document.addEventListener('swal:modal', event => {
            $('#confirmPopup').modal('hide');
            Swal.fire({
                title: event.detail[0].title,
                text: event.detail[0].text,
                icon: event.detail[0].icon
            });

        });
    </script>

</div>
