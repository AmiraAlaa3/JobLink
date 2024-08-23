<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container">
    <h1 class="text-center">Job Listings</h1>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('jobs.index') }}" class="mb-4">
        <div class="row">
            <div class="col-md-4 mt-4">
                <label class="mb-1" for="category_id">Filter by Category:</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4 mt-4">
                <label class="mb-1" for="location_id">Filter by Location:</label>
                <select name="location_id" id="location_id" class="form-control">
                    <option value="">All Locations</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}" {{ request('location_id') == $location->id ? 'selected' : '' }}>
                            {{ $location->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mt-4">
                <label class="mb-1" for="title">Filter by Title:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ request('title') }}" placeholder="Job Title">
            </div>

            <div class="col-md-3  mt-4 ">
                <label class="mb-1" for="created_at">Filter by Date of Creation:</label>
                <input type="date" name="created_at" id="created_at" class="form-control" value="{{ request('created_at') }}">
            </div>
            <div class="col-md-2  mt-4">
                <label class="mb-1" for="salary_min">Min Salary:</label>
                <input type="number" name="salary_min" id="salary_min" class="form-control" value="{{ request('salary_min') }}" placeholder="Min Salary">
            </div>

            <div class="col-md-2  mt-4">
                <label class="mb-1" for="salary_max">Max Salary:</label>
                <input type="number" name="salary_max" id="salary_max" class="form-control" value="{{ request('salary_max') }}" placeholder="Max Salary">
            </div>
            <div class="col-md-3 mt-4">
                <label class="mb-1" for="experience_level">Experience Level:</label>
                <select name="experience_level" id="experience_level" class="form-control">
                    <option value="">All Levels</option>
                    <option value="Entry" {{ request('experience_level') == 'Entry' ? 'selected' : '' }}>Entry</option>
                    <option value="Mid" {{ request('experience_level') == 'Mid' ? 'selected' : '' }}>Mid</option>
                    <option value="Senior" {{ request('experience_level') == 'Senior' ? 'selected' : '' }}>Senior</option>
                </select>
            </div>



            <div class="col-md-4 mt-4 align-self-center" >
                <button type="submit" class="btn btn-primary">Apply Filters</button>
            </div>
        </div>
    </form>

    <!-- Job Listings Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Job Title</th>
                <th>Category</th>
                <th>Location</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($jobs as $job)
                <tr>
                    <td>{{ $job->title }}</td>
                    <td>{{ $job->category->name }}</td>
                    <td>{{ $job->location->name }}</td>
                    <td>{{ $job->description }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No jobs found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>