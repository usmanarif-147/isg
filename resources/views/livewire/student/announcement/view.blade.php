<div class="p-lg-5 p-3">
    <div wire:ignore.self class="modal fade" id="announcementModal" data-bs-backdrop="static" aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ $title }}
                        {{ $date }}
                    </h5>
                    <button type="button" class="btn-close" aria-label="Close" wire:click="closeModal"></button>
                </div>
                <div class="modal-body">
                    {{ $message }}
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="text-end">
        <button class="btn marks-as-read-text fw-500">
            Mark all as read
        </button>
    </div> --}}
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-pills mb-3 custom-nav" id="pills-tab" role="tablist">
                <li class="nav-item custom-nav-item" role="presentation">
                    <button type="button" class="nav-link {{ $tab == 1 ? 'active' : '' }} custom-nav-link fw-600"
                        wire:click="getNewAnnouncements">
                        New
                        @if ($totalNewAnnouncements)
                            <span class="text-danger fw-bold">
                                ({{ $totalNewAnnouncements }})
                            </span>
                        @endif
                    </button>
                </li>
                <li class="nav-item custom-nav-item" role="presentation">
                    <button type="button" class="nav-link {{ $tab == 2 ? 'active' : '' }} custom-nav-link fw-600 px-5"
                        wire:click="getOldAnnouncements">
                        Old
                        @if ($totalOldAnnouncements)
                            <span class="text-danger fw-bold">
                                ({{ $totalOldAnnouncements }})
                            </span>
                        @endif
                    </button>
                </li>
            </ul>
            <hr>
            <div class="tab-content custom-tab-content">
                <div class="tab-pane fade {{ $tab == 1 ? 'show active' : '' }}">
                    <div class="my-4">
                        @if ($totalNewAnnouncements)
                            @foreach ($newAnnouncements as $announcement)
                                <div class="border border-1 border-dark p-4 radius-20 my-3">
                                    <div class="row align-items-center">
                                        <h6 class="fw-700">
                                            {{ $announcement->title }}
                                        </h6>
                                        <p class="m-0">
                                            <span>
                                                {{ substr($announcement->message, 0, 10) }}...
                                            </span>
                                            <a href="javascript:void(0)" class="m-3"
                                                wire:click="markAsRead('{{ $announcement->id }}')">
                                                Read
                                            </a>
                                        </p>
                                        <p class="text-end m-0"> {{ defaultDateFormat($announcement->created_at) }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="border border-1 border-dark p-4 radius-20 my-3">
                                <div class="row align-items-center">
                                    No New Announcement Available
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="tab-pane fade {{ $tab == 2 ? 'show active' : '' }}">
                    <div class="my-4">
                        @if ($totalOldAnnouncements)
                            @foreach ($oldAnnouncements as $announcement)
                                <div class="border border-1 border-dark p-4 radius-20 my-3">
                                    <div class="row align-items-center">
                                        <h6 class="fw-700">

                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    {{ $announcement->title }}
                                                </div>
                                                <div>
                                                    <button class="btn btn-sm btn-danger"
                                                        wire:click="remove('{{ $announcement->id }}')">
                                                        Remove
                                                    </button>
                                                </div>
                                            </div>
                                        </h6>
                                        <p class="m-0">
                                            <span>
                                                {{ substr($announcement->message, 0, 10) }}...
                                            </span>
                                            <a href="javascript:void(0)" class="m-3"
                                                wire:click="read('{{ $announcement->id }}')">
                                                Read
                                            </a>
                                        </p>
                                        <p class="text-end m-0"> {{ defaultDateFormat($announcement->created_at) }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="border border-1 border-dark p-4 radius-20 my-3">
                                <div class="row align-items-center">
                                    No Old Announcement Available
                                </div>
                            </div>
                        @endif

                        {{-- <div class="bg-notification p-4 radius-20 my-3">
                            <div class="row align-items-center">
                                <div class="d-flex gap-4">
                                    <div>
                                        <h6 class="fw-700">Exams Announcement</h6>
                                    </div>
                                    <div>
                                        <h6 class="text-green fw-700">New</h6>
                                    </div>
                                </div>
                                <p class="m-0">
                                    There are many variations of passages of Lorem
                                    Ipsum available, but the majority have suffered
                                    alteration in some form, by injected humour, or
                                    randomised words which don't look even slightly
                                    believable. If you are going to use a passage of
                                    Lorem Ipsum, you need to be sure there isn't
                                    anything embarrassing hidden in the middle of
                                    text. All the Lorem Ipsum generators on the
                                    Internet tend to repeat predefined chunks as
                                    necessary, making this the first true generator on
                                    the Internet. It uses a dictionary of over 200
                                    Latin words, combined with a handful of model
                                    sentence structures, to generate Lorem Ipsum which
                                    looks reasonable. The generated Lorem Ipsum is
                                    therefore always free from repetition, injected
                                    humour, or non-characteristic words etc.
                                </p>
                                <p class="text-end m-0">24/02/2024</p>
                            </div>
                        </div>
                        <div class="bg-notification p-4 radius-20 my-3">
                            <div class="row align-items-center">
                                <div class="d-flex gap-4">
                                    <div>
                                        <h6 class="fw-700">Exams Announcement</h6>
                                    </div>
                                    <div>
                                        <h6 class="text-green fw-700">New</h6>
                                    </div>
                                </div>
                                <p class="m-0">
                                    There are many variations of passages of Lorem
                                    Ipsum available, but the majority have suffered
                                    alteration in some form, by injected humour, or
                                    randomised words which don't look even slightly
                                    believable. If you are going to use a passage of
                                    Lorem Ipsum, you need to be sure there isn't
                                    anything embarrassing hidden in the middle of
                                    text. All the Lorem Ipsum generators on the
                                    Internet tend to repeat predefined chunks as
                                    necessary, making this the first true generator on
                                    the Internet. It uses a dictionary of over 200
                                    Latin words, combined with a handful of model
                                    sentence structures, to generate Lorem Ipsum which
                                    looks reasonable. The generated Lorem Ipsum is
                                    therefore always free from repetition, injected
                                    humour, or non-characteristic words etc.
                                </p>
                                <p class="text-end m-0">24/02/2024</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('read-announcement', event => {
            $('#announcementModal').modal('show');
        });
        document.addEventListener('close-modal', event => {
            $('#announcementModal').modal('hide');
        });
    </script>

</div>
