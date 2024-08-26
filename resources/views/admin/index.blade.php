@extends('layouts.admin')

@section('title', 'Admin: All Jobs')

@section('content')
<h1 class="mb-4">All Job Postings</h1>

<div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
        <thead>
            <tr>
                <th>Job Title</th>
                <th>Company Name</th>
                <th>Location</th>
                <th>Applicants Count</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jobPostings as $job)
                <tr>
                    <td>{{ $job->title }}</td>
                    <td>{{ $job->employer->company_name }}</td>
                    <td>{{ $job->location->location_name }}</td>
                    <td>{{ $job->applications_count }}</td>
                    <td>
                        <a href="{{ route('admin.applicants', $job->id) }}" class="btn btn-primary">View Applicants</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
