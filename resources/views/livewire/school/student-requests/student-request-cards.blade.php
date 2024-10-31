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
                </div>
            </div>
        </div>
    </div>

    @if ($studentRequests->count())
        <div class="tab-content" id="orders-table-tab-content">
            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table app-table-hover mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="cell">Student Name</th>
                                        <th class="cell">Request</th>
                                        <th class="cell">Created At</th>
                                        <th class="cell">Status</th>
                                        <th class="cell"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($studentRequests as $request)
                                        <tr>
                                            <td class="cell">
                                                <span class="truncate">
                                                    {{ $request->student->first_name . ' ' . $request->student->last_name }}
                                                </span>
                                            </td>
                                            <td class="cell">
                                                {{ $request->request_type }}
                                            </td>
                                            <td class="cell">
                                                {{ defaultDateFormat($request->created_at) }}
                                            </td>
                                            <td class="cell">
                                                @if ($request->status == 0)
                                                    <span class="badge bg-warning">
                                                        Pending
                                                    </span>
                                                @elseif($request->status == 1)
                                                    <span class="badge bg-success">
                                                        Accept
                                                    </span>
                                                @else
                                                    <span class="badge bg-danger">
                                                        Reject
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="cell">
                                                @if ($request->status == 0)
                                                    <button class="btn btn-sm btn-danger text-white"
                                                        wire:click="RejectRequestCard({{ $request->id }}, {{ $request->student_id }}, {{ $request->card_id }}, '{{ $request->request_type }}')">
                                                        Reject
                                                    </button>
                                                    <button class="btn btn-sm btn-success text-white"
                                                        wire:click="AcceptRequestCard({{ $request->id }}, {{ $request->student_id }}, {{ $request->card_id }}, '{{ $request->request_type }}')">
                                                        Accept
                                                    </button>
                                                @elseif ($request->status == 1)
                                                    <span class="badge bg-success">
                                                        Request Accept
                                                    </span>
                                                @else
                                                    <span class="badge bg-secondary">
                                                        Request Rejected
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{ $studentRequests->links() }}
            </div>
        </div>
    @else
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="card text-center">
                <div class="card-header">
                    Requests Not Found
                </div>
            </div>
        </div>
    @endif
    <x-custom.confirm-popup :method="$method" :actionBtnText="$btnText" :actionBtnColor="$btnColor" :body="$body" />
    <div wire:ignore.self class="modal fade" id="reasonPopup" tabindex="-1" aria-labelledby="reasonPopupLabel"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <form wire:submit.prevent="RequestReject">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="reasonPopupLabel">Reason For Reject Request Card</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">
                                Enter Reason
                                <span class="text-danger">*</span>
                                <span class="text-danger">
                                    @error('reason')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <textarea class="form-control" wire:model.live="reason" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        window.addEventListener('confirm-popup', event => {
            $('#confirmPopup').modal('show')
        });

        window.addEventListener('reason-popup', event => {
            $('#confirmPopup').modal('hide')
            $('#reasonPopup').modal('show')
        });

        window.addEventListener('swal:modal', event => {
            $('#confirmPopup').modal('hide');
            $('#reasonPopup').modal('hide')
            Swal.fire({
                title: event.detail[0].title,
                text: event.detail[0].text,
                icon: event.detail[0].icon
            });

        });
    </script>
</div>
