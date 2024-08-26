@extends('layouts.emp')

@section('title', 'jobs Posts')

@section('content')
    <div class="d-flex justify-content-between mb-3" >
        <h1 class="fs-2 fw-semibold">Your Job Postings</h1>
        <a href="{{ route('job_posting.create') }}" class="btn btn-primary mb-3">Create New Job</a>
    </div>
    <div class="row">
        @foreach($jobs as $job)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title fs-4" style="color:rgb(0, 85, 217)">{{ $job->title }}</h5>
                    <p class="card-text">{{ Str::limit($job->description, 100) }}</p>

                    <p class="card-text"><strong>Posted by:</strong> {{ $employer->user->name }}</p>
                    <p class="card-text"><strong>Work Type:</strong> {{ $job->work_type }}</p>
                    <p class="card-text"><strong>Status:</strong>
                        @if($job->status == 'active')
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </p>
                    </p>

                    <p class="card-text">This job has {{ $job->applications()->count()}} Application</p>

                    <a href="{{ route('job_posting.show', $job) }}" class="btn btn-info">View Job</a>
                    <a href="{{ route('job_posting.edit', $job) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('job_posting.destroy', $job) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

@endsection

