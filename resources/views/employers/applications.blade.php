@extends('layouts.emp')

@section('title', 'Application')

@section('content')

    <div class="container">
        <h1>My Job Postings and Applications</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display Job Postings -->
        <h2>Job Postings</h2>
        @if ($jobPostings->isEmpty())
            <p>You have not posted any jobs yet.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Skills Requirements</th>
                        <th>Applications</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobPostings as $jobPosting)
                        <tr>
                            <td>{{ $jobPosting->title }}</td>
                            <td>{{ $jobPosting->skills_required }}</td>
                            <td>
                                <a href="{{ route('employer.job_applications', $jobPosting->id) }}" class="btn btn-info">View Applications</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Display Applications -->
        <h2>Applications</h2>
        @if ($applications->isEmpty())
        <p>No applications for this job posting yet.</p>
        @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Applicant</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $application)
                    <tr>
                        <td>{{ $application->id }}</td>
                        <td>{{ $application->candidate->user->name }}</td>
                        <td>{{ $application->candidate->user->email }}</td>
                        <td>{{ $application->candidate->phone_number }}</td>
                        <td>{{ $application->status }}</td>
                        <td>
                            <a href="{{ route('employer.application_accept', $application->id) }}" class="btn btn-success" onclick="return confirm('Are you sure you want to accept this application?');">Accept</a>
                            <a href="{{ route('employer.application_reject', $application->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to reject this application?');">Reject</a>
                            <a href="{{ route('employer.application_resume', $application->id) }}" class="btn btn-primary">Download Resume</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    </div>

@endsection

