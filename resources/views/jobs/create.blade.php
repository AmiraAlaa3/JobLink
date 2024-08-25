{{-- @extends('layouts.app') --}}

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>@yield('title', 'Wuzzuf')</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-ligth bg-ligth mb-5">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold fs-3" style="color:rgb(0, 85, 217)" href="#">Wuzzuf</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href= {{ route('jobs.index') }}>All Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{ route('employer.dashboard') }}>Dashboard</a>
                    </li>

                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
               
            </div>
        </div>
    </nav>
  

    <div class="container m-5 bg-light">
        <h1>{{ isset($job) ? 'Edit Job' : 'Create Job' }}</h1>
        <form action="{{ isset($job) ? route('jobs.update', $job) : route('jobs.store') }}" method="POST">
            @csrf
            @if(isset($job))
                @method('PUT')
            @endif
    
            <!-- Job Title -->
            <div class="form-group">
                <label for="title">Job Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $job->title ?? '') }}" required>
            </div>
    
            <!-- Job Description -->
            <div class="form-group">
                <label for="description">Job Description</label>
                <textarea name="description" class="form-control" required>{{ old('description', $job->description ?? '') }}</textarea>
            </div>
    
            <!-- Skills Required -->
            <div class="form-group">
                <label for="skills_required">Skills Required</label>
                <input type="text" name="skills_required" class="form-control" value="{{ old('skills_required', $job->skills_required ?? '') }}" required>
            </div>
    
            <!-- Salary Range -->
            <div class="form-group">
                <label for="salary_range">Salary Range</label>
                <input type="text" name="salary_range" class="form-control" value="{{ old('salary_range', $job->salary_range ?? '') }}" required>
            </div>
    
            <!-- Location -->
            <div class="form-group">
                <label for="location_id">Location</label>
                <select name="location_id" class="form-control" required>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}" {{ isset($job) && $job->location_id == $location->id ? 'selected' : '' }}>{{ $location->name }}</option>
                    @endforeach
                </select>
            </div>
    
            <!-- Work Type -->
            <div class="form-group">
                <label for="work_type">Work Type</label>
                <select name="work_type" class="form-control" required>
                    <option value="remote" {{ isset($job) && $job->work_type == 'remote' ? 'selected' : '' }}>Remote</option>
                    <option value="on-site" {{ isset($job) && $job->work_type == 'on-site' ? 'selected' : '' }}>On-Site</option>
                    <option value="hybrid" {{ isset($job) && $job->work_type == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                </select>
            </div>
    
            <!-- Application Deadline -->
            <div class="form-group">
                <label for="application_deadline">Application Deadline</label>
                <input type="date" name="application_deadline" class="form-control" value="{{ old('application_deadline', $job->application_deadline ?? '') }}" required>
            </div>
    
            <!-- Category (optional) -->
            <div class="form-group">
                <label for="category_id">Category (optional)</label>
                <select name="category_id" class="form-control">
                    <!-- Assuming you have a $categories variable to select from -->
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ isset($job) && $job->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
    
            <button type="submit" class="btn btn-success">{{ isset($job) ? 'Update Job' : 'Create Job' }}</button>
        </form>
    </div>
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
                            Find your dream job on Wuzzuf, Egypt's leading job board. Search for jobs in various industries, apply online, and connect with top employers. Start your career journey with us today.
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
{{-- @section('content') --}}

{{-- @endsection --}}
