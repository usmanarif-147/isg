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
                        <select class="form-select w-auto">
                            <option selected="" value="option-1">All</option>
                            <option value="option-2">This week</option>
                            <option value="option-3">This month</option>
                            <option value="option-4">Last 3 months</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        {{-- <a class="btn app-btn-secondary" href="#">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z">
                                </path>
                                <path fill-rule="evenodd"
                                    d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z">
                                </path>
                            </svg>
                            Download CSV
                        </a> --}}
                        <a class="btn app-btn-primary" href="{{ route('school.student.create') }}">
                            Create
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4"
        role="tablist">
        <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab"
            href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">
            All
        </a>
        <a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid"
            role="tab" aria-controls="orders-paid" aria-selected="false" tabindex="-1">
            Paid
        </a>
        <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab"
            href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false" tabindex="-1">
            Pending
        </a>
        <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab"
            href="#orders-cancelled" role="tab" aria-controls="orders-cancelled" aria-selected="false"
            tabindex="-1">
            Cancelled
        </a>
    </nav> --}}

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
                                            <img src="{{ Storage::url($student->photo) }}" height="60" width="70"
                                                alt="">
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
