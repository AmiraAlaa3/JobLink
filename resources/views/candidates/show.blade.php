@extends('layouts.app')

@section('title', 'Jobs')

@section('content')
    <div class="row g-3 justify-content-between">
        <div class="left d-flex justify-content-between  col-lg-8 col-md-7 col-sm-12  bg-light  p-4">
            <div class="left">
                <h4 class="mb-3 fs-3 fw-semibold">{{ $job->title }}</h4>
                <span class="bg-secondary text-light p-1 rounded">{{ $job->work_type }}</span>
                <p class="mt-3 text-muted  mb-0">{{ $job->created_at->diffInDays(now()) }} days ago</p>
                <p class="text-muted">{{ $applicationCount }} {{ Str::plural('application', $applicationCount) }}
                </p>

                @if (auth()->user()->candidate && auth()->user()->candidate->applications->contains('job_posting_id', $job->id))
                    <p class="text-success">You have already applied for this job.</p>
                @else
                    <a href="{{ route('job.apply', $job->id) }}" class="btn btn-info">Apply</a>
                @endif
            </div>
            <div class="right">
                @if ($job->employer->company_name)
                    <img src="{{ asset('uploads/' . $job->employer->company_logo) }}"
                        alt="{{ $job->employer->company_name }} logo" class="img-fluid" width="115px">
                @else
                    <p>No logo available</p>
                @endif
            </div>
        </div>
        <div class="right col-lg-3 col-md-4  col-sm-12  bg-light  p-4">

            <ul class="list-unstyled ">
                <li class="mb-2"> {{ $job->employer->company_name }}</li>
                @if ($job->employer->company_website)
                    <li class="mb-2"><a href={{ $job->employer->company_website }} target='_blank'>website</a></li>
                @endif
                <li class="mb-2">{{ $job->employer->phone_number }} </li>

            </ul>
        </div>
        <div class="left  col-lg-8 col-md-7 col-sm-12  bg-light p-4 ">
            <h5 class="fw-bold">Job Details</h5>
            <p> Salary : {{ $job->salary_range }}</p>
            <p> location : {{ $job->location->name }}</p>
            <br />
            <h5 class="fw-bold"> Required skills</h5>
            <p>{{ $job->skills_required }}</p>
            <br />
            <h5 class="fw-bold"> Job descreption</h5>
            <p>{{ $job->description }}</p>
            <br />
            <h5 class="fw-bold">Category</h5>
            <p>{{ $job->category->name }}</p>
        </div>
    </div>

    </div>
@endsection
