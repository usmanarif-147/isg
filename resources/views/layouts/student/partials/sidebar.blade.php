<div class="col-12 col-lg-2 p-0">
    <div class="min-vh-100 sidebar">
        <div class="text-center py-5">
            <a href="javascript:void(0)">
                <img src="{{ asset('student/images/sidebar-logo.svg') }}" class="img-fluid" alt="">
            </a>
        </div>
        <div class="px-4">
            <a href="{{ route('student.dashboard') }}" class="text-decoration-none">
                <div class="d-flex align-items-center gap-3 my-4">
                    @if (request()->segment(1) == 'dashboard')
                        <div>
                            <img src="{{ asset('student/images/dashboard-icon.svg') }}" class="img-fluid"
                                alt="">
                        </div>
                    @else
                        <div>
                            <img src="{{ asset('student/images/dashboard-icon-light.svg') }}" class="img-fluid"
                                alt="">
                        </div>
                    @endif
                    <div>
                        <p class="{{ request()->segment(1) == 'dashboard' ? 'text-white' : 'sidebar-link' }} m-0">
                            Dashboard
                        </p>
                    </div>
                </div>
            </a>
            <a href="{{ route('student.profile') }}" class="text-decoration-none">
                <div class="d-flex align-items-center gap-3 my-4">
                    @if (request()->segment(1) == 'profile')
                        <div>
                            <img src="{{ asset('student/images/profile-icon-white.svg') }}" class="img-fluid"
                                alt="">
                        </div>
                    @else
                        <div>
                            <img src="{{ asset('student/images/profile-icon.svg') }}" class="img-fluid" alt="">
                        </div>
                    @endif
                    <div>
                        <p class="{{ request()->segment(1) == 'profile' ? 'text-white' : 'sidebar-link' }} m-0">
                            Profile
                        </p>
                    </div>
                </div>
            </a>
            <a href="{{ route('student.share') }}" class="text-decoration-none">
                <div class="d-flex align-items-center gap-3 my-4">
                    @if (request()->segment(1) == 'share')
                        <div>
                            <img src="{{ asset('student/images/share-icon-white.svg') }}" class="img-fluid"
                                alt="">
                        </div>
                    @else
                        <div>
                            <img src="{{ asset('student/images/share-icon.svg') }}" class="img-fluid" alt="">
                        </div>
                    @endif
                    <div>
                        <p class="{{ request()->segment(1) == 'share' ? 'text-white' : 'sidebar-link' }} m-0">
                            Share
                        </p>
                    </div>
                </div>
            </a>
            <a href="{{ route('student.product') }}" class="text-decoration-none">
                <div class="d-flex align-items-center gap-3 my-4">
                    @if (request()->segment(1) == 'product')
                        <div>
                            <img src="{{ asset('student/images/product-icon-white.svg') }}" class="img-fluid"
                                alt="">
                        </div>
                    @else
                        <div>
                            <img src="{{ asset('student/images/product-icon.svg') }}" class="img-fluid" alt="">
                        </div>
                    @endif
                    <div>
                        <p class="{{ request()->segment(1) == 'product' ? 'text-white' : 'sidebar-link' }} m-0">
                            Product
                        </p>
                    </div>
                </div>
            </a>
            <a href="{{ route('student.notification') }}" class="text-decoration-none">
                <div class="d-flex gap-3 my-4">
                    @if (request()->segment(1) == 'notification')
                        <div>
                            <img src="{{ asset('student/images/notification-icon-white.svg') }}" class="img-fluid"
                                alt="">
                        </div>
                    @else
                        <div>
                            <img src="{{ asset('student/images/notification-icon.svg') }}" class="img-fluid"
                                alt="">
                        </div>
                    @endif
                    <div>
                        <p class="{{ request()->segment(1) == 'notification' ? 'text-white' : 'sidebar-link' }} m-0">
                            Notification
                        </p>
                    </div>
                </div>
            </a>
            <a href="{{ route('student.announcement') }}" class="text-decoration-none">
                <div class="d-flex gap-3 my-4">
                    @if (request()->segment(1) == 'announcement')
                        <div>
                            <img src="{{ asset('student/images/announcement-icon-white.svg') }}" class="img-fluid"
                                alt="">
                        </div>
                    @else
                        <div>
                            <img src="{{ asset('student/images/announcement-icon.svg') }}" class="img-fluid"
                                alt="">
                        </div>
                    @endif
                    <div>
                        <p class="{{ request()->segment(1) == 'announcement' ? 'text-white' : 'sidebar-link' }} m-0">
                            Announcement
                        </p>
                    </div>
                </div>
            </a>
            <a href="{{ route('student.setting') }}" class="text-decoration-none">
                <div class="d-flex gap-3 my-4">
                    @if (request()->segment(1) == 'setting')
                        <div>
                            <img src="{{ asset('student/images/settings-icon-white.svg') }}" class="img-fluid"
                                alt="">
                        </div>
                    @else
                        <div>
                            <img src="{{ asset('student/images/settings-icon.svg') }}" class="img-fluid"
                                alt="">
                        </div>
                    @endif
                    <div>
                        <p class="{{ request()->segment(1) == 'setting' ? 'text-white' : 'sidebar-link' }} m-0">
                            Settings
                        </p>
                    </div>
                </div>
            </a>
            <form method="POST" action="{{ route('student.logout') }}">
                @csrf
                <a href="{{ route('student.logout') }}" class="text-decoration-none"
                    onclick="event.preventDefault();
                this.closest('form').submit();">
                    <div class="d-flex gap-3 my-4">
                        <div>
                            <img src="{{ asset('student/images/logout-icon.svg') }}" class="img-fluid" alt="">
                        </div>
                        <div>
                            <p class="sidebar-link m-0">
                                Logout
                            </p>
                        </div>
                    </div>
                </a>
            </form>
        </div>
    </div>
</div>