<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Apply</title>
</head>
<body>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
<div class="container">
    


<div class="container">
    <h1 class="text-center">Apply for {{ $job->title }}</h1>

    <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="job_posting_id" value="{{ $job->id }}">
    <input type="hidden" name="candidate_id" value="{{   auth()->user()->candidate->id }}">
    
     <!-- Name (Editable) -->
     <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required>
    </div>

    <!-- Email (Editable) -->
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="{{  auth()->user()->email }}" required>
    </div>

    <!-- Phone Number (Editable) -->
    <div class="form-group">
        <label for="phone">Phone Number:</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ auth()->user()->candidate ? auth()->user()->candidate->phone_number : '' }}" required>
    </div>

    <!-- Upload CV -->
    <div class="form-group">
        <label for="cv">Upload CV:</label>
        <input type="file" class="form-control" name="cv" required>
    </div>

    <button type="submit" class="btn btn-primary">Apply</button>
</form>
</div>

</body>
</html>
