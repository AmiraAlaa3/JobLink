@extends('layouts.app')

@section('title', 'Application')

@section('content')

<div class="container">
    <div class="row">
        @foreach ($applications as $application)
        <div class="col-12 mb-4">
            <div class="card border-light shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title text-capitalize mb-0">{{ $application->jobPosting->title }}</h5>
                    @if ($application->status === 'pending')
                    <form action="{{ route('applications.destroy', $application->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link text-danger" aria-label="Close">
                            <i class="fa-solid fa-x"></i>
                        </button>
                    </form>
                @endif

                </div>
                <div class="card-body">
                    <p class="text-muted"><strong>Status:</strong> {{ $application->status }}</p>
                    <p class="card-text">{{ $application->jobPosting->description }}</p>
                    <p class="mb-1"><strong>Skills Required:</strong> {{ $application->jobPosting->skills_required }}</p>
                </div>
                <div class="card-footer text-muted">
                    <small>Applied on: {{ $application->created_at->format('d M, Y') }}</small>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>






@endsection
