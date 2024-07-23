<div class="p-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            {{-- <a href="#" class="btn px-3 btn-hidden-menu">
                <img src="{{ asset('student/images/menu-icon.svg') }}" class="img-fluid" alt="">
            </a> --}}
            {{-- <a id="offcanvasTrigger" class="btn btn-menu" data-bs-toggle="offcanvas" href="#offcanvasExample"
                role="button" aria-controls="offcanvasExample">
                <img src="{{ asset('student/images/menu-icon.svg') }}" class="img-fluid menu-image" alt="">
            </a> --}}

            <div class="offcanvas offcanvas-start sidebar-bg" tabindex="-1" id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header mt-3 mx-3">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                        <a href="./dashboard.html">
                            <img src="{{ asset('student/images/sidebar-logo.svg') }}" class="img-fluid" alt="">
                        </a>
                    </h5>
                    <button type="button" class="btn-close text-white bg-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body py-0">
                    <div class="px-4">
                        <a href="./dashboard.html" class="text-decoration-none">
                            <div class="d-flex align-items-center gap-3 my-4">
                                <div>
                                    <img src="{{ asset('student/images/dashboard-icon.svg') }}" class="img-fluid"
                                        alt="">
                                </div>
                                <div>
                                    <p class="text-white m-0">Dashboard</p>
                                </div>
                            </div>
                        </a>
                        <a href="./profile.html" class="text-decoration-none">
                            <div class="d-flex align-items-center gap-3 my-4">
                                <div>
                                    <img src="{{ asset('student/images/profile-icon.svg') }}" class="img-fluid"
                                        alt="">
                                </div>
                                <div>
                                    <p class="sidebar-link m-0">Profile</p>
                                </div>
                            </div>
                        </a>
                        <a href="./share.html" class="text-decoration-none">
                            <div class="d-flex align-items-center gap-3 my-4">
                                <div>
                                    <img src="{{ asset('student/images/share-icon.svg') }}" class="img-fluid"
                                        alt="">
                                </div>
                                <div>
                                    <p class="sidebar-link m-0">Share</p>
                                </div>
                            </div>
                        </a>
                        <a href="./product.html" class="text-decoration-none">
                            <div class="d-flex align-items-center gap-3 my-4">
                                <div>
                                    <img src="{{ asset('student/images/product-icon.svg') }}" class="img-fluid"
                                        alt="">
                                </div>
                                <div>
                                    <p class="sidebar-link m-0">Product</p>
                                </div>
                            </div>
                        </a>
                        <a href="./notification.html" class="text-decoration-none">
                            <div class="d-flex gap-3 my-4">
                                <div>
                                    <img src="{{ asset('student/images/notification-icon.svg') }}" class="img-fluid"
                                        alt="">
                                </div>
                                <div>
                                    <p class="sidebar-link m-0">Notification</p>
                                </div>
                            </div>
                        </a>
                        <a href="./announcement.html" class="text-decoration-none">
                            <div class="d-flex gap-3 my-4">
                                <div>
                                    <img src="{{ asset('student/images/announcement-icon.svg') }}" class="img-fluid"
                                        alt="">
                                </div>
                                <div>
                                    <p class="sidebar-link m-0">Announcement</p>
                                </div>
                            </div>
                        </a>
                        <a href="./settings.html" class="text-decoration-none">
                            <div class="d-flex gap-3 my-4">
                                <div>
                                    <img src="{{ asset('student/images/settings-icon.svg') }}" class="img-fluid"
                                        alt="">
                                </div>
                                <div>
                                    <p class="sidebar-link m-0">Settings</p>
                                </div>
                            </div>
                        </a>
                        <a href="./settings.html" class="text-decoration-none">
                            <div class="d-flex gap-3 my-4">
                                <div>
                                    <img src="{{ asset('student/images/settings-icon.svg') }}" class="img-fluid"
                                        alt="">
                                </div>
                                <div>
                                    <p class="sidebar-link m-0">Settings</p>
                                </div>
                            </div>
                        </a>
                        <a href="./index.html" class="text-decoration-none position-absolute bottom-0">
                            <div class="d-flex gap-3 my-4">
                                <div>
                                    <img src="{{ asset('student/images/logout-icon.svg') }}" class="img-fluid"
                                        alt="">
                                </div>
                                <div>
                                    <p class="sidebar-link m-0">Logout</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="d-flex justify-content-between align-items-center gap-lg-5 gap-0">
                <div class="me-lg-5 me-4">
                    <div class="d-flex gap-2 align-items-center">
                        <div>
                            <div class="profile-picture">
                                <img src="https://img.freepik.com/free-photo/3d-illustration-teenager-with-funny-face-glasses_1142-50955.jpg?t=st=1716370291~exp=1716373891~hmac=fad32ad9d57ccce5539f45cc9ec53c2b9787ad6f5d8afa2ee78dca3275fa622b&amp;w=740"
                                    class="img-fluid rounded-circle" alt="">
                            </div>
                        </div>
                        <div>
                            <h6 class="m-0 fw-600">{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}
                            </h6>
                            <p class="m-0 text-secondary fs-13">
                                {{ auth()->user()->email }}
                            </p>
                        </div>
                    </div>
                </div>
                <div>
                    <a href="./notification.html">
                        <div class="position-relative">
                            <img src="{{ asset('student/images/bell-icon.svg') }}" class="img-fluid" alt="">
                            <div class="position-absolute bottom-0">
                                <img src="{{ asset('student/images/red-circle.svg') }}" class="img-fluid"
                                    alt="">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
