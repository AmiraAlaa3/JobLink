@extends('layouts.admin')

@section('title', 'Await Jobs')

@section('content')
        <header class="mb-4">
            <h1>Awaiting Job Approvals</h1>
        </header>
        @foreach($employers as $employer)
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h3 class="mb-0">{{ $employer->company_name }}</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Job Title</th>
                                <th scope="col">Skills Requirements</th>
                                <th scope="col">Salary</th>
                                <th scope="col">Location</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employer->jobPostings as $job)
                                <tr>
                                    <td>{{ $job->title }}</td>
                                    <td>{{ $job->skills_required }}</td>
                                    <td>{{ $job->salary_range }}</td>
                                    <td>{{ $job->location->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.acceptJob', $job->id) }}" class="btn btn-success me-2 mb-2">Accept</a>
                                        <a href="{{ route('admin.cancel', $job->id) }}" class="btn btn-danger">Reject</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
        <div class="text-center">
            <a href="{{ route('admin.jobs') }}" class="btn btn-secondary">Back to Jobs</a>
        </div>
    </div>
@endsection
