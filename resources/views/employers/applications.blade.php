@extends('layouts.emp')

@section('title', 'Application')

@section('content')

    <div class="container">

        <!-- Display Job Postings -->
        <h2 class="mb-3">Job Postings</h2>
        @if ($jobPostings->isEmpty())
            <p>You have not posted any jobs yet.</p>
        @else
        <div class="row">
            @foreach ($jobPostings as $jobPosting)
                <div class="col-12 col-lg-8 mb-4">
                    <div class="card shadow-sm border-special">
                        <div class="card-body">
                            <h5 class="card-title" style="color:rgb(0, 85, 217)" >{{ $jobPosting->title }}</h5>
                            <p class="card-text"><strong>Skills Requirements:</strong> {{ $jobPosting->skills_required }}</p>
                            <p class="card-text">
                                <strong>Status:</strong>
                                @if ($jobPosting->status === 'await')
                                    <span class="badge bg-warning">Pending</span>
                                @elseif ($jobPosting->status === 'active')
                                    <span class="badge bg-success">Active</span>
                                @elseif ($jobPosting->status === 'inactive')
                                    <span class="badge bg-info">Inactive</span>
                                @elseif ($jobPosting->status === 'closed')
                                    <span class="badge bg-danger">Closed</span>
                                @endif
                            </p>
                            <a href="{{ route('employer.job_applications', $jobPosting->id) }}"
                               class="btn btn-primary">View Applications</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @endif

</div>

@endsection

