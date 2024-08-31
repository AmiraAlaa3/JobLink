@extends('layouts.emp')

@section('title', 'Account')

@section('content')

    <div class="row border p-4 rounded shadow-sm bg-light border-special">
        <div class="col-md-2 text-center mb-4 mb-md-0">
            @if($employer->company_logo)
            <img src="{{ asset('uploads/' . $employer->company_logo) }}" class="rounded-circle" width="120" height="120"
                alt="Employer Image">
            @else
                <img src="{{ asset('images/user.png') }}" class="rounded-circle" width="120" height="120">
            @endif
        </div>
        <div class="col-md-10">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="text-capitalize">{{  $employer->company_name }}</h2>
                <div class="d-block d-md-none">
                    <!-- Dropdown for mobile view -->
                    <div class="dropdown">
                        <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="{{ route('Employer_profile_edit', $employer->id) }}">Edit
                                    Profile</a></li>
                            <li><a class="dropdown-item"
                                    href="https://api.whatsapp.com/send?text={{ urlencode('Check out this profile: ' . url()->current()) }}"
                                    target="_blank">Share on WhatsApp</a></li>
                        </ul>
                    </div>
                </div>
                <div class="d-none d-md-flex align-items-center">
                    <!-- Desktop view buttons -->
                    <a class="btn btn-link me-2" href="{{ route('Employer_profile_edit', $employer->id) }}">
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    <a class="btn btn-link"
                        href="https://api.whatsapp.com/send?text={{ urlencode('Check out this profile: ' . url()->current()) }}"
                        target="_blank">
                        <i class="fa-regular fa-share-from-square"></i>
                    </a>
                </div>
            </div>
            <p class="text-muted mb-3">{{ $employer->user->email }}</p>
            @if($employer->company_description)
              <p class="mb-4">{{ $employer->company_description }}</p>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <p class="mb-1"><strong>Phone:</strong> {{ $employer->phone_number }}</p>
                    <p class="mb-1"><strong>Address:</strong> {{ $employer->address }}</p>
                </div>
                <div class="col-md-6">
                    @if ($employer->company_website)
                    <div class='mb-2'>
                     <a href={{$employer->company_website }}
                         target='_blank'>website</a>
                    </div>
                  @endif
                </div>
            </div>


        </div>
    </div>
</div>
@endsection

