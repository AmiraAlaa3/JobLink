@extends('layouts.app')

@section('title', 'Application')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($applications as $application)
                <div class="col-12 mb-3">
                    <div class="card border-black shadow-sm mb-3 border-special">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                @if ($application->jobPosting->employer->company_logo)
                                    <img src="{{ asset('uploads/' .$application->jobPosting->employer->company_logo) }}" alt="company_logo"
                                        class="company-logo img-fluid" width="100px" height="100px">
                                @else
                                    <img src="{{ asset('images/company-placeholder.png') }}" alt="company_logo"
                                        class="company-logo img-fluid" width="100px">
                                @endif
                                <div class="ms-3">
                                    <h5 class="card-title text-capitalize mb-0">{{ $application->jobPosting->title }}</h5>
                                    <p class="text-muted mb-0">
                                        {{ $application->jobPosting->location->name }}
                                    </p>
                                </div>
                            </div>
                            @if ($application->status === 'pending')
                                <form action="{{ route('applications.destroy', $application->id) }}" method="POST"
                                    style="display:inline;"  onsubmit="return confirm('Are you sure you want to delete this item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger text-light"
                                     aria-label="Close"
                                     >
                                        <i class="fa-solid fa-x"></i>
                                    </button>
                                </form>
                            @endif
                        </div>
                        <div class="card-body">
                            <p class="text-muted mb-2">
                                @if ($application->status === 'pending')
                                    <span class="badge bg-warning">pending</span>
                                @elseif ($application->status === 'accepted')
                                    <span class="badge bg-success">Accepted</span>
                                @elseif ($application->status === 'rejected')
                                    <span class="badge bg-info">Not Select</span>
                                @elseif ($application->status === 'closed')
                                    <span class="badge bg-danger">Closed</span>
                                @endif
                            </p>
                            <p class="mb-1"><strong>Skills Required:</strong>
                                {{ $application->jobPosting->skills_required }}</p>
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                            <small>Applied on: {{ $application->created_at->format('d M, Y') }}</small>
                            <small class="text-muted">{{ $application->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
