
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
<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8 col-lg-8">
    <form class="border p-5" method="post"
        action="{{ route('employer_profile_update', Auth::id()) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- @if ($errors->any())
     <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
     </div>
     @endif --}}

        <div class="p-3 border mb-5">
            <div class="row">
                @if ($employer->company_logo)
                <div class="col-sm-2">
                    <img src="{{ asset('uploads/' . $employer->company_logo) }}" class="rounded-circle"
                    alt="Profile Picture"
                    width="90" height="90">
                </div>
                @else
                <div class="col-sm-2">
                  <img src="{{ asset('images/user.png')}}" class="rounded-circle" alt="Profile"
                  width="90" height="90">
                </div>
                @endif
                <div class="col-sm-10">
                    <h1 class="fs-4 fw-semibold">Employer Picture:</h1>
                    <div class="input-group">
                        <input type="file" name="image" class="form-control">
                        @error('image')
                        <div class="alert alert-danger mt-3">
                            {{ $message }}
                        </div>
                    @enderror

                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <h1 class="fs-4 fw-semibold">Your Personal Info:</h1>
        </div>
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Name <span class="text-danger">*</span></label>
            <input name="name" type="text" value="{{ old('name', Auth::user()->name) }}" class="form-control"
                id="exampleInputName" aria-describedby="NameHelp">
            @error('name')
                <div class="alert alert-danger mt-3">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputnum" class="form-label">Email <span class="text-danger">*</span></label>
            <input name="email" type="email" value="{{ old('email', Auth::user()->email) }}" class="form-control"
                id="exampleInputnum" aria-describedby="studentNumbers">
            @error('email')
                <div class="alert alert-danger mt-3">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input name="address" type="text" value="{{ old('address', $employer->address) }}" class="form-control"
                id="address" aria-describedby="address">
        </div>


        <div class="mb-3">
            <label for="address" class="form-label">Company Name</label>
            <input name="address" type="text" value="{{ old('address', $employer->company_name) }}" class="form-control"
                id="address" aria-describedby="address">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">company description</label>
            <input name="address" type="text" value="{{ old('address', $employer->company_description) }}" class="form-control"
                id="address" aria-describedby="address">
        </div>



        <div class="mb-3">
            <label for="Phone" class="form-label">Phone <span class="text-danger">*</span></label>
            <input name="phone_number" type="text" value="{{ old('phone_number', $employer->phone_number) }}"
                class="form-control" id="Phone" aria-describedby="Phone">
            @error('phone_number')
                <div class="alert alert-danger mt-3">
                    {{ $message }}
                </div>
            @enderror
        </div>

        
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    </div>
</body>
</html>
