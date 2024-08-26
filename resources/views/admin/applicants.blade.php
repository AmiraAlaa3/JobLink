<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    
<div class="container">
    <h1>Applicants for {{ $job->title }}</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Candidate Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>CV</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applicants as $application)
                <tr>
                    <td>{{ $application->candidate->user->name   }}</td>
                    <td>{{ $application->candidate->user->email    }}</td>
                    <td>{{ $application->candidate->phone_number  }}</td>
                    <td>   
                         @if($application->candidate && $application->cv)
                          <a href="{{ asset('storage/' . $application->cv) }}" target="_blank">View CV</a>
                            @else
                                N/A
                            @endif
                        </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <a href="{{ route('admin.jobs') }}" class="btn btn-secondary">Back to Jobs</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">


</body>
</html>