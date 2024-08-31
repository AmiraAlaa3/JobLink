@extends('layouts.app')

@section('title', 'Jobs')

@section('content')
    <h1 class="fs-3 fw-semibold mb-3">Explore New Career Opportunities</h1>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('jobs.index') }}" class="mb-4">
        <div class="row border p-4 rounded shadow-sm bg-light">
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
            <div class="col-md-4 mt-4">
                <label class="mb-1" for="title">Filter by Title:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ request('title') }}"
                    placeholder="Job Title">
            </div>

            <div class="col-md-4  mt-4 ">
                <label class="mb-1" for="created_at">Filter by Date of Creation:</label>
                <input type="date" name="created_at" id="created_at" class="form-control"
                    value="{{ request('created_at') }}">
            </div>
            <div class="col-md-2  mt-4">
                <label class="mb-1" for="salary_min">Min Salary:</label>
                <input type="number" name="salary_min" id="salary_min" class="form-control"
                    value="{{ request('salary_min') }}" placeholder="Min Salary">
            </div>

            <div class="col-md-2  mt-4">
                <label class="mb-1" for="salary_max">Max Salary:</label>
                <input type="number" name="salary_max" id="salary_max" class="form-control"
                    value="{{ request('salary_max') }}" placeholder="Max Salary">
            </div>
            <div class="col-md-4 mt-4">
                <label class="mb-1" for="experience_level">Experience Level:</label>
                <select name="experience_level" id="experience_level" class="form-control">
                    <option value="">All Levels</option>
                    <option value="Entry" {{ request('experience_level') == 'Entry' ? 'selected' : '' }}>Entry</option>
                    <option value="Mid" {{ request('experience_level') == 'Mid' ? 'selected' : '' }}>Mid</option>
                    <option value="Senior" {{ request('experience_level') == 'Senior' ? 'selected' : '' }}>Senior</option>
                </select>
            </div>



            <div class="col-md-4 mt-4 align-self-center">
                <button type="submit" class="btn btn-primary">Apply Filters</button>
            </div>
        </div>
    </form>

    <!-- Job Listings -->
    <div class="row align-items-center justify-content-center">
        <div class="col-md-10 col-lg-12">
            <div class="row my-5">
                @forelse ($jobs as $job)
                    <div class="col-md-12 col-lg-8 mb-4">
                        <div class="card border-special">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-3 text-center p-3">
                                    @if ($job->employer->company_logo)
                                        <img src="{{ asset('uploads/' . $job->employer->company_logo) }}"
                                            alt="company_logo" class="company-logo img-fluid" width="100px">
                                    @else
                                        <img src="{{ asset('images/company-placeholder.png') }}" alt="company_logo"
                                            class="company-logo img-fluid" width="100px">
                                    @endif
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <h5 class="card-title" style="color:rgb(0, 85, 217)">
                                            <a class="text-decoration-none" href={{route('jobs.show' ,$job->id )}} >
                                                {{ $job->title }}
                                            </a>
                                        </h5>
                                        <p class="card-text">
                                            Company: {{ $job->employer->company_name }}<br>
                                            Location: {{ $job->location->name }}<br>
                                            Posted on: {{ $job->created_at->format('M d, Y') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">
                        No jobs found.
                    </p>
                @endforelse
            </div>
        </div>
    </div>

@endsection
