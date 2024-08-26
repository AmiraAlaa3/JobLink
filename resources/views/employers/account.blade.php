<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     {{-- icon --}}
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 
    <title>Document</title>
</head>
<body>
    <div class="contener">
    <div class="row border p-4 rounded shadow-sm bg-light">
        <div class="col-md-2 text-center mb-4 mb-md-0">
            @if($Employer->image)
            <img src="{{ asset('uploads/' . $Employer->image) }}" class="rounded-circle" width="120" height="120"
                alt="Employer Image">
            @else
                <img src="{{ asset('images/user.png') }}" class="rounded-circle" width="120" height="120">
            @endif
        </div>
        <div class="col-md-10">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="text-capitalize">{{ $Employer->user->name }}</h2>
                <div class="d-block d-md-none">
                    <!-- Dropdown for mobile view -->
                    <div class="dropdown">
                        <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="{{ route('Employer_profile_edit', $Employer->id) }}">Edit
                                    Profile</a></li>
                            <li><a class="dropdown-item"
                                    href="https://api.whatsapp.com/send?text={{ urlencode('Check out this profile: ' . url()->current()) }}"
                                    target="_blank">Share on WhatsApp</a></li>
                        </ul>
                    </div>
                </div>
                <div class="d-none d-md-flex align-items-center">
                    <!-- Desktop view buttons -->
                    <a class="btn btn-link me-2" href="{{ route('Employer_profile_edit', $Employer->id) }}">
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    <a class="btn btn-link"
                        href="https://api.whatsapp.com/send?text={{ urlencode('Check out this profile: ' . url()->current()) }}"
                        target="_blank">
                        <i class="fa-regular fa-share-from-square"></i>
                    </a>
                </div>
            </div>
            <p class="text-muted mb-3">{{ $Employer->user->email }}</p>
            <p class="mb-4">{{ $Employer->company_name }}</p>
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-1"><strong>Phone:</strong> {{ $Employer->phone_number }}</p>
                    <p class="mb-1"><strong>Address:</strong> {{ $Employer->address }}</p>
                </div>
            </div>
          

        </div>
    </div>
</div>
</body>
</html>
