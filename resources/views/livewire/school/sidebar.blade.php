<div class="sidepanel-inner d-flex flex-column">
    <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">×</a>
    <div class="app-branding">
        <a class="app-logo" href="#">
            <img class="logo-icon me-2" src="{{ asset('admin/images/app-logo.svg') }}" alt="logo">
            <span class="logo-text">
                PORTAL
            </span>
        </a>
    </div>
    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
        <ul class="app-menu list-unstyled accordion" id="menu-accordion">
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('school.dashboard') ? 'active' : '' }}"
                    href="{{ route('school.dashboard') }}">
                    <span class="nav-icon">
                        <i class="fa-solid fa-gauge fs-5"></i>
                    </span>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('school.students', 'school.student.create', 'school.student.view') ? 'active' : '' }}"
                    href="{{ route('school.students') }}">
                    <span class="nav-icon">
                        <i class="fa-solid fa-graduation-cap fs-5"></i>
                    </span>
                    <span class="nav-link-text">Students</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('school.announcements', 'school.announcement.create', 'school.announcement.edit') ? 'active' : '' }}"
                    href="{{ route('school.announcements') }}">
                    <span class="nav-icon">
                        <i class="fa-solid fa-volume-high fs-5"></i>
                    </span>
                    <span class="nav-link-text">Announcements</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('school.cards') ? 'active' : '' }}"
                    href="{{ route('school.cards') }}">
                    <span class="nav-icon">
                        <i class="fa-solid fa-address-card fs-5"></i>
                    </span>
                    <span class="nav-link-text">
                        Cards
                    </span>
                    @if ($pending)
                        <span class="submenu-arrow">
                            <span class="badge text-bg-warning">
                                {{ $pending }}
                            </span>
                        </span>
                    @endif
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('school.studentRequests') ? 'active' : '' }}"
                    href="{{ route('school.studentRequests') }}">
                    <span class="nav-icon">
                        <i class="fa-solid fa-bullhorn fs-5"></i>
                    </span>
                    <span class="nav-link-text">
                        Student Requests
                    </span>
                    @if ($requestPending)
                        <span class="submenu-arrow">
                            <span class="badge text-bg-warning">
                                {{ $requestPending }}
                            </span>
                        </span>
                    @endif
                </a>
            </li>
            <li class="nav-item has-submenu">
                <a class="nav-link submenu-toggle {{ Request::routeIs('school.change.password', 'school.roll.number', 'school.template') ? 'text-success' : '' }}"
                    href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2"
                    aria-expanded="{{ Request::routeIs('school.change.password', 'school.roll.number', 'school.template') ? 'true' : 'false' }}"
                    aria-controls="submenu-2">
                    <span class="nav-icon">
                        <i class="fa-solid fa-sliders fs-5"></i>
                    </span>
                    <span class="nav-link-text">Settings</span>
                    <span class="submenu-arrow">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z">
                            </path>
                        </svg>
                    </span>
                </a>
                <div id="submenu-2"
                    class="collapse submenu submenu-2 {{ Request::routeIs('school.change.password', 'school.roll.number', 'school.template') ? 'show' : '' }}"
                    data-bs-parent="#menu-accordion">
                    <ul class="submenu-list list-unstyled">
                        <li class="submenu-item">
                            <a class="submenu-link {{ Request::routeIs('school.change.password') ? 'active text-success' : '' }}"
                                href="{{ route('school.change.password') }}">
                                Change Password
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a class="submenu-link {{ Request::routeIs('school.roll.number') ? 'active text-success' : '' }}"
                                href="{{ route('school.roll.number') }}">
                                Set Roll Number Prefix
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a class="submenu-link {{ Request::routeIs('school.template') ? 'active text-success' : '' }}"
                                href="{{ route('school.template') }}">
                                Template
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
</div>
