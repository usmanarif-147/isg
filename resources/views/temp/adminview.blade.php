<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">

    <title>{{ $title ?? 'ISG BACK OFFICE' }}</title>

    <style>
        .card-shadow {
            box-shadow: 0px 2px 15px 0px #47444440;
            border-radius: 15px;
        }

        .btn-custom-bg {
            background-color: #153860 !important;
        }

        .custom-radius {
            border-radius: 20px
        }

        .student-profile-picture {
            height: 85px;
            width: 85px;
        }

        .student-profile-picture img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .fs-12 {
            font-size: 12px;
        }

        /* Profile Page CSS */

        .cover-picture {
            background-image: url("https://isg-dashboard.netlify.app/assets/images/cover-picture.svg");
            height: 150px;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .camera-icon {
            height: 50px;
            width: 50px;
            background-color: #d3d3d3bd;
            border: 1px solid #5e5e5ebd;
        }


        .camera-icon-small {
            height: 30px;
            width: 30px;
            background-color: #d3d3d3bd;
            cursor: pointer;
            left: 100px;
            bottom: 0%;
        }

        .camera-icon-small img {
            height: 15px;
            width: 15px;
        }

        .bio-text {
            color: #00000080;
        }

        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            color: #2a6bb6;
            background-color: #fff;
            border-color: #dee2e6 #dee2e6 #fff;
        }

        .nav-tabs .nav-link {
            margin-bottom: -1px;
            background: 0 0;
            border: 1px solid transparent;
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
            color: #787878;
        }

        .link-text {
            color: #2a6bb6;
        }

        .info-text {
            color: #828282;
        }

        .btn-skills-bg {
            background-color: #e5f1ff;
        }

        .modal-socials {
            height: 180px;
            overflow-y: auto;
        }

        .attached-links-bg {
            background-color: #ede8e8;
            height: 40px;
            width: 40px;
        }

        .attached-social-links {
            height: 20px;
            width: 20px;
        }

        .attached-social-links img {
            height: 100%;
            width: 100%;
        }

        .card-icon {
            height: 50px;
            width: 50px;
        }

        .card-icon img {
            height: 100%;
            width: 100%;
        }

        .scan-by-qr {
            height: 30px;
            width: 30px;
        }

        .qr-code {
            height: 200px;
            width: 200px;
        }

        .qr-code img {
            height: 100%;
            width: 100%;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #2a6bb6 !important;
        }

        .custom-nav-tab-color {
            color: #828282 !important;
        }
    </style>

    @include('layouts.admin.partials.css')
</head>

