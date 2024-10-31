<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">

    <title>{{ $title ?? 'ISG SCHOOL' }}</title>

    @include('layouts.school.partials.css')
    {{-- @livewireStyles --}}
</head>

<body class="app">

    <header class="app-header fixed-top">
        @include('layouts.school.partials.navbar')
        @include('layouts.school.partials.sidepannel')
    </header>


    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            @yield('content')
        </div>
    </div>

    @include('layouts.school.partials.js')
    @yield('script')
    {{-- @livewireScripts --}}
</body>

</html>
