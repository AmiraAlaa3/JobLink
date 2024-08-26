@extends('layouts.emp')

@section('title', 'Edit Account')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8 col-lg-8">
    <form class="border p-5" method="post"
        action="{{ route('employer_profile_update', Auth::id()) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

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
                  <img src="{{ asset('images/user.png') }}" class="rounded-circle" alt="Profile"
                  width="90" height="90" name="company_logo">
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
                id="exampleInputName">
            @error('name')
                <div class="alert alert-danger mt-3">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail" class="form-label">Email <span class="text-danger">*</span></label>
            <input name="email" type="email" value="{{ old('email', Auth::user()->email) }}" class="form-control"
                id="exampleInputEmail">
            @error('email')
                <div class="alert alert-danger mt-3">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input name="address" type="text" value="{{ old('address', $employer->address) }}" class="form-control"
                id="address">
        </div>

        <div class="mb-3">
            <label for="companyName" class="form-label">Company Name <span class="text-danger">*</span></label>
            <input name="company_name" type="text" value="{{ old('company_name', $employer->company_name) }}" class="form-control"
                id="companyName">
        </div>

        <div class="mb-3">
            <label for="company_description" class="form-label">Company Description</label>
            <textarea class="form-control" name="company_description" id="company_description" rows="8">{{ old('company_description', $employer->company_description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="Phone" class="form-label">Phone <span class="text-danger">*</span></label>
            <input name="phone_number" type="text" value="{{ old('phone_number', $employer->phone_number) }}"
                class="form-control" id="Phone">
            @error('phone_number')
                <div class="alert alert-danger mt-3">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    </div>
</div>
@endsection
