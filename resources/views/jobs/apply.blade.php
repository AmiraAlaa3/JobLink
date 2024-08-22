<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>welcome to apply</h1>
    <h1>Apply for {{ $job->title }}</h1>

    <form action="{{ route('apply', $job->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Your Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="resume" class="form-label">Upload Resume</label>
            <input type="file" class="form-control" id="resume" name="resume" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit Application</button>
    </form>

</body>
</html>