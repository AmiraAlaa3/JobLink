<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="./style.css" rel="stylesheet">
</head>
<body class="">
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li>
            
            <li class="nav-item">
            <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>
<div class="container mt-5">
        <div class="row g-3 justify-content-between">
            <div class="left d-flex justify-content-between  col-lg-8 col-md-7 col-sm-12  bg-light  p-4">
                <div class="left">

                    <h4>{{ $job->title }}</h4>
                    <h4>{{ $job->work_type }}</h4>
                    <h4>{{$job->created_at->diffInDays(now()) }} days ago</h4>
                    <p>{{ $applicationCount }} {{ Str::plural('application', $applicationCount) }}</p>
                    <a href="{{ route('jobs.apply', $job->id) }}" class="btn btn-info">Apply</a>
                </div>
                <div class="right">
                    @if($job->employer->logo)
                        <img src="{{ asset($job->employer->logo) }}" alt="{{ $job->employer->company_name }} logo" class="img-fluid">
                    @else
                        <p>No logo available</p>
                    @endif
                </div>
            </div>
            <div class="right col-lg-3 col-md-4  col-sm-12  bg-light  p-4">
                
                <ul class="list-unstyled ">
                    <li class="mb-2"> {{$job->employer->company_name}}</li>
                    <li class="mb-2">{{ $job->employer-> company_website}}</li>
                    <li class="mb-2">{{ $job->employer-> phone_number}} </li>
                    
                </ul>
            </div>
            <div class="left  col-lg-8 col-md-7 col-sm-12  bg-light p-4 ">
            <h4>Job Details</h4>
            <p> Salary : {{$job->salary_range}}</p>
            <p> location : {{$job->location->name}}</p>
            <br/>
            <h4> Required skills</h4>
            <p>{{$job->skills_required}}</p>
            <br/>
            <h4> Job descreption</h4>
            <p>{{$job->description}}</p>
            <br/>
            <h3>Category</h3>
            <p>{{ $job->category->name }}</p>





            </div>
        </div>

    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>