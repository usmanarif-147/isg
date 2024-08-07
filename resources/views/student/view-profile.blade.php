<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Hello, world!</title>

    <style>
        .bg-profile {
            background-color: #96B6C5;
        }

        .profile-card {
            border-radius: 20px;
        }


        .social-profile {
            height: 30px;
            width: 30px;
        }

        .user-profile-picture {
            height: 100px;
            width: 100px;
            margin-top: -70px;

        }

        .user-profile-picture img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            border: 1px solid #fff;
        }

        .social-media-icon {
            height: 30px;
            width: 30px;
        }

        .social-links {
            transition: 0.4s;
        }

        .social-links:hover {
            transform: scale(1.03);
        }

        .social-link-text {
            font-size: 13px;
        }

        .custom-margin {
            padding-top: 100px !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-5">
                <div class="bg-profile px-3">
                    <div class="custom-margin">
                        <div class="profile-card bg-white p-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="user-profile-picture">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVsYvLCz9lCxHZzoIFItkiC1BZo52JV7qmYA&s"
                                        class="img-fluid shadow rounded-circle" alt="">
                                </div>
                            </div>
                            <h6 class="text-center mt-2">username_haseeb</h6>
                            <p class="text-center ">haseeb@gmail.com</p>
                            <h6 class="">About Me</h6>
                            <p class="lh-sm">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                Magni
                                nam
                                officiis praesentium
                                vitae sequi, alias illum optio perspiciatis soluta aliquid!</p>
                            <div class="d-flex justify-content-center">

                                <a href="#">
                                    <button class="btn bg-warning">Save Contact</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="py-4">
                        <div class="bg-white p-2 rounded social-links rounded-5 my-2">
                            <a href="#" target="_blank"
                                class="d-flex gap-2 align-items-center text-decoration-none">
                                <div class="social-media-icon">
                                    <img src="https://store-images.s-microsoft.com/image/apps.30645.9007199266245907.cb06f1f9-9154-408e-b4ef-d19f2325893b.ac3b465e-4384-42a8-9142-901c0405e1bc"
                                        class="img-fluid rounded-circle" alt="">
                                </div>
                                <div>
                                    <h6 class="m-0 text-dark">Facebook</h6>
                                    <p class="m-0 text-secondary social-link-text">
                                        https://facebook.com/username.haseeb</p>
                                </div>
                            </a>
                        </div>
                        <div class="bg-white p-2 rounded social-links rounded-5 my-2">
                            <a href="#" target="_blank"
                                class="d-flex gap-2 align-items-center text-decoration-none">
                                <div class="social-media-icon">
                                    <img src="https://img.freepik.com/free-vector/instagram-background-gradient-colors_23-2147823814.jpg?size=338&ext=jpg&ga=GA1.1.2008272138.1722988800&semt=ais_hybrid"
                                        class="img-fluid rounded-circle" alt="">
                                </div>
                                <div>
                                    <h6 class="m-0 text-dark">Instagram</h6>
                                    <p class="m-0 text-secondary social-link-text">
                                        https://instagram.com/username.haseeb</p>
                                </div>
                            </a>
                        </div>
                        <div class="bg-white p-2 rounded social-links rounded-5 my-2">
                            <a href="#" target="_blank"
                                class="d-flex gap-2 align-items-center text-decoration-none">
                                <div class="social-media-icon">
                                    <img src="https://img.freepik.com/free-vector/new-2023-twitter-logo-x-icon-design_1017-45418.jpg?size=338&ext=jpg&ga=GA1.1.2008272138.1722902400&semt=ais_hybrid"
                                        class="img-fluid rounded-circle" alt="">
                                </div>
                                <div>
                                    <h6 class="m-0 text-dark">Twitter</h6>
                                    <p class="m-0 text-secondary social-link-text">
                                        https://twitter.com/username.haseeb</p>
                                </div>
                            </a>
                        </div>
                        <div class="bg-white p-2 rounded social-links rounded-5 my-2">
                            <a href="#" target="_blank"
                                class="d-flex gap-2 align-items-center text-decoration-none">
                                <div class="social-media-icon">
                                    <img src="https://store-images.s-microsoft.com/image/apps.7973.14208673485779370.88f23073-7e41-4921-aef9-76103983bd31.9d2f4ec1-724a-4efd-8a3b-1068ecdd2513"
                                        class="img-fluid rounded-circle" alt="">
                                </div>
                                <div>
                                    <h6 class="m-0 text-dark">Snapchat</h6>
                                    <p class="m-0 text-secondary social-link-text">
                                        https://snapchat.com/username.haseeb</p>
                                </div>
                            </a>
                        </div>
                        <div class="bg-white p-2 rounded social-links rounded-5 my-2">
                            <a href="#" target="_blank"
                                class="d-flex gap-2 align-items-center text-decoration-none">
                                <div class="social-media-icon">
                                    <img src="https://play-lh.googleusercontent.com/XDhPprJ5SutyrwyM2KxdxoUdkkzG3uCNXcqPmAj7IJuSsTIRD6TBz54yOIGM9QLxyQ"
                                        class="img-fluid rounded-circle" alt="">
                                </div>
                                <div>
                                    <h6 class="m-0 text-dark">vlinq</h6>
                                    <p class="m-0 text-secondary social-link-text">
                                        https://vlinq.com/username.haseeb</p>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
