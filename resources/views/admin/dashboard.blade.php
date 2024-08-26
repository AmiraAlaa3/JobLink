<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    <div class="container p-4">
    <h1 class="text-center mb-5">Admin Dashboard</h1>
    <div class="row g-5">
        <div class="col-sm-12 col-md-4 bg-success p-3 rounded-pill">
            <h3 class="text-white">{{ $applicationsCount }} Total Applications</h3>
        </div>
        <div class="col-sm-12 col-md-4 bg-success p-3  rounded-pill">
            <h3 class="text-white">{{ $candidatesCount }} All Candidates</h3>
        </div>
        <div class="col-sm-12 col-md-4 bg-success p-3  rounded-pill">
            <h3 class="text-white">{{ $employersCount }} Total Employers</h3>
        </div>
        <div class="col-sm-12 col-md-4 bg-success p-3  rounded-pill">
            <h3 class="text-white">{{ $locationsCount }} Total Locations</h3>
        </div>
        <div class="col-sm-12 col-md-4 bg-success p-3  rounded-pill">
            <h3 class="text-white">{{ $categoriesCount }} Total Categories</h3>
        </div>
        <div class="col-sm-12 col-md-4 bg-success p-3  rounded-pill">
            <h3 class="text-white">{{ $jobsCount }} Total Jobs</h3>
        </div>
    </div>
    </div>





 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</body>
</html>