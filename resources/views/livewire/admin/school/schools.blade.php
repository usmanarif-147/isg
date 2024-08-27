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
                        <select class="form-select w-auto" wire:model.live="status">
                            <option value="">Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
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
                        <a class="btn app-btn-primary" href="{{ route('admin.school.create') }}">
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

        @if ($schools->count())
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
                                    <th class="cell">Status</th>
                                    <th class="cell">Total Students</th>
                                    <th class="cell"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schools as $school)
                                    <tr>
                                        <td class="cell">
                                            <img src="{{ $school->photo ? asset('storage/' . $school->photo) : asset('admin/images/school-avatar.png') }}"
                                                height="60" width="70" alt="">
                                        </td>
                                        <td class="cell">
                                            <span class="truncate">
                                                {{ $school->name }}
                                            </span>
                                        </td>
                                        <td class="cell">
                                            {{ $school->email }}
                                        </td>
                                        <td class="cell">
                                            {{ defaultDateFormat($school->created_at) }}
                                        </td>
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
                                        <td class="cell">
                                            {{ $school->students_count }}
                                        </td>
                                        <td class="cell">
                                            <a class="btn btn-sm btn-success text-white"
                                                href="{{ route('admin.school.view', ['id' => $school->id]) }}">
                                                View
                                            </a>
                                            @if ($school->status)
                                                <button class="btn btn-sm btn-danger text-white"
                                                    wire:click="confirmDeactivateSchool({{ $school->id }})">
                                                    Deactivate
                                                </button>
                                            @else
                                                <button class="btn btn-sm btn-success text-white"
                                                    wire:click="confirmActivateSchool({{ $school->id }})">
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
            {{ $schools->links() }}
        @else
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="card text-center">
                    <div class="card-header">
                        School Not Found
                    </div>
                </div>
            </div>
        @endif
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
