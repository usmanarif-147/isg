<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('layouts.student.partials.css')
    @include('layouts.student.partials.js')
    <title>Dashboard</title>

</head>

<body>

    <section>
        <div class="container-fluid">
            <div class="row sidebar-bg">

                @include('layouts.student.partials.sidebar')

                <div class="col-12 col-lg-10 right-sider-radius bg-light p-0">
                    @include('layouts.student.partials.navbar')
                    <hr class="m-0">
                    @yield('content')

                </div>
            </div>
        </div>
    </section>




</body>

</html>
