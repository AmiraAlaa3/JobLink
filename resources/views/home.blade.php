@extends('layouts.home')

@Section('main')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 hero-section">
        <div id="carouselExampleCaptions" class="carousel slide overlay-bottom hero-section" data-bs-ride="carousel">
            <div class="carousel-inner hero-section">
                <div class="carousel-item active hero-section"> <!-- data-bs-interval="1000" -->
                    <img src="{{ asset('images/back.jpg') }}" class="d-block w-100 h-100" alt="">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center p-5">
                        <h1 class="text-white font-weight-medium fw-semibold display-4 mb-3 hero-title">Find the Best
                            Jobs in Egypt</h1>
                        <p class="text-white fs-5 mb-5 hero-text">
                            Searching for vacancies & career opportunities? JobLink helps you in your job search in Egypt
                        </p>
                        <div class="row height d-flex justify-content-center align-items-center w-100">
                            <div class="col-md-8">
                                <div class="search">
                                    <i class="fa fa-search"></i>
                                    <input type="text" class="form-control"
                                        placeholder="Search Jobs (e.g. Senior PHP developer)">
                                    <button class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="carousel-item hero-section">
                    <img src="{{ asset('images/hero1.webp') }}" class="d-block w-100 h-100" alt="" />
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center p-5">
                        <h1 class="text-white font-weight-medium fw-semibold display-4 mb-3 hero-title">Hire Smarter.
                            Grow Faster.</h1>
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

    {{-- canpany section --}}
    <div class="container-fluid p-5 bg-light">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-10 col-lg-8">
                <h2 class="text-center fs-1 fw-light text-dark">Join Egypt's Top Companies</h2>
                <div id="companyCarousel" class="carousel slide my-5" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @php $chunkedCompanies = $companies->chunk(4); @endphp
                        @foreach ($chunkedCompanies as $index => $companyChunk)
                            <div class="carousel-item @if ($index === 0) active @endif">
                                <div class="row text-center">
                                    @foreach ($companyChunk as $company)
                                        @if ($company->company_logo)
                                            <div class="col-3">
                                                @if ($company->company_website)
                                                    <a href="{{ $company->company_website }}" target="_blank"
                                                        class="pe-auto">
                                                        <img src="{{ asset('uploads/' . $company->company_logo) }}"
                                                            alt="company_logo" class="company img-fluid"
                                                            width="115px">
                                                    </a>
                                                @else
                                                    <img src="{{ asset('uploads/' . $company->company_logo) }}"
                                                        alt="company_logo" class="company img-fluid" width="115px">
                                                @endif
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="campany carousel-control-prev" type="button" data-bs-target="#companyCarousel"
                        data-bs-slide="prev">
                        <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
                        {{-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> --}}
                    </button>
                    <button class="campany carousel-control-next" type="button" data-bs-target="#companyCarousel"
                        data-bs-slide="next">
                        <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                        {{-- <span class="carousel-control-next-icon" aria-hidden="true"></span> --}}
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- jobs section --}}
    <div class="container-fluid p-5 bg-light">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-10 col-lg-8">
                <h2 class="text-center fs-1 fw-light text-dark">Featured Jobs</h2>
                <div class="row my-5">
                    @foreach ($jobs as $job)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card p-3">
                                <div class="card-body">
                                    <a href="" class="text-reset">
                                        <h5 class="card-title fw-bold">{{ $job->title }}</h5>
                                    </a>
                                    <p class="card-text">
                                        Location: {{ $job->location->name }}<br>
                                        Posted on: {{ $job->created_at->format('M d, Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    {{-- Category section --}}
    <div class="container-fluid p-5 bg-light">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-10 col-lg-12">
                <h2 class="text-center fs-1 fw-light text-dark">Browse Jobs by Category</h2>
                <div class="row my-5">
                    @foreach ($categories as $category)
                        <div class="col-md-3 mb-4">
                            <div class="card position-relative category">
                                <img src="{{ asset('images/sales.webp') }}" alt="category_image"
                                    class="card-img-top" width="100%">
                                <div class="card-img-overlay d-flex justify-content-start align-items-end">
                                    <p class="card-title text-white fw-bold">{{ $category->name }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection


