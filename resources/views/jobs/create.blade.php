@extends('layouts.emp')

@section('title', 'Jobs Posts')

@section('content')

    <div class="container m-5 bg-light">
        <form action="{{ isset($job) ? route('job_posting.update', $job) : route('job_posting.store') }}" method="POST"
        class="border p-5">
            @csrf
            @if(isset($job))
                @method('PUT')
            @endif
            <h1 class=" text-center mb-3">{{ isset($job) ? 'Edit Job' : 'Create Job' }}</h1>
            <!-- Job Title -->
            <div class="form-group mb-3">
                <label for="title">Job Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $job->title ?? '') }}" required>
            </div>

            <!-- Job Description -->
            <div class="form-group mb-3">
                <label for="description">Job Description</label>
                <textarea name="description" class="form-control" required>{{ old('description', $job->description ?? '') }}</textarea>
            </div>

            <!-- Skills Required -->
            <div class="form-group mb-3">
                <label for="skills_required">Skills Required</label>
                <input type="text" name="skills_required" class="form-control" value="{{ old('skills_required', $job->skills_required ?? '') }}" required>
            </div>

            <!-- Salary Range -->
            <div class="form-group mb-3">
                <label for="salary_range">Salary Range</label>
                <input type="text" name="salary_range" class="form-control" value="{{ old('salary_range', $job->salary_range ?? '') }}" required>
            </div>

            <!-- Location -->
            <div class="form-group mb-3">
                <label for="location_id">Location</label>
                <select name="location_id" class="form-control" required>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}" {{ isset($job) && $job->location_id == $location->id ? 'selected' : '' }}>{{ $location->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Work Type -->
            <div class="form-group mb-3">
                <label for="work_type">Work Type</label>
                <select name="work_type" class="form-control" required>
                    <option value="remote" {{ isset($job) && $job->work_type == 'remote' ? 'selected' : '' }}>Remote</option>
                    <option value="on-site" {{ isset($job) && $job->work_type == 'on-site' ? 'selected' : '' }}>On-Site</option>
                    <option value="hybrid" {{ isset($job) && $job->work_type == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                </select>
            </div>

            <!-- Application Deadline -->
            <div class="form-group mb-3">
                <label for="application_deadline">Application Deadline</label>
                <input type="date" name="application_deadline" class="form-control" value="{{ old('application_deadline', $job->application_deadline ?? '') }}" required>
            </div>

            <!-- Category (optional) -->
            <div class="form-group mb-5">
                <label for="category_id">Category (optional)</label>
                <select name="category_id" class="form-control">
                    <!-- Assuming you have a $categories variable to select from -->
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ isset($job) && $job->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">{{ isset($job) ? 'Update Job' : 'Create Job' }}</button>
        </form>
    </div>
    @endsection