<body class="app">

    <header class="app-header fixed-top">
        @include('layouts.admin.partials.navbar')
        @include('layouts.admin.partials.sidepannel')
    </header>


    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="px-4 card-shadow">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">

                            <button class="nav-link custom-nav-tab-color bg-transparent py-3 my-1 active"
                                id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home"
                                type="button" role="tab" aria-controls="v-pills-home"
                                aria-selected="true">School</button>
                            <hr class="m-0">
                            <button class="nav-link custom-nav-tab-color bg-transparent py-3 my-1"
                                id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile"
                                type="button" role="tab" aria-controls="v-pills-profile"
                                aria-selected="false">Student</button>
                            <hr class="m-0">
                            <button class="nav-link custom-nav-tab-color bg-transparent py-3 my-1"
                                id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages"
                                type="button" role="tab" aria-controls="v-pills-messages"
                                aria-selected="false">Student Info</button>
                            <hr class="m-0">
                            <button class="nav-link custom-nav-tab-color bg-transparent py-3 my-1"
                                id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings"
                                type="button" role="tab" aria-controls="v-pills-settings"
                                aria-selected="false">Total Students</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="d-flex align-items-start">

                        <div class="mx-3">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                    aria-labelledby="v-pills-home-tab">
                                    <div class="p-4 card-shadow my-1">
                                        <h5 class="navy-blue fw-bold">School Name</h5>
                                        <p class="fs-13 m-0">
                                            International Schools Group (ISG) | American and British Schools in Saudi
                                            Arabia.
                                            The ISG School is a prominent educational institution known for its
                                            commitment to fostering academic excellence and personal growth. With a rich
                                            history and a forward-looking approach, ISG offers a diverse curriculum that
                                            caters to students from various cultural backgrounds. The school emphasizes
                                            a holistic education, focusing not only on academics but also on the
                                            development of critical thinking, creativity, and global awareness. ISG's
                                            state-of-the-art facilities and experienced faculty provide an environment
                                            where students can thrive and reach their full potential. The school
                                            strongly believes in the importance of extracurricular activities, offering
                                            a wide range of sports, arts, and community service programs to complement
                                            academic learning. These opportunities help students build leadership
                                            skills, teamwork, and a sense of social responsibility. Additionally, ISG
                                            fosters a strong sense of community among students, parents, and staff,
                                            creating a supportive and inclusive atmosphere. The school's commitment to
                                            continuous improvement and innovation in education ensures that its
                                            graduates are well-prepared for the challenges of higher education and the
                                            demands of a globalized world. ISG School remains a beacon of quality
                                            education, nurturing the minds and spirits of future leaders.

                                        </p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab">
                                    <div class="card-shadow p-4 my-1">
                                        <h5 class="navy-blue fw-bold">Student Information</h5>
                                        <p class="fs-13">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero
                                            fugit quos explicabo est cum neque ex at aspernatur, illo cupiditate
                                            voluptates rem quod illum. Debitis optio rerum modi tempore! Odit.</p>
                                        <div class="row gy-3">
                                            <div class="col-12 col-lg-4">
                                                <div class="card-shadow bg-white p-3">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <div class="student-profile-picture">
                                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVsYvLCz9lCxHZzoIFItkiC1BZo52JV7qmYA&s"
                                                                class="img-fluid rounded-circle border" alt="">
                                                        </div>
                                                    </div>
                                                    <h6 class="text-center py-2 m-0">Bhola Record</h6>
                                                    <p class="text-center m-0 text-primary">Student</p>
                                                    <p class="text-center fs-12 py-1">Lorem ipsum dolor sit amet,
                                                        consectetur
                                                        adipisicing elit.
                                                        Pariatur voluptatum as.</p>
                                                </div>
                                                <div class="card-shadow my-3 bg-white p-4">
                                                    <h6 class="pb-2">Personal Details</h6>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <p class="text-dark fs-12">Birthday</p>
                                                        </div>
                                                        <div>
                                                            <p class="text-secondary fs-12">30-05-2001</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <p class="text-dark fs-12">Phone</p>
                                                        </div>
                                                        <div>
                                                            <p class="text-secondary fs-12">0336-7063952</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <p class="text-dark fs-12">Mail</p>
                                                        </div>
                                                        <div>
                                                            <p class="text-secondary fs-12">haseeb@gmail.com</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-8">
                                                <div class="card-shadow bg-white p-4">
                                                    <h5>About</h5>
                                                    <p class="fs-12">Completed my graduation in Arts from the well
                                                        known and renowned
                                                        institution of Lahore University of Management Sciences (LUMS)
                                                        2000-01, which was affiliated to M.S. University. I ranker in
                                                        University exams from the same university from 1996-01.</p>
                                                    <p class="fs-12">Worked as Professor and Head of the department at
                                                        Lahore College
                                                        of Arts and Sciences (LACAS) from 2003-2015</p>
                                                    <p class="fs-12">Lorem Ipsum is simply dummy text of the printing
                                                        and typesetting
                                                        industry. Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer took a galley
                                                        of type and scrambled it to make a type specimen book. It has
                                                        survived not only five centuries, but also the leap into
                                                        electronic typesetting, remaining essentially unchanged.</p>
                                                    <h6>Education</h6>
                                                    <ul>
                                                        <li class="fs-12">
                                                            MA in English - University of the Punjab (UCP), Lahore,
                                                            Pakistan.
                                                        </li>
                                                        <li class="fs-12">
                                                            MA in English - University of the Punjab (UCP), Lahore,
                                                            Pakistan.
                                                        </li>
                                                        <li class="fs-12">
                                                            MA in English - University of the Punjab (UCP), Lahore,
                                                            Pakistan.
                                                        </li>
                                                        <li class="fs-12">
                                                            MA in English - University of the Punjab (UCP), Lahore,
                                                            Pakistan.
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                    aria-labelledby="v-pills-messages-tab">
                                    <div class="p-4 card-shadow my-1">
                                        <div class="cover-picture position-relative">
                                            <div
                                                class="position-absolute camera-icon d-flex justify-content-center align-items-center rounded-circle bottom-0 end-0 m-3">
                                                <input type="file" class="img-fluid"
                                                    style="
                                                  opacity: 0;
                                                  position: absolute;
                                                  top: 0;
                                                  left: 0;
                                                  width: 100%;
                                                  height: 100%;
                                                  cursor: pointer;
                                                "
                                                    accept="image/*" alt="" />
                                                <img src="https://isg-dashboard.netlify.app/assets/images/camera-icon.svg"
                                                    class="img-fluid" style="cursor: pointer;" alt="" />
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="row align-items-center">
                                                <div class="col-12">
                                                    <div class="px-2">
                                                        <h4 class="fw-600 mb-1 mt-2">Abdul Haseeb</h4>
                                                        <p class="fs-13 bio-text">
                                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                            Est, voluptas modi maiores natus non nostrum at beatae
                                                            accusamus similique ullam doloremque illum vel nobis harum
                                                            consequatur dignissimos earum ratione commodi.
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-12">
                                                    <nav>
                                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                            <button class="nav-link active" id="nav-home-tab"
                                                                data-bs-toggle="tab" data-bs-target="#nav-home"
                                                                type="button" role="tab"
                                                                aria-controls="nav-home" aria-selected="true">
                                                                <div class="d-flex gap-2 align-items-center">
                                                                    <div class="mobile-hidden">
                                                                        <i class="fa fa-user mobile-hidden"
                                                                            aria-hidden="true"></i>
                                                                    </div>
                                                                    <div>
                                                                        <p class="m-0">My Details</p>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                            <button class="nav-link" id="nav-profile-tab"
                                                                data-bs-toggle="tab" data-bs-target="#nav-profile"
                                                                type="button" role="tab"
                                                                aria-controls="nav-profile" aria-selected="false">
                                                                <div class="d-flex gap-2 align-items-center gap-1">
                                                                    <div class="mobile-hidden">
                                                                        <i class="fa fa-link mobile-hidden"
                                                                            aria-hidden="true"></i>
                                                                    </div>
                                                                    <div>
                                                                        <p class="m-0">Attached links</p>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                            <button class="nav-link" id="nav-contact-tab"
                                                                data-bs-toggle="tab" data-bs-target="#nav-contact"
                                                                type="button" role="tab"
                                                                aria-controls="nav-contact" aria-selected="false">
                                                                <div class="d-flex gap-2 align-items-center gap-1">
                                                                    <div class="mobile-hidden">
                                                                        <i class="fa fa-address-card-o"
                                                                            aria-hidden="true"></i>
                                                                    </div>
                                                                    <div>
                                                                        <p class="m-0">Cards</p>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </div>
                                                    </nav>
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-home"
                                                            role="tabpanel" aria-labelledby="nav-home-tab">
                                                            <div class="p-4 card-shadow my-4">
                                                                <h5 class="navy-blue fw-bold">About Me</h5>
                                                                <p class="fs-13 m-0">
                                                                    It is a long established fact that a reader will be
                                                                    distracted by the readable content of a page when
                                                                    looking at its layout. The point of using Lorem
                                                                    Ipsum
                                                                    is that it has a more-or-less normal distribution of
                                                                    letters, as opposed to using 'Content here, content
                                                                    here', making it look like readable English. Many
                                                                    desktop publishing packages and web page editors now
                                                                    use Lorem Ipsum as their default model text, and a
                                                                    search for 'lorem ipsum' will uncover many web sites
                                                                    still in their infancy. Various versions have
                                                                    evolved
                                                                    over the years, sometimes by accident, sometimes on
                                                                    purpose (injected humour and the like).
                                                                </p>
                                                            </div>

                                                            <div class="row gy-3">
                                                                <div class="col-12 col-lg-8">
                                                                    <div class="card-shadow p-4">
                                                                        <h5 class="navy-blue fw-bold">
                                                                            Personal information
                                                                        </h5>
                                                                        <div class="row">
                                                                            <div class="col-12 col-lg-4">
                                                                                <div
                                                                                    class="d-flex justify-content-between align-items-center my-4 gap-2">
                                                                                    <div>
                                                                                        <h6
                                                                                            class="navy-blue fw-600 fs-12 m-0">
                                                                                            Name:</h6>
                                                                                    </div>
                                                                                    <div>
                                                                                        <p
                                                                                            class="info-text fs-12 text-truncate m-0">
                                                                                            Abdul Haseeb
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-lg-4">
                                                                                <div
                                                                                    class="d-flex justify-content-between align-items-center my-4 gap-2">
                                                                                    <div>
                                                                                        <h6
                                                                                            class="navy-blue fw-600 fs-12 m-0">
                                                                                            CNIC:</h6>
                                                                                    </div>
                                                                                    <div>
                                                                                        <p
                                                                                            class="info-text fs-12 text-truncate m-0">
                                                                                            0000-000000-0
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-lg-4">
                                                                                <div
                                                                                    class="d-flex justify-content-between align-items-center my-4 gap-2">
                                                                                    <div>
                                                                                        <h6
                                                                                            class="navy-blue fw-600 fs-12 m-0">
                                                                                            Blood Gr:
                                                                                        </h6>
                                                                                    </div>
                                                                                    <div>
                                                                                        <p
                                                                                            class="info-text fs-12 text-truncate m-0">
                                                                                            B+</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-lg-4">
                                                                                <div
                                                                                    class="d-flex justify-content-between align-items-center my-4 gap-2">
                                                                                    <div>
                                                                                        <h6
                                                                                            class="navy-blue fw-600 fs-12 m-0">
                                                                                            DOB:</h6>
                                                                                    </div>
                                                                                    <div>
                                                                                        <p
                                                                                            class="info-text fs-12 text-truncate m-0">
                                                                                            11-8-2005</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-lg-4">
                                                                                <div
                                                                                    class="d-flex justify-content-between align-items-center my-4 gap-2">
                                                                                    <div>
                                                                                        <h6
                                                                                            class="navy-blue fw-600 fs-12 m-0">
                                                                                            Phone:</h6>
                                                                                    </div>
                                                                                    <div>
                                                                                        <p
                                                                                            class="info-text fs-12 text-truncate m-0">
                                                                                            +923367063952
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-lg-4">
                                                                                <div
                                                                                    class="d-flex justify-content-between align-items-center my-4 gap-2">
                                                                                    <div>
                                                                                        <h6
                                                                                            class="navy-blue fw-600 fs-12 m-0">
                                                                                            Nationality:
                                                                                        </h6>
                                                                                    </div>
                                                                                    <div>
                                                                                        <p
                                                                                            class="info-text fs-12 text-truncate m-0">
                                                                                            Pakistani</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-lg-4">
                                                                                <div
                                                                                    class="d-flex justify-content-between align-items-center mt-3 mb-0 gap-2">
                                                                                    <div>
                                                                                        <h6
                                                                                            class="navy-blue fw-600 fs-12 m-0">
                                                                                            Gander:
                                                                                        </h6>
                                                                                    </div>
                                                                                    <div>
                                                                                        <p
                                                                                            class="info-text fs-12 text-truncate m-0">
                                                                                            Male</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-lg-4">
                                                                                <div
                                                                                    class="d-flex justify-content-between align-items-center mt-3 mb-0 gap-2">
                                                                                    <div>
                                                                                        <h6
                                                                                            class="navy-blue fw-600 fs-12 m-0">
                                                                                            Email:</h6>
                                                                                    </div>
                                                                                    <div>
                                                                                        <p
                                                                                            class="info-text fs-12 text-truncate m-0">
                                                                                            haseeb7063952@gmail.com
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-lg-4">
                                                                    <div class="card-shadow p-4">
                                                                        <h5 class="navy-blue fw-bold mb-2">
                                                                            Student information
                                                                        </h5>
                                                                        <div
                                                                            class="d-flex justify-content-between align-items-center gap-2">
                                                                            <div>
                                                                                <h6 class="navy-blue fw-600 fs-12">Roll
                                                                                    No:
                                                                                </h6>
                                                                            </div>
                                                                            <div>
                                                                                <p
                                                                                    class="info-text fs-12 text-truncate">
                                                                                    75894</p>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="d-flex justify-content-between align-items-center gap-2">
                                                                            <div>
                                                                                <h6 class="navy-blue fw-600 fs-12">
                                                                                    Degree:
                                                                                </h6>
                                                                            </div>
                                                                            <div>
                                                                                <p
                                                                                    class="info-text fs-12 text-truncate">
                                                                                    BSCS</p>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="d-flex justify-content-between align-items-center gap-2">
                                                                            <div>
                                                                                <h6 class="navy-blue fw-600 fs-12">
                                                                                    Batch:
                                                                                </h6>
                                                                            </div>
                                                                            <div>
                                                                                <p
                                                                                    class="info-text fs-12 text-truncate">
                                                                                    2020</p>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="d-flex justify-content-between align-items-center gap-2">
                                                                            <div>
                                                                                <h6 class="navy-blue fw-600 fs-12">
                                                                                    Section:
                                                                                </h6>
                                                                            </div>
                                                                            <div>
                                                                                <p class="info-text fs-15">B-2</p>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="d-flex justify-content-between gap-2 align-items-center">
                                                                            <div>
                                                                                <h6 class="navy-blue fw-600 fs-12">
                                                                                    Campus:
                                                                                </h6>
                                                                            </div>
                                                                            <div>
                                                                                <p
                                                                                    class="info-text fs-12 text-truncate m-0">
                                                                                    Gold
                                                                                    Campus</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                                            aria-labelledby="nav-profile-tab">
                                                            <div class="py-4">
                                                                <div class="modal fade" id="exampleModalToggle"
                                                                    aria-hidden="true"
                                                                    aria-labelledby="exampleModalToggleLabel"
                                                                    tabindex="-1">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content radius-20 p-3">
                                                                            <div class="modal-body">
                                                                                <h5 class="fw-600 pb-2">Customized link
                                                                                </h5>
                                                                                <div class="d-flex gap-2">
                                                                                    <div>
                                                                                        <input type="text"
                                                                                            placeholder="Name"
                                                                                            class="form-control"
                                                                                            name=""
                                                                                            id="" />
                                                                                    </div>
                                                                                    <div>
                                                                                        <input type="text"
                                                                                            placeholder="Enter link here"
                                                                                            class="form-control"
                                                                                            name=""
                                                                                            id="" />
                                                                                    </div>

                                                                                    <div>
                                                                                        <button
                                                                                            class="btn btn-custom-bg text-white">
                                                                                            Add
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <hr />
                                                                                <div class="">
                                                                                    <a href="#"
                                                                                        class="text-decoration-none"
                                                                                        data-bs-target="#exampleModalToggle2"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-dismiss="modal">
                                                                                        <div class="modal-socials">
                                                                                            <div
                                                                                                class="d-flex justify-content-between align-items-center my-3">
                                                                                                <div>
                                                                                                    <div
                                                                                                        class="d-flex gap-2 align-items-center">
                                                                                                        <div
                                                                                                            class="add-social-icon">
                                                                                                            <img src="./assets/images/yt-modal-icon.svg"
                                                                                                                class="img-fluid"
                                                                                                                alt="" />
                                                                                                        </div>
                                                                                                        <div>
                                                                                                            <p
                                                                                                                class="m-0 fw-500 text-dark">
                                                                                                                YouTube
                                                                                                            </p>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div>
                                                                                                    <img src="./assets/images/arrow-right.svg"
                                                                                                        class="img-fluid"
                                                                                                        alt="" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="d-flex justify-content-between align-items-center my-3">
                                                                                                <div>
                                                                                                    <div
                                                                                                        class="d-flex gap-2 align-items-center">
                                                                                                        <div
                                                                                                            class="add-social-icon">
                                                                                                            <img src="./assets/images/fb-modal-icon.svg"
                                                                                                                class="img-fluid"
                                                                                                                alt="" />
                                                                                                        </div>
                                                                                                        <div>
                                                                                                            <p
                                                                                                                class="m-0 fw-500 text-dark">
                                                                                                                Facebook
                                                                                                            </p>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div>
                                                                                                    <img src="./assets/images/arrow-right.svg"
                                                                                                        class="img-fluid"
                                                                                                        alt="" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="d-flex justify-content-between align-items-center my-3">
                                                                                                <div>
                                                                                                    <div
                                                                                                        class="d-flex gap-2 align-items-center">
                                                                                                        <div
                                                                                                            class="add-social-icon">
                                                                                                            <img src="./assets/images/wa-modal-icon.svg"
                                                                                                                class="img-fluid"
                                                                                                                alt="" />
                                                                                                        </div>
                                                                                                        <div>
                                                                                                            <p
                                                                                                                class="m-0 fw-500 text-dark">
                                                                                                                Whatsapp
                                                                                                            </p>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div>
                                                                                                    <img src="./assets/images/arrow-right.svg"
                                                                                                        class="img-fluid"
                                                                                                        alt="" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="d-flex justify-content-between align-items-center my-3">
                                                                                                <div>
                                                                                                    <div
                                                                                                        class="d-flex gap-2 align-items-center">
                                                                                                        <div
                                                                                                            class="add-social-icon">
                                                                                                            <img src="./assets/images/tw-modal-icon.svg"
                                                                                                                class="img-fluid"
                                                                                                                alt="" />
                                                                                                        </div>
                                                                                                        <div>
                                                                                                            <p
                                                                                                                class="m-0 fw-500 text-dark">
                                                                                                                Twitter
                                                                                                            </p>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div>
                                                                                                    <img src="./assets/images/arrow-right.svg"
                                                                                                        class="img-fluid"
                                                                                                        alt="" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="d-flex justify-content-between align-items-center my-3">
                                                                                                <div>
                                                                                                    <div
                                                                                                        class="d-flex gap-2 align-items-center">
                                                                                                        <div
                                                                                                            class="add-social-icon">
                                                                                                            <img src="./assets/images/yt-modal-icon.svg"
                                                                                                                class="img-fluid"
                                                                                                                alt="" />
                                                                                                        </div>
                                                                                                        <div>
                                                                                                            <p
                                                                                                                class="m-0 fw-500 text-dark">
                                                                                                                YouTube
                                                                                                            </p>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div>
                                                                                                    <img src="./assets/images/arrow-right.svg"
                                                                                                        class="img-fluid"
                                                                                                        alt="" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="d-flex justify-content-between align-items-center my-3">
                                                                                                <div>
                                                                                                    <div
                                                                                                        class="d-flex gap-2 align-items-center">
                                                                                                        <div
                                                                                                            class="add-social-icon">
                                                                                                            <img src="./assets/images/fb-modal-icon.svg"
                                                                                                                class="img-fluid"
                                                                                                                alt="" />
                                                                                                        </div>
                                                                                                        <div>
                                                                                                            <p
                                                                                                                class="m-0 fw-500 text-dark">
                                                                                                                Facebook
                                                                                                            </p>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div>
                                                                                                    <img src="./assets/images/arrow-right.svg"
                                                                                                        class="img-fluid"
                                                                                                        alt="" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="d-flex justify-content-between align-items-center my-3">
                                                                                                <div>
                                                                                                    <div
                                                                                                        class="d-flex gap-2 align-items-center">
                                                                                                        <div
                                                                                                            class="add-social-icon">
                                                                                                            <img src="./assets/images/wa-modal-icon.svg"
                                                                                                                class="img-fluid"
                                                                                                                alt="" />
                                                                                                        </div>
                                                                                                        <div>
                                                                                                            <p
                                                                                                                class="m-0 fw-500 text-dark">
                                                                                                                Whatsapp
                                                                                                            </p>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div>
                                                                                                    <img src="./assets/images/arrow-right.svg"
                                                                                                        class="img-fluid"
                                                                                                        alt="" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="d-flex justify-content-between align-items-center my-3">
                                                                                                <div>
                                                                                                    <div
                                                                                                        class="d-flex gap-2 align-items-center">
                                                                                                        <div
                                                                                                            class="add-social-icon">
                                                                                                            <img src="./assets/images/tw-modal-icon.svg"
                                                                                                                class="img-fluid"
                                                                                                                alt="" />
                                                                                                        </div>
                                                                                                        <div>
                                                                                                            <p
                                                                                                                class="m-0 fw-500 text-dark">
                                                                                                                Twitter
                                                                                                            </p>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div>
                                                                                                    <img src="./assets/images/arrow-right.svg"
                                                                                                        class="img-fluid"
                                                                                                        alt="" />
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal fade" id="exampleModalToggle2"
                                                                    aria-hidden="true"
                                                                    aria-labelledby="exampleModalToggleLabel2"
                                                                    tabindex="-1">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content radius-20 p-3">
                                                                            <div class="modal-body">
                                                                                <div
                                                                                    class="d-flex justify-content-center align-items-center">
                                                                                    <div
                                                                                        class="p-3 bg-light-secondary rounded-circle">
                                                                                        <img src="./assets/images/instagram.svg"
                                                                                            class="img-fluid"
                                                                                            alt="" />
                                                                                    </div>
                                                                                </div>
                                                                                <h4 class="fw-600 pb-2">Instagram</h4>
                                                                                <div class="row">
                                                                                    <div class="col-lg-10 col-9 pe-0">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            placeholder="Enter link here" />
                                                                                    </div>
                                                                                    <div class="col-lg-2 col-3 ps-0">
                                                                                        <button
                                                                                            class="btn btn-modal-add text-white w-100">
                                                                                            Add
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <a class="btn btn-custom-bg px-5 text-white"
                                                                    data-bs-toggle="modal" href="#exampleModalToggle"
                                                                    role="button">Add New</a>
                                                                <div class="row my-3">
                                                                    <div class="col-12 col-lg-4">
                                                                        <div class="card-shadow p-3 my-2">
                                                                            <div
                                                                                class="d-flex justify-content-between align-items-center">
                                                                                <div>
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-2">
                                                                                        <div
                                                                                            class="rounded-circle attached-links-bg d-flex justify-content-center align-items-center">
                                                                                            <div
                                                                                                class="d-flex justify-content-center align-items-center attached-social-links">
                                                                                                <img src="./assets/images/instagram.svg"
                                                                                                    class="img-fluid"
                                                                                                    alt="" />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <h6
                                                                                                class="m-0 fw-600 fs-13">
                                                                                                Instagram
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    <div
                                                                                        class="d-flex align-items-center">
                                                                                        <div>
                                                                                            <div
                                                                                                class="form-check form-switch">
                                                                                                <input
                                                                                                    class="form-check-input"
                                                                                                    type="checkbox"
                                                                                                    id="flexSwitchCheckChecked"
                                                                                                    checked />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <div class="dropdown">
                                                                                                <button class="btn"
                                                                                                    type="button"
                                                                                                    id="dropdownMenuButton1"
                                                                                                    data-bs-toggle="dropdown"
                                                                                                    aria-expanded="false">
                                                                                                    <img src="./assets/images/dropdown-dots.svg"
                                                                                                        class="img-fluid"
                                                                                                        alt="" />
                                                                                                </button>
                                                                                                <ul class="dropdown-menu shadow"
                                                                                                    aria-labelledby="dropdownMenuButton1">
                                                                                                    <li data-bs-toggle="modal"
                                                                                                        data-bs-target="#exampleModal">
                                                                                                        <a class="dropdown-item"
                                                                                                            href="#">Update</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a class="dropdown-item"
                                                                                                            href="#">Remove</a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-lg-4">
                                                                        <div class="card-shadow p-3 my-2">
                                                                            <div
                                                                                class="d-flex justify-content-between align-items-center">
                                                                                <div>
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-2">
                                                                                        <div
                                                                                            class="rounded-circle attached-links-bg d-flex justify-content-center align-items-center">
                                                                                            <div
                                                                                                class="d-flex justify-content-center align-items-center attached-social-links">
                                                                                                <img src="./assets/images/instagram.svg"
                                                                                                    class="img-fluid"
                                                                                                    alt="" />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <h6
                                                                                                class="m-0 fw-600 fs-13">
                                                                                                Instagram
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    <div
                                                                                        class="d-flex align-items-center">
                                                                                        <div>
                                                                                            <div
                                                                                                class="form-check form-switch">
                                                                                                <input
                                                                                                    class="form-check-input"
                                                                                                    type="checkbox"
                                                                                                    id="flexSwitchCheckChecked"
                                                                                                    checked />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <div class="dropdown">
                                                                                                <button class="btn"
                                                                                                    type="button"
                                                                                                    id="dropdownMenuButton1"
                                                                                                    data-bs-toggle="dropdown"
                                                                                                    aria-expanded="false">
                                                                                                    <img src="./assets/images/dropdown-dots.svg"
                                                                                                        class="img-fluid"
                                                                                                        alt="" />
                                                                                                </button>
                                                                                                <ul class="dropdown-menu shadow"
                                                                                                    aria-labelledby="dropdownMenuButton1">
                                                                                                    <li data-bs-toggle="modal"
                                                                                                        data-bs-target="#exampleModal">
                                                                                                        <a class="dropdown-item"
                                                                                                            href="#">Update</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a class="dropdown-item"
                                                                                                            href="#">Remove</a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-lg-4">
                                                                        <div class="card-shadow p-3 my-2">
                                                                            <div
                                                                                class="d-flex justify-content-between align-items-center">
                                                                                <div>
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-2">
                                                                                        <div
                                                                                            class="rounded-circle attached-links-bg d-flex justify-content-center align-items-center">
                                                                                            <div
                                                                                                class="d-flex justify-content-center align-items-center attached-social-links">
                                                                                                <img src="./assets/images/instagram.svg"
                                                                                                    class="img-fluid"
                                                                                                    alt="" />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <h6
                                                                                                class="m-0 fw-600 fs-13">
                                                                                                Instagram
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    <div
                                                                                        class="d-flex align-items-center">
                                                                                        <div>
                                                                                            <div
                                                                                                class="form-check form-switch">
                                                                                                <input
                                                                                                    class="form-check-input"
                                                                                                    type="checkbox"
                                                                                                    id="flexSwitchCheckChecked"
                                                                                                    checked />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <div class="dropdown">
                                                                                                <button class="btn"
                                                                                                    type="button"
                                                                                                    id="dropdownMenuButton1"
                                                                                                    data-bs-toggle="dropdown"
                                                                                                    aria-expanded="false">
                                                                                                    <img src="./assets/images/dropdown-dots.svg"
                                                                                                        class="img-fluid"
                                                                                                        alt="" />
                                                                                                </button>
                                                                                                <ul class="dropdown-menu shadow"
                                                                                                    aria-labelledby="dropdownMenuButton1">
                                                                                                    <li data-bs-toggle="modal"
                                                                                                        data-bs-target="#exampleModal">
                                                                                                        <a class="dropdown-item"
                                                                                                            href="#">Update</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a class="dropdown-item"
                                                                                                            href="#">Remove</a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-lg-4">
                                                                        <div class="card-shadow p-3 my-2">
                                                                            <div
                                                                                class="d-flex justify-content-between align-items-center">
                                                                                <div>
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-2">
                                                                                        <div
                                                                                            class="rounded-circle attached-links-bg d-flex justify-content-center align-items-center">
                                                                                            <div
                                                                                                class="d-flex justify-content-center align-items-center attached-social-links">
                                                                                                <img src="./assets/images/instagram.svg"
                                                                                                    class="img-fluid"
                                                                                                    alt="" />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <h6
                                                                                                class="m-0 fw-600 fs-13">
                                                                                                Instagram
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    <div
                                                                                        class="d-flex align-items-center">
                                                                                        <div>
                                                                                            <div
                                                                                                class="form-check form-switch">
                                                                                                <input
                                                                                                    class="form-check-input"
                                                                                                    type="checkbox"
                                                                                                    id="flexSwitchCheckChecked"
                                                                                                    checked />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <div class="dropdown">
                                                                                                <button class="btn"
                                                                                                    type="button"
                                                                                                    id="dropdownMenuButton1"
                                                                                                    data-bs-toggle="dropdown"
                                                                                                    aria-expanded="false">
                                                                                                    <img src="./assets/images/dropdown-dots.svg"
                                                                                                        class="img-fluid"
                                                                                                        alt="" />
                                                                                                </button>
                                                                                                <ul class="dropdown-menu shadow"
                                                                                                    aria-labelledby="dropdownMenuButton1">
                                                                                                    <li data-bs-toggle="modal"
                                                                                                        data-bs-target="#exampleModal">
                                                                                                        <a class="dropdown-item"
                                                                                                            href="#">Update</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a class="dropdown-item"
                                                                                                            href="#">Remove</a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-lg-4">
                                                                        <div class="card-shadow p-3 my-2">
                                                                            <div
                                                                                class="d-flex justify-content-between align-items-center">
                                                                                <div>
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-2">
                                                                                        <div
                                                                                            class="rounded-circle attached-links-bg d-flex justify-content-center align-items-center">
                                                                                            <div
                                                                                                class="d-flex justify-content-center align-items-center attached-social-links">
                                                                                                <img src="./assets/images/instagram.svg"
                                                                                                    class="img-fluid"
                                                                                                    alt="" />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <h6
                                                                                                class="m-0 fw-600 fs-13">
                                                                                                Instagram
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    <div
                                                                                        class="d-flex align-items-center">
                                                                                        <div>
                                                                                            <div
                                                                                                class="form-check form-switch">
                                                                                                <input
                                                                                                    class="form-check-input"
                                                                                                    type="checkbox"
                                                                                                    id="flexSwitchCheckChecked"
                                                                                                    checked />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <div class="dropdown">
                                                                                                <button class="btn"
                                                                                                    type="button"
                                                                                                    id="dropdownMenuButton1"
                                                                                                    data-bs-toggle="dropdown"
                                                                                                    aria-expanded="false">
                                                                                                    <img src="./assets/images/dropdown-dots.svg"
                                                                                                        class="img-fluid"
                                                                                                        alt="" />
                                                                                                </button>
                                                                                                <ul class="dropdown-menu shadow"
                                                                                                    aria-labelledby="dropdownMenuButton1">
                                                                                                    <li data-bs-toggle="modal"
                                                                                                        data-bs-target="#exampleModal">
                                                                                                        <a class="dropdown-item"
                                                                                                            href="#">Update</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a class="dropdown-item"
                                                                                                            href="#">Remove</a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-lg-4">
                                                                        <div class="card-shadow p-3 my-2">
                                                                            <div
                                                                                class="d-flex justify-content-between align-items-center">
                                                                                <div>
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-2">
                                                                                        <div
                                                                                            class="rounded-circle attached-links-bg d-flex justify-content-center align-items-center">
                                                                                            <div
                                                                                                class="d-flex justify-content-center align-items-center attached-social-links">
                                                                                                <img src="./assets/images/instagram.svg"
                                                                                                    class="img-fluid"
                                                                                                    alt="" />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <h6
                                                                                                class="m-0 fw-600 fs-13">
                                                                                                Instagram
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    <div
                                                                                        class="d-flex align-items-center">
                                                                                        <div>
                                                                                            <div
                                                                                                class="form-check form-switch">
                                                                                                <input
                                                                                                    class="form-check-input"
                                                                                                    type="checkbox"
                                                                                                    id="flexSwitchCheckChecked"
                                                                                                    checked />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <div class="dropdown">
                                                                                                <button class="btn"
                                                                                                    type="button"
                                                                                                    id="dropdownMenuButton1"
                                                                                                    data-bs-toggle="dropdown"
                                                                                                    aria-expanded="false">
                                                                                                    <img src="./assets/images/dropdown-dots.svg"
                                                                                                        class="img-fluid"
                                                                                                        alt="" />
                                                                                                </button>
                                                                                                <ul class="dropdown-menu shadow"
                                                                                                    aria-labelledby="dropdownMenuButton1">
                                                                                                    <li data-bs-toggle="modal"
                                                                                                        data-bs-target="#exampleModal">
                                                                                                        <a class="dropdown-item"
                                                                                                            href="#">Update</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a class="dropdown-item"
                                                                                                            href="#">Remove</a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-lg-4">
                                                                        <div class="card-shadow p-3 my-2">
                                                                            <div
                                                                                class="d-flex justify-content-between align-items-center">
                                                                                <div>
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-2">
                                                                                        <div
                                                                                            class="rounded-circle attached-links-bg d-flex justify-content-center align-items-center">
                                                                                            <div
                                                                                                class="d-flex justify-content-center align-items-center attached-social-links">
                                                                                                <img src="./assets/images/instagram.svg"
                                                                                                    class="img-fluid"
                                                                                                    alt="" />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <h6
                                                                                                class="m-0 fw-600 fs-13">
                                                                                                Instagram
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    <div
                                                                                        class="d-flex align-items-center">
                                                                                        <div>
                                                                                            <div
                                                                                                class="form-check form-switch">
                                                                                                <input
                                                                                                    class="form-check-input"
                                                                                                    type="checkbox"
                                                                                                    id="flexSwitchCheckChecked"
                                                                                                    checked />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <div class="dropdown">
                                                                                                <button class="btn"
                                                                                                    type="button"
                                                                                                    id="dropdownMenuButton1"
                                                                                                    data-bs-toggle="dropdown"
                                                                                                    aria-expanded="false">
                                                                                                    <img src="./assets/images/dropdown-dots.svg"
                                                                                                        class="img-fluid"
                                                                                                        alt="" />
                                                                                                </button>
                                                                                                <ul class="dropdown-menu shadow"
                                                                                                    aria-labelledby="dropdownMenuButton1">
                                                                                                    <li data-bs-toggle="modal"
                                                                                                        data-bs-target="#exampleModal">
                                                                                                        <a class="dropdown-item"
                                                                                                            href="#">Update</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a class="dropdown-item"
                                                                                                            href="#">Remove</a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-lg-4">
                                                                        <div class="card-shadow p-3 my-2">
                                                                            <div
                                                                                class="d-flex justify-content-between align-items-center">
                                                                                <div>
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-2">
                                                                                        <div
                                                                                            class="rounded-circle attached-links-bg d-flex justify-content-center align-items-center">
                                                                                            <div
                                                                                                class="d-flex justify-content-center align-items-center attached-social-links">
                                                                                                <img src="./assets/images/instagram.svg"
                                                                                                    class="img-fluid"
                                                                                                    alt="" />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <h6
                                                                                                class="m-0 fw-600 fs-13">
                                                                                                Instagram
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    <div
                                                                                        class="d-flex align-items-center">
                                                                                        <div>
                                                                                            <div
                                                                                                class="form-check form-switch">
                                                                                                <input
                                                                                                    class="form-check-input"
                                                                                                    type="checkbox"
                                                                                                    id="flexSwitchCheckChecked"
                                                                                                    checked />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <div class="dropdown">
                                                                                                <button class="btn"
                                                                                                    type="button"
                                                                                                    id="dropdownMenuButton1"
                                                                                                    data-bs-toggle="dropdown"
                                                                                                    aria-expanded="false">
                                                                                                    <img src="./assets/images/dropdown-dots.svg"
                                                                                                        class="img-fluid"
                                                                                                        alt="" />
                                                                                                </button>
                                                                                                <ul class="dropdown-menu shadow"
                                                                                                    aria-labelledby="dropdownMenuButton1">
                                                                                                    <li data-bs-toggle="modal"
                                                                                                        data-bs-target="#exampleModal">
                                                                                                        <a class="dropdown-item"
                                                                                                            href="#">Update</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a class="dropdown-item"
                                                                                                            href="#">Remove</a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-lg-4">
                                                                        <div class="card-shadow p-3 my-2">
                                                                            <div
                                                                                class="d-flex justify-content-between align-items-center">
                                                                                <div>
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-2">
                                                                                        <div
                                                                                            class="rounded-circle attached-links-bg d-flex justify-content-center align-items-center">
                                                                                            <div
                                                                                                class="d-flex justify-content-center align-items-center attached-social-links">
                                                                                                <img src="./assets/images/link-icon.svg"
                                                                                                    class="img-fluid"
                                                                                                    alt="" />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <h6
                                                                                                class="m-0 fw-600 fs-13">
                                                                                                Instagram
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    <div
                                                                                        class="d-flex align-items-center">
                                                                                        <div>
                                                                                            <div
                                                                                                class="form-check form-switch">
                                                                                                <input
                                                                                                    class="form-check-input"
                                                                                                    type="checkbox"
                                                                                                    id="flexSwitchCheckChecked"
                                                                                                    checked />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <div class="dropdown">
                                                                                                <button class="btn"
                                                                                                    type="button"
                                                                                                    id="dropdownMenuButton1"
                                                                                                    data-bs-toggle="dropdown"
                                                                                                    aria-expanded="false">
                                                                                                    <img src="./assets/images/dropdown-dots.svg"
                                                                                                        class="img-fluid"
                                                                                                        alt="" />
                                                                                                </button>
                                                                                                <ul class="dropdown-menu shadow"
                                                                                                    aria-labelledby="dropdownMenuButton1">
                                                                                                    <li data-bs-toggle="modal"
                                                                                                        data-bs-target="#exampleModal">
                                                                                                        <a class="dropdown-item"
                                                                                                            href="#">Update</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a class="dropdown-item"
                                                                                                            href="#">Remove</a>
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
                                                        <div class="tab-pane fade min-vh-100" id="nav-contact"
                                                            role="tabpanel" aria-labelledby="nav-contact-tab">
                                                            <div class="row my-3 align-items-center">
                                                                <div class="col-3 col-lg-6">
                                                                    <div class="d-flex gap-3 align-items-center">
                                                                        <div class="card-icon">
                                                                            <img src="./assets/images/id-card-icon.svg"
                                                                                class="img-fluid" alt="" />
                                                                        </div>
                                                                        <div>
                                                                            <h6 class="fw-700 m-0">ID</h6>
                                                                            <p class="truncate m-0">
                                                                                https://vlinq.co/p/8ee58242-a850-432a-8d99-e4844cf99120
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-3 col-lg-2">
                                                                    <h6 class="fw-700">Type</h6>
                                                                    <p class="m-0">Card</p>
                                                                </div>
                                                                <div class="col-3 col-lg-2">
                                                                    <h6 class="fw-700">Status</h6>
                                                                    <p class="m-0">Active</p>
                                                                </div>
                                                                <div class="col-3 col-lg-2">
                                                                    <h6 class="fw-700">Action</h6>
                                                                    <div class="form-check form-switch">
                                                                        <input class="form-check-input"
                                                                            type="checkbox"
                                                                            id="flexSwitchCheckChecked" checked />
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="d-flex justify-content-center align-items-center">
                                                                <div class="modal fade" id="customModal1"
                                                                    aria-hidden="true"
                                                                    aria-labelledby="customModalLabel1"
                                                                    tabindex="-1">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content p-2">
                                                                            <div class="modal-body">
                                                                                <div class="row my-lg-3 my-2">
                                                                                    <div class="col-lg-3 col-3"></div>
                                                                                    <div class="col-lg-7 col-8">
                                                                                        <h4>Activate card</h4>
                                                                                    </div>
                                                                                    <div class="col-lg-2 col-1">
                                                                                        <div
                                                                                            class="d-flex justify-content-end">
                                                                                            <button type="button"
                                                                                                class="btn-close"
                                                                                                data-bs-dismiss="modal"
                                                                                                aria-label="Close"></button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <button
                                                                                    class="btn btn-custom-bg w-100 open-custom-modal2"
                                                                                    data-bs-target="#customModal2"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-dismiss="modal">
                                                                                    <div
                                                                                        class="d-flex justify-content-center align-items-center">
                                                                                        <div
                                                                                            class="d-flex align-items-center gap-4">
                                                                                            <div class="scan-by-qr">
                                                                                                <img src="./assets/images/scan-by-qr.svg"
                                                                                                    class="img-fluid"
                                                                                                    alt="" />
                                                                                            </div>
                                                                                            <div>
                                                                                                <p
                                                                                                    class="m-0 text-white">
                                                                                                    Scan by QR</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </button>

                                                                                <div class="separator-container my-2">
                                                                                    <hr class="line" />
                                                                                    <span class="or-text">OR</span>
                                                                                    <hr class="line" />
                                                                                </div>
                                                                                <div class="">
                                                                                    <button
                                                                                        class="btn w-100 btn-custom-bg open-custom-modal3"
                                                                                        data-bs-target="#customModal3"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-dismiss="modal">
                                                                                        <div
                                                                                            class="d-flex justify-content-center align-items-center">
                                                                                            <div
                                                                                                class="d-flex align-items-center gap-4">
                                                                                                <div
                                                                                                    class="scan-by-qr">
                                                                                                    <img src="./assets/images/scan-by-nfc.svg"
                                                                                                        class="img-fluid"
                                                                                                        alt="" />
                                                                                                </div>
                                                                                                <div>
                                                                                                    <p
                                                                                                        class="m-0 text-white">
                                                                                                        Scan by NFC
                                                                                                    </p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </button>

                                                                                    <div
                                                                                        class="px-3 py-1 border-dark mt-5 mb-0 border border-1 rounded-pill d-flex justify-content-between align-items-center">
                                                                                        <div>
                                                                                            <input type="text"
                                                                                                class="form-control border-0"
                                                                                                placeholder="Activate By URL" />
                                                                                        </div>
                                                                                        <div>
                                                                                            <button class="btn p-0">
                                                                                                <img src="./assets/images/send-url-icon.svg"
                                                                                                    class="img-fluid"
                                                                                                    alt="" />
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="modal fade" id="customModal2"
                                                                    aria-hidden="true"
                                                                    aria-labelledby="customModalLabel2"
                                                                    tabindex="-1">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-body">
                                                                                <div
                                                                                    class="d-flex justify-content-end">
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div
                                                                                    class="d-flex justify-content-center align-items-center">
                                                                                    <div class="qr-code">
                                                                                        <img src="./assets/images/QR-code.svg"
                                                                                            class="img-fluid"
                                                                                            alt="" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="text-center mt-2">
                                                                                    <button
                                                                                        class="btn btn-custom-bg text-white w-25 rounded-pill">
                                                                                        Scan
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="modal fade" id="customModal3"
                                                                    aria-hidden="true"
                                                                    aria-labelledby="customModalLabel3"
                                                                    tabindex="-1">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-body">
                                                                                <div
                                                                                    class="d-flex justify-content-end">
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div
                                                                                    class="d-flex justify-content-center align-items-center">
                                                                                    <div class="qr-code">
                                                                                        <img src="./assets/images/nfc.svg"
                                                                                            class="img-fluid"
                                                                                            alt="" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="text-center">
                                                                                    <p class="text-danger">
                                                                                        Tap your NFC in mobile view only
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a class="btn btn-custom-bg my-5 activate-custom-card d-flex gap-2 align-items-center"
                                                                    data-bs-toggle="modal" href="#customModal1"
                                                                    role="button">
                                                                    <div>
                                                                        <img src="./assets/images/btn-QR.svg"
                                                                            class="img-fluid" alt="" />
                                                                    </div>
                                                                    <div>
                                                                        <h6 class="text-white m-0">Activate card</h6>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                    aria-labelledby="v-pills-settings-tab">
                                    <div class="p-4 card-shadow my-1">
                                        <h5 class="navy-blue fw-bold">All Students</h5>
                                        <h5 class="navy-blue text-center">Welcome to the ANGELS School System
                                            Students List
                                        </h5>
                                        <div class="d-flex justify-content-end my-3">
                                            <div class="d-flex gap-2 align-items-center">
                                                <div>
                                                    <h5>Search: </h5>
                                                </div>
                                                <div>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-3 border">
                                            <table class="table bg-transparent table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Student ID</th>
                                                        <th scope="col">Name </th>
                                                        <th scope="col">Father's Name</th>
                                                        <th scope="col">Class</th>
                                                        <th scope="col">Contact Number</th>
                                                        <th scope="col">Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">001</th>
                                                        <td>Mark</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>
                                                        <td>@mdo</td>
                                                        <td>@mdo</td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>Jacob</td>
                                                        <td>Thornton</td>
                                                        <td>@fat</td>
                                                        <td>@fat</td>
                                                        <td>@fat</td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td colspan="2">Larry the Bird</td>
                                                        <td>@twitter</td>
                                                        <td>@twitter</td>
                                                        <td>@twitter</td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination justify-content-end">
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" tabindex="-1"
                                                            aria-disabled="true">Previous</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">Next</a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.admin.partials.footer')
    </div>

    @include('layouts.admin.partials.js')
</body>

</html>
