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
                            </div>
                            <div class="border border-1 border-dark p-4 radius-20 my-3">
                                <div class="row align-items-center">
                                    <h6 class="fw-700">Exams Announcement</h6>

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
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="my-4">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
