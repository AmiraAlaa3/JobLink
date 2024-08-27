<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- meta tages --}}
    <meta name="keywords"
        content="JobJourney, jobs in Egypt, job board, careers, employment, find jobs, apply for jobs, top employers, career opportunities">
    <meta property="og:title" content="JobJourney - Your Premier Job Search Platform in Egypt">
    <meta property="og:description"
        content="Find your dream job on JobJourney, Egypt's leading job board. Search for jobs in various industries, apply online, and connect with top employers. Start your career journey with us today.">
    <meta property="og:image" content="{{ asset('images/work-in-progress.png') }}">
    <meta property="og:type" content="website">

    <link rel="icon" href={{ asset('images/work-in-progress.png') }} type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>@yield('title', 'JobJourney')</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-ligth bg-ligth mb-5">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold fs-3" style="color:rgb(0, 85, 217)" href="#">JobJourney</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href={{route('admin.dashboard')}}>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{ route('admin.jobs') }}>All Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{ route('admin.admins') }}>Admins</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{ route('admin.allJobs') }}>Check Jobs</a>
                    </li>

                </ul>

                <div class="d-flex align-items-center ms-lg-5 me-2 my-sm-3">
                    @if (auth()->check())
                        @if ($admin->image)
                            <img src="{{ asset('uploads/' . $admin->image) }}" alt="User Picture"
                                width="40" height="40" class="rounded-circle d-inline-block align-text-top">
                        @else
                            <img src="{{ asset('images/user.png') }}" alt="User Profile Picture" width="40"
                                height="40" class="rounded-circle d-inline-block align-text-top">
                        @endif
                        <!-- Display Company Name -->
                        <span class="ms-2">{{ Auth::user()->name }}</span>

                        <a href="{{ route('logout') }}" class="btn btn-outline-danger ms-3">Logout</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
                    @endif
                </div>

            </div>
        </div>
    </nav>
    <div class="container my-5">
        @include('partials.alert')
        @yield('content')
    </div>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
