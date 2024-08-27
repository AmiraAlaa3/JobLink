@extends('layouts.app')

@section('title', 'Jobs')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-8">
            <h1 class="text-center fs-4 fw-semibold mb-3">Apply for {{ $job->title }}</h1>
            <form class="border p-5" action="{{ route('application.store' , $job->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="job_posting_id" value="{{ $job->id }}">
                <input type="hidden" name="candidate_id" value="{{ auth()->user()->candidate->id }}">

                <!-- Name (Editable) -->
                <div class="form-group  mb-3">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ auth()->user()->name }}" required>
                </div>

                <!-- Email (Editable) -->
                <div class="form-group  mb-3">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ auth()->user()->email }}" required>
                </div>

                <!-- Phone Number (Editable) -->
                <div class="form-group  mb-3">
                    <label for="phone">Phone Number:</label>
                    <input type="text" class="form-control" id="phone" name="phone"
                        value="{{ auth()->user()->candidate ? auth()->user()->candidate->phone_number : '' }}" required>
                </div>

                <!-- Upload CV -->
                <div class="form-group mb-3">
                    <label for="cv">Upload CV: <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="cv" required>
                </div>

                <button type="submit" class="btn btn-primary">Apply</button>
            </form>
        </div>
    </div>
 @endsection
