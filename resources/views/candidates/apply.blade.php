<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Apply</title>
</head>
<body>

<div class="container">
    <h1 class="text-center">Apply for {{ $job->title }}</h1>

    <form action="{{ route('application.store', $job->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="cv">Upload CV:</label>
            <input type="file" class="form-control" id="cv" name="cv" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit Application</button>
    </form>
</div>

</body>
</html>
