<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- meta tages --}}
    <meta name="keywords"
        content="Wuzzuf, jobs in Egypt, job board, careers, employment, find jobs, apply for jobs, top employers, career opportunities">
    <meta property="og:title" content="Wuzzuf - Your Premier Job Search Platform in Egypt">
    <meta property="og:description"
        content="Find your dream job on Wuzzuf, Egypt's leading job board. Search for jobs in various industries, apply online, and connect with top employers. Start your career journey with us today.">
    <meta property="og:image" content="{{ asset('images/work-in-progress.png') }}">
    <meta property="og:type" content="website">

    <link rel="icon" href={{ asset('images/work-in-progress.png') }} type="image/x-icon">
    {{-- icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Wuzzuf</title>
</head>

<body>
    <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark p-3">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold fs-3" style="color:rgb(0, 85, 217)" href="#">Wuzzuf</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="">For Employers</a>
                        </li>
                    </ul>
                    <div class="d-flex align-items-center ms-lg-5 me-2 my-sm-3">
                        <a href="{{ route('login') }}" class="btn btn-outline-primary mx-3">Login</a>
                        <a href="{{ route('login') }}" class="btn btn-primary">Get Start</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 hero-section">
        <div id="carouselExampleCaptions" class="carousel slide overlay-bottom hero-section" data-bs-ride="carousel">
            <div class="carousel-inner hero-section">
                <div class="carousel-item active hero-section"> <!-- data-bs-interval="1000" -->
                    <img src="{{ asset('images/back.webp') }}" class="d-block w-100 h-100" alt="">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center p-5">
                        <h1 class="text-white font-weight-medium fw-semibold display-4 mb-3 hero-title">Find the Best
                            Jobs in Egypt</h1>
                        <p class="text-white fs-5 mb-5 hero-text">
                            Searching for vacancies & career opportunities? WUZZUF helps you in your job search in Egypt
                        </p>
                        <div class="row height d-flex justify-content-center align-items-center w-100">
                            <div class="col-md-8">
                                <div class="search">
                                    <i class="fa fa-search"></i>
                                    <input type="text" class="form-control" placeholder="Search Jobs (e.g. Senior PHP developer)">
                                    <button class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

              <div class="carousel-item hero-section">
                 <img src="{{ asset('images/hero1.webp') }}" class="d-block w-100 h-100" alt="" />
                 <div class="carousel-caption d-flex flex-column align-items-center justify-content-center p-5">
                    <h1 class="text-white font-weight-medium fw-semibold display-4 mb-3 hero-title">Hire Smarter. Grow Faster.</h1>
                    <p class="text-white fs-5 mb-5 hero-text">
                        With Egypt’s #1 Online Recruitment Platform
                    </p>
                    <a href="{{ route('login') }}" class="btn btn-primary">Start Hirimg Now</a>
                 </div>
              </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Footer -->
    <footer class="text-center text-lg-start bg-body-dark text-white" style="background-color: #031431;">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>

        <section class="">
            <div class="container text-center text-md-start mt-5">

                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Wuzzuf
                        </h6>
                        <p>
                            Find your dream job on Wuzzuf, Egypt's leading job board. Search for jobs in various
                            industries, apply online, and connect with top employers. Start your career journey with us
                            today.
                        </p>
                    </div>

                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Links
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">About</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Home</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Contact</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Blog</a>
                        </p>
                    </div>

                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Pricing</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Settings</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Jobs</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Help</a>
                        </p>
                    </div>

                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3"></i>Menofia, Egypt</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            ameraalaa641@gmail.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i>+20 1005729533</p>

                    </div>
                </div>
            </div>
        </section>

        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2024 Copyright:
            <a class="text-reset fw-bold" href="">ANMHM</a>
        </div>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
