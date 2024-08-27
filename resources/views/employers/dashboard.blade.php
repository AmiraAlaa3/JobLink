@extends('layouts.emp')

@section('title', 'Employer Dashboard')

@section('content')
<div class="container">
    <h1 class="mb-4">Welcome, {{ $employer->company_name }}</h1>

    <div class="row">
        <!-- Profile Overview -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    Profile Overview
                </div>
                <div class="card-body">
                    <p><strong>Company Name:</strong> {{ $employer->company_name }}</p>
                    <p><strong>Address:</strong> {{ $employer->address }}</p>
                    <p><strong>Phone Number:</strong> {{ $employer->phone_number }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <a href="{{ route('Employer_profile_edit') }}" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>

        <!-- Dashboard Stats -->
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="card text-white bg-primary shadow mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <i class="fas fa-briefcase fa-4x"></i>
                                </div>
                                <div class="col-9 text-right">
                                    <div class="h1 mb-0">{{ $jobCount }}</div>
                                    <div class="text-uppercase">Jobs Posted</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="card text-white bg-primary shadow mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <i class="fas fa-file-alt fa-4x"></i>
                                </div>
                                <div class="col-9 text-right">
                                    <div class="h1 mb-0">{{ $applicationCount }}</div>
                                    <div class="text-uppercase">Applications Received</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Job Postings -->
            <div class="card mb-4">
                <div class="card-header">
                    Your Job Postings
                </div>
                <div class="card-body">
                    @if ($jobPostings->isEmpty())
                        <p>You have no job postings yet. <a href="{{ route('job_posting.create') }}">Create one now</a>.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Applications</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($jobPostings as $posting)
                                    <tr>
                                        <td>{{ $posting->title }}</td>
                                        <td>
                                            @if ($posting->status === 'await')
                                            <span class="badge bg-warning">pending</span>
                                        @elseif ($posting->status === 'active')
                                            <span class="badge bg-success">Active</span>
                                        @elseif ($posting->status === 'inactive')
                                            <span class="badge bg-info">Inactive</span>
                                        @elseif ($posting->status === 'closed')
                                            <span class="badge bg-danger">Closed</span>
                                        @endif
                                        </td>

                                        <td>{{ $posting->applications->count() }}</td>
                                        <td>
                                            <a href="{{ route('job_posting.edit', $posting->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="{{ route('job_posting.show', $posting->id) }}" class="btn btn-info btn-sm">View</a>
                                            <form action="{{ route('job_posting.destroy', $posting->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
