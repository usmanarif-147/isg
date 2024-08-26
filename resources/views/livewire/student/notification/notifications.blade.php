<div>

    <div class="p-lg-5 p-3">
        <div class="text-end">
            <button class="btn marks-as-read-text fw-500">
                {{ trans('student.notification.read_button')}}
            </button>
        </div>
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills mb-3 custom-nav" id="pills-tab" role="tablist">
                    <li class="nav-item custom-nav-item" role="presentation">
                        <button class="nav-link active custom-nav-link fw-600" wire:click="showAllNotifications">
                            {{trans('student.notification.all_button')}}
                        </button>
                    </li>
                </ul>
                <hr>
                <div class="tab-content custom-tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active">
                        @if ($notifications->count())
                            @foreach ($notifications as $notification)
                                <div class="my-4">
                                    <div class="border border-1 border-dark p-3 rounded-3 my-3">
                                        <div class="row align-items-center">
                                            <div class="col-lg-1 col-2">
                                                <div class="bg-bell p-lg-3 p-1 rounded-3">
                                                    <img src="{{ asset('student/images/announcement-bell-icon.svg') }}"
                                                        class="img-fluid" alt="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-5">
                                                <h6 class="fw-600 text-truncate">
                                                    {{ $notification->data['title'] }}
                                                </h6>
                                                <p class="fs-13 m-0 text-truncate">
                                                    {{ $notification->data['message'] }}
                                                </p>
                                            </div>
                                            <div class="col-lg-4 col-3">
                                                <div class="text-center">
                                                    <p class="m-0 text-secondary text-truncate">
                                                        {{ defaultDateFormat($notification->created_at) }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-1 col-2">
                                                <div class="dropdown">
                                                    <button class="btn" type="button" id="dropdownMenuButton1"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <img src="{{ asset('student/images/dropdown-dots.svg') }}"
                                                            class="img-fluid" alt="">
                                                    </button>
                                                    <ul class="dropdown-menu shadow"
                                                        aria-labelledby="dropdownMenuButton1">
                                                        <li>
                                                            <button type="button" class="dropdown-item"
                                                                wire:click="deleteNotification('{{ $notification->id }}')">
                                                                {{trans('student.notification.remove_button')}}
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div>
                               {{trans('student.notification.not_found')}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
