<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />

    <!-- Favicon -->

    <link rel="shortcut icon" href="{{ asset('student/images/favicon.svg') }}" type="image/x-icon">

    <!-- Favicon -->

    <link rel="shortcut icon" href="{{ asset('student/images/favicon.svg') }}" type="image/x-icon">


    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('student/css/style.css') }}" />
    <title>Login</title>
</head>

<body>
    <section>
        <div class="container">
            <div class="row bg-white shadow radius-20 border border-1 my-4">
                <div class="col-12 col-lg-6 p-0 mobile-hidden">
                    <div class="login-bg radius-20 custom-min-vh d-flex justify-content-center align-items-center">
                        <div>
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="{{ asset('student/images/login-picture.svg') }}" class="img-fluid"
                                    alt="" />
                            </div>
                            <h6 class="text-center">
                                "Lorem ipsum dolor sit amet, consectetur
                                <span class="divider"></span> adipiscing elit, sed do eiusmod
                                tempor incididunt
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 p-0">
                    <div class="custom-min-vh d-flex justify-content-center align-items-center">
                        <div>
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="{{ asset('student/images/isg-logo.svg') }}" class="img-fluid"
                                    alt="" />
                            </div>
                            <h5 class="text-center py-3 m-0">Welcome back</h5>

                            @if ($errors->has('auth_failed'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $errors->get('auth_failed')[0] }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            @if (session()->has('message'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('student.login.store') }}">
                                @csrf
                                <input type="text" placeholder="Email or ID" class="form-control" name="email" />
                                <div class="form-group password-container">
                                    <input type="password" class="form-control my-2" id="password"
                                        placeholder="Password" name="password" />
                                    <span class="toggle-password">
                                        <i class="fas fa-eye" id="toggleIcon"></i>
                                    </span>
                                </div>
                                <div class="d-flex justify-content-between my-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                        <label class="form-check-label fs-13 pt-1" for="exampleCheck1">
                                            Remember Me
                                        </label>
                                    </div>
                                    <div>
                                        <a href="#" class="text-decoration-none link-color fs-13">
                                            Forget Password
                                        </a>
                                    </div>
                                </div>
                                <button type="submit" class="btn text-white w-100 btn-custom-bg"">
                                    Login
                                </button>
                            </form>
                            <h6 class="text-center my-3">
                                Don’t have account?
                                <span>
                                    <a href="#" class="text-decoration-none link-color">
                                        Register
                                    </a>
                                </span>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document
            .querySelector(".toggle-password")
            .addEventListener("click", function() {
                const passwordField = document.getElementById("password");
                const toggleIcon = document.getElementById("toggleIcon");
                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    toggleIcon.classList.remove("fa-eye");
                    toggleIcon.classList.add("fa-eye-slash");
                } else {
                    passwordField.type = "password";
                    toggleIcon.classList.remove("fa-eye-slash");
                    toggleIcon.classList.add("fa-eye");
                }
            });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
