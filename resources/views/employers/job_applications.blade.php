@extends('layouts.emp')

@section('title', 'Application')

@section('content')
<h1>Applications for {{ $jobPosting->title }}</h1>

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

<a href="{{ route('employer.applications') }}" class="btn btn-secondary">Back to My Applications</a>

@endsection
