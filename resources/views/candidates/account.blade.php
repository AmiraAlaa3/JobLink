@extends('layouts.app')

@section('title', 'Account')

@section('content')
    <div class="row border p-4 rounded shadow-sm bg-light">
        <div class="col-md-2 text-center mb-4 mb-md-0">
            @if($candidate->image)
            <img src="{{ asset('uploads/' . $candidate->image) }}" class="rounded-circle" width="120" height="120"
                alt="Candidate Image">
            @else
                <img src="{{ asset('images/user.png') }}" class="rounded-circle" width="120" height="120">
            @endif
        </div>
        <div class="col-md-10">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="text-capitalize">{{ $candidate->user->name }}</h2>
                <div class="d-block d-md-none">
                    <!-- Dropdown for mobile view -->
                    <div class="dropdown">
                        <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="{{ route('candidate_profile_edit', $candidate->id) }}">Edit
                                    Profile</a></li>
                            <li><a class="dropdown-item"
                                    href="https://api.whatsapp.com/send?text={{ urlencode('Check out this profile: ' . url()->current()) }}"
                                    target="_blank">Share on WhatsApp</a></li>
                        </ul>
                    </div>
                </div>
                <div class="d-none d-md-flex align-items-center">
                    <!-- Desktop view buttons -->
                    <a class="btn btn-link me-2" href="{{ route('candidate_profile_edit', $candidate->id) }}">
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    <a class="btn btn-link"
                        href="https://api.whatsapp.com/send?text={{ urlencode('Check out this profile: ' . url()->current()) }}"
                        target="_blank">
                        <i class="fa-regular fa-share-from-square"></i>
                    </a>
                </div>
            </div>
            <p class="text-muted mb-3">{{ $candidate->user->email }}</p>
            <p class="mb-4">{{ $candidate->bio }}</p>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <p class="mb-1"><strong>Birth Date:</strong> {{ $candidate->date_of_birth }}</p>
                    <p class="mb-1"><strong>Gender:</strong> {{ $candidate->gender }}</p>
                </div>
                <div class="col-md-6">
                    <p class="mb-1"><strong>Phone:</strong> {{ $candidate->phone_number }}</p>
                    <p class="mb-1"><strong>Address:</strong> {{ $candidate->address }}</p>
                </div>
            </div>
            @if( $candidate->resume)
                <div class="mb-3">
                    <a href="{{ route('candidate.download', $candidate->id) }}" class="btn btn-primary">Download CV</a>
                </div>
            @endif

        </div>
    </div>
@endsection
