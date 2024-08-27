@extends('layouts.admin')

@section('title', 'Admin: All Jobs')

@section('content')
    <h1 class="mb-5 fs-3 fw-semibold ">Applicants for <span class="text-primary">{{ $job->title }}</span></h1>

    <div class="table-responsive my-5">
        <table class="table table-striped table-hover align-middle">
            <thead>
                <tr>
                    <th>Candidate Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>CV</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applicants as $application)
                    <tr>
                        <td>{{ $application->candidate->user->name }}</td>
                        <td>{{ $application->candidate->user->email }}</td>
                        <td>{{ $application->candidate->phone_number }}</td>
                        <td>
                            @if ($application->candidate && $application->cv)
                                <a href="{{ asset('uploads/cvs/' . $application->cv) }}" target="_blank">View CV</a>
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.jobs') }}" class="btn btn-primary">Back to Jobs</a>
    </div>
@endsection
