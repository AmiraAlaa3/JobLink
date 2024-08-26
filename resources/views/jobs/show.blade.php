@extends('layouts.emp')

@section('title', 'jobs Posts')

@section('content')

    <div class="container m-5 bg-light">
        <h1>{{ $job->title }}</h1>
        <p>{{ $job->description }}</p>
        <p>Skills Required: {{ $job->skills_required }}</p>
        <p>Salary Range: {{ $job->salary_range }}</p>
        <p>Location: {{ $job->location->name }}</p>
        <p>Work Type: {{ ucfirst($job->work_type) }}</p>
        <p>Application Deadline: {{ $job->application_deadline->format('F j, Y') }}</p>

        <a href="{{ route('job_posting.index') }}" class="btn btn-primary">Back to Jobs</a>
    </div>
@endsection
