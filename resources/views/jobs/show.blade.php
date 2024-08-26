@extends('layouts.emp')

@section('title', 'jobs Posts')

@section('content')

<div class="container my-5 p-5 bg-white rounded shadow-sm">
    <div class="mb-4">
        <h1 class="display-5">{{ $job->title }}</h1>
    </div>
    <div class="mb-4">
        <p class="text-muted">{{ $job->description }}</p>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <p><strong>Skills Required:</strong> {{ $job->skills_required }}</p>
        </div>
        <div class="col-md-6">
            <p><strong>Salary Range:</strong> {{ $job->salary_range }}</p>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <p><strong>Location:</strong> {{ $job->location->name }}</p>
        </div>
        <div class="col-md-6">
            <p><strong>Work Type:</strong> {{ ucfirst($job->work_type) }}</p>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
          <p><strong>Application Deadline:</strong> {{ $job->application_deadline->format('F j, Y') }}</p>
        </div>
        <div class="col-md-6">
            <p class="card-text"><strong>Status:</strong>
                @if($job->status == 'active')
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-danger">Inactive</span>
                @endif
            </p>
        </div>
    </div>



    <div class="d-flex justify-content-end">
        <a href="{{ route('job_posting.index') }}" class="btn btn-primary btn-lg">Back to Jobs</a>
    </div>
</div>

@endsection
