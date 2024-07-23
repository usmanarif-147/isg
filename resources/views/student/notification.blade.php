@extends('layouts.student.app')

@section('content')
    <div class="p-lg-5 p-3">
        <div class="text-end">
            <button class="btn marks-as-read-text fw-500">
                Mark all as read
            </button>
        </div>
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills mb-3 custom-nav" id="pills-tab" role="tablist">
                    <li class="nav-item custom-nav-item" role="presentation">
                        <button class="nav-link active custom-nav-link fw-600" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">
                            All
                        </button>
                    </li>
                    <li class="nav-item custom-nav-item" role="presentation">
                        <button class="nav-link custom-nav-link fw-600 px-5" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">
                            New
                        </button>
                    </li>
                </ul>
                <hr>
                <div class="tab-content custom-tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="my-4">
                            <div class="bg-notification p-3 rounded-3 my-3">
                                <div class="row align-items-center">
                                    <div class="col-lg-1 col-2">
                                        <div class="user-avatar">
                                            <img src="https://img.freepik.com/free-psd/3d-illustration-human-avatar-profile_23-2150671142.jpg?t=st=1716560520~exp=1716564120~hmac=ded0fb126c8d1837579dae8f33aef902f1bc8fdb27e76a4410d62d5a78fc1d0e&amp;w=740"
                                                class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-5">
                                        <h6 class="fw-600 text-truncate">
                                            Luke tap your card
                                        </h6>
                                        <p class="fs-13 m-0 text-truncate">
                                            It is a long established fact that a reader will
                                            be distracted by the readable It is a long
                                            established fact that a reader will be
                                            distracted by the readable content of a page
                                            when looking at its layouts
                                        </p>
                                    </div>
                                    <div class="col-lg-3 col-3">
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-new text-white">
                                                New
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-2">
                                        <div class="dropdown">
                                            <button class="btn" type="button" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="{{ asset('student/images/dropdown-dots.svg') }}" class="img-fluid"
                                                    alt="">
                                            </button>
                                            <ul class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton1">
                                                <li>
                                                    <a class="dropdown-item" href="#">Remove</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-1 border-dark p-3 rounded-3 my-3">
                                <div class="row align-items-center">
                                    <div class="col-lg-1 col-2">
                                        <div class="bg-bell p-lg-3 p-1 rounded-3">
                                            <img src="{{ asset('student/images/announcement-bell-icon.svg') }}"
                                                class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-5">
                                        <h6 class="fw-600 text-truncate">Announcement</h6>
                                        <p class="fs-13 m-0 text-truncate">
                                            It is a long established fact that a reader will
                                            be distracted by the readable
                                        </p>
                                    </div>
                                    <div class="col-lg-4 col-3">
                                        <div class="text-center">
                                            <p class="m-0 text-secondary text-truncate">
                                                24/02/2024
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-2">
                                        <div class="dropdown">
                                            <button class="btn" type="button" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="{{ asset('student/images/dropdown-dots.svg') }}" class="img-fluid"
                                                    alt="">
                                            </button>
                                            <ul class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton1">
                                                <li>
                                                    <a class="dropdown-item" href="#">Remove</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-1 border-dark p-3 rounded-3 my-3">
                                <div class="row align-items-center">
                                    <div class="col-lg-1 col-2">
                                        <div class="bg-bell p-lg-3 p-1 rounded-3">
                                            <img src="{{ asset('student/images/announcement-bell-icon.svg') }}"
                                                class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-5">
                                        <h6 class="fw-600 text-truncate">Announcement</h6>
                                        <p class="fs-13 m-0 text-truncate">
                                            It is a long established fact that a reader will
                                            be distracted by the readable
                                        </p>
                                    </div>
                                    <div class="col-lg-4 col-3">
                                        <div class="text-center">
                                            <p class="m-0 text-secondary text-truncate">
                                                24/02/2024
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
                                            <ul class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton1">
                                                <li>
                                                    <a class="dropdown-item" href="#">Remove</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-1 border-dark p-3 rounded-3 my-3">
                                <div class="row align-items-center">
                                    <div class="col-lg-1 col-2">
                                        <div class="bg-bell p-lg-3 p-1 rounded-3">
                                            <img src="{{ asset('student/images/announcement-bell-icon.svg') }}"
                                                class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-5">
                                        <h6 class="fw-600 text-truncate">Announcement</h6>
                                        <p class="fs-13 m-0 text-truncate">
                                            It is a long established fact that a reader will
                                            be distracted by the readable
                                        </p>
                                    </div>
                                    <div class="col-lg-4 col-3">
                                        <div class="text-center">
                                            <p class="m-0 text-secondary text-truncate">
                                                24/02/2024
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
                                            <ul class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton1">
                                                <li>
                                                    <a class="dropdown-item" href="#">Remove</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-1 border-dark p-3 rounded-3 my-3">
                                <div class="row align-items-center">
                                    <div class="col-lg-1 col-2">
                                        <div class="bg-bell p-lg-3 p-1 rounded-3">
                                            <img src="{{ asset('student/images/announcement-bell-icon.svg') }}"
                                                class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-5">
                                        <h6 class="fw-600 text-truncate">Announcement</h6>
                                        <p class="fs-13 m-0 text-truncate">
                                            It is a long established fact that a reader will
                                            be distracted by the readable
                                        </p>
                                    </div>
                                    <div class="col-lg-4 col-3">
                                        <div class="text-center">
                                            <p class="m-0 text-secondary text-truncate">
                                                24/02/2024
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
                                            <ul class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton1">
                                                <li>
                                                    <a class="dropdown-item" href="#">Remove</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-1 border-dark p-3 rounded-3 my-3">
                                <div class="row align-items-center">
                                    <div class="col-lg-1 col-2">
                                        <div class="bg-bell p-lg-3 p-1 rounded-3">
                                            <img src="{{ asset('student/images/announcement-bell-icon.svg') }}"
                                                class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-5">
                                        <h6 class="fw-600 text-truncate">Announcement</h6>
                                        <p class="fs-13 m-0 text-truncate">
                                            It is a long established fact that a reader will
                                            be distracted by the readable
                                        </p>
                                    </div>
                                    <div class="col-lg-4 col-3">
                                        <div class="text-center">
                                            <p class="m-0 text-secondary text-truncate">
                                                24/02/2024
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
                                            <ul class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton1">
                                                <li>
                                                    <a class="dropdown-item" href="#">Remove</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-1 border-dark p-3 rounded-3 my-3">
                                <div class="row align-items-center">
                                    <div class="col-lg-1 col-2">
                                        <div class="bg-bell p-lg-3 p-1 rounded-3">
                                            <img src="{{ asset('student/images/announcement-bell-icon.svg') }}"
                                                class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-5">
                                        <h6 class="fw-600 text-truncate">Announcement</h6>
                                        <p class="fs-13 m-0 text-truncate">
                                            It is a long established fact that a reader will
                                            be distracted by the readable
                                        </p>
                                    </div>
                                    <div class="col-lg-4 col-3">
                                        <div class="text-center">
                                            <p class="m-0 text-secondary text-truncate">
                                                24/02/2024
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
                                            <ul class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton1">
                                                <li>
                                                    <a class="dropdown-item" href="#">Remove</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="my-4">
                            <div class="bg-notification p-3 rounded-3 my-3">
                                <div class="row align-items-center">
                                    <div class="col-lg-1 col-2">
                                        <div class="user-avatar">
                                            <img src="https://img.freepik.com/free-psd/3d-illustration-human-avatar-profile_23-2150671142.jpg?t=st=1716560520~exp=1716564120~hmac=ded0fb126c8d1837579dae8f33aef902f1bc8fdb27e76a4410d62d5a78fc1d0e&amp;w=740"
                                                class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-5">
                                        <h6 class="fw-600 text-truncate">
                                            Luke tap your card
                                        </h6>
                                        <p class="fs-13 m-0 text-truncate">
                                            It is a long established fact that a reader will
                                            be distracted by the readable It is a long
                                            established fact that a reader will be
                                            distracted by the readable content of a page
                                            when looking at its layouts
                                        </p>
                                    </div>
                                    <div class="col-lg-3 col-3">
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-new text-white">
                                                New
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-2">
                                        <div class="dropdown">
                                            <button class="btn" type="button" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="{{ asset('student/images/dropdown-dots.svg') }}"
                                                    class="img-fluid" alt="">
                                            </button>
                                            <ul class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton1">
                                                <li>
                                                    <a class="dropdown-item" href="#">Remove</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-notification p-3 rounded-3 my-3">
                                <div class="row align-items-center">
                                    <div class="col-lg-1 col-2">
                                        <div class="user-avatar">
                                            <img src="https://img.freepik.com/free-psd/3d-illustration-human-avatar-profile_23-2150671142.jpg?t=st=1716560520~exp=1716564120~hmac=ded0fb126c8d1837579dae8f33aef902f1bc8fdb27e76a4410d62d5a78fc1d0e&amp;w=740"
                                                class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-5">
                                        <h6 class="fw-600 text-truncate">
                                            Luke tap your card
                                        </h6>
                                        <p class="fs-13 m-0 text-truncate">
                                            It is a long established fact that a reader will
                                            be distracted by the readable It is a long
                                            established fact that a reader will be
                                            distracted by the readable content of a page
                                            when looking at its layouts
                                        </p>
                                    </div>
                                    <div class="col-lg-3 col-3">
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-new text-white">
                                                New
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-2">
                                        <div class="dropdown">
                                            <button class="btn" type="button" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="{{ asset('student/images/dropdown-dots.svg') }}"
                                                    class="img-fluid" alt="">
                                            </button>
                                            <ul class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton1">
                                                <li>
                                                    <a class="dropdown-item" href="#">Remove</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-notification p-3 rounded-3 my-3">
                                <div class="row align-items-center">
                                    <div class="col-lg-1 col-2">
                                        <div class="user-avatar">
                                            <img src="https://img.freepik.com/free-psd/3d-illustration-human-avatar-profile_23-2150671142.jpg?t=st=1716560520~exp=1716564120~hmac=ded0fb126c8d1837579dae8f33aef902f1bc8fdb27e76a4410d62d5a78fc1d0e&amp;w=740"
                                                class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-5">
                                        <h6 class="fw-600 text-truncate">
                                            Luke tap your card
                                        </h6>
                                        <p class="fs-13 m-0 text-truncate">
                                            It is a long established fact that a reader will
                                            be distracted by the readable It is a long
                                            established fact that a reader will be
                                            distracted by the readable content of a page
                                            when looking at its layouts
                                        </p>
                                    </div>
                                    <div class="col-lg-3 col-3">
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-new text-white">
                                                New
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-2">
                                        <div class="dropdown">
                                            <button class="btn" type="button" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="{{ asset('student/images/dropdown-dots.svg') }}"
                                                    class="img-fluid" alt="">
                                            </button>
                                            <ul class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton1">
                                                <li>
                                                    <a class="dropdown-item" href="#">Remove</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-notification p-3 rounded-3 my-3">
                                <div class="row align-items-center">
                                    <div class="col-lg-1 col-2">
                                        <div class="user-avatar">
                                            <img src="https://img.freepik.com/free-psd/3d-illustration-human-avatar-profile_23-2150671142.jpg?t=st=1716560520~exp=1716564120~hmac=ded0fb126c8d1837579dae8f33aef902f1bc8fdb27e76a4410d62d5a78fc1d0e&amp;w=740"
                                                class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-5">
                                        <h6 class="fw-600 text-truncate">
                                            Luke tap your card
                                        </h6>
                                        <p class="fs-13 m-0 text-truncate">
                                            It is a long established fact that a reader will
                                            be distracted by the readable It is a long
                                            established fact that a reader will be
                                            distracted by the readable content of a page
                                            when looking at its layouts
                                        </p>
                                    </div>
                                    <div class="col-lg-3 col-3">
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-new text-white">
                                                New
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-2">
                                        <div class="dropdown">
                                            <button class="btn" type="button" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="{{ asset('student/images/dropdown-dots.svg') }}"
                                                    class="img-fluid" alt="">
                                            </button>
                                            <ul class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton1">
                                                <li>
                                                    <a class="dropdown-item" href="#">Remove</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-notification p-3 rounded-3 my-3">
                                <div class="row align-items-center">
                                    <div class="col-lg-1 col-2">
                                        <div class="user-avatar">
                                            <img src="https://img.freepik.com/free-psd/3d-illustration-human-avatar-profile_23-2150671142.jpg?t=st=1716560520~exp=1716564120~hmac=ded0fb126c8d1837579dae8f33aef902f1bc8fdb27e76a4410d62d5a78fc1d0e&amp;w=740"
                                                class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-5">
                                        <h6 class="fw-600 text-truncate">
                                            Luke tap your card
                                        </h6>
                                        <p class="fs-13 m-0 text-truncate">
                                            It is a long established fact that a reader will
                                            be distracted by the readable It is a long
                                            established fact that a reader will be
                                            distracted by the readable content of a page
                                            when looking at its layouts
                                        </p>
                                    </div>
                                    <div class="col-lg-3 col-3">
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-new text-white">
                                                New
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-2">
                                        <div class="dropdown">
                                            <button class="btn" type="button" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="{{ asset('student/images/dropdown-dots.svg') }}"
                                                    class="img-fluid" alt="">
                                            </button>
                                            <ul class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton1">
                                                <li>
                                                    <a class="dropdown-item" href="#">Remove</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
