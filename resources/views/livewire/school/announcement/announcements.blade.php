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
                        <a class="btn app-btn-primary" href="{{ route('school.announcement.create') }}">
                            Create
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($announcements->count())
        <div class="tab-content" id="orders-table-tab-content">
            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table app-table-hover mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="cell">Title</th>
                                        <th class="cell">Message</th>
                                        <th class="cell"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($announcements as $announcement)
                                        <tr>
                                            <td class="cell">
                                                {{ $announcement->title }}
                                            </td>
                                            <td class="cell">
                                                {{ $announcement->message }}
                                            </td>
                                            <td class="cell">
                                                <a class="btn btn-sm btn-success text-white"
                                                    href="{{ route('school.announcement.edit', ['id' => $announcement->id]) }}">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{ $announcements->links() }}
            </div>
        </div>
    @else
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="card text-center">
                <div class="card-header">
                    Announcements Not Found
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
