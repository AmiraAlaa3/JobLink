@extends('layouts.app')

@section('title', 'Account')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8 col-lg-8">
    <form class="border p-5" method="post"
        action="{{ route('candidate_profile_update', Auth::id()) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="p-3 border mb-5">
            <div class="row">
                @if ($candidate->image)
                <div class="col-sm-2">
                    <img src="{{ asset('uploads/' . $candidate->image) }}" class="rounded-circle"
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
                    <h1 class="fs-4 fw-semibold">Profile Picture:</h1>
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
            <input name="address" type="text" value="{{ old('address', $candidate->address) }}" class="form-control"
                id="address" aria-describedby="address">
        </div>

        <div class="mb-3">
            <label for="Phone" class="form-label">Phone <span class="text-danger">*</span></label>
            <input name="phone_number" type="text" value="{{ old('phone_number', $candidate->phone_number) }}"
                class="form-control" id="Phone" aria-describedby="Phone">
            @error('phone_number')
                <div class="alert alert-danger mt-3">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <label class="form-label">Gender</label>
        <div class="form-check">
            <input name="gender" class="form-check-input" type="radio" id="flexRadioDefault1" value="male"
                {{ old('gender', $candidate->gender) == 'male' ? 'checked' : '' }}>
            <label class="form-check-label" for="flexRadioDefault1">
                Male
            </label>
        </div>
        <div class="form-check mb-3">
            <input name="gender" class="form-check-input" type="radio" id="flexRadioDefault2" value="female"
                {{ old('gender', $candidate->gender) == 'female' ? 'checked' : '' }}>
            <label class="form-check-label" for="flexRadioDefault2">
                Female
            </label>
        </div>

        <div class="mb-3">
            <label for="birth_date" class="form-label">Date of Birth</label>
            <div class="row">
                <div class="col">
                    <select name="day" class="form-control" id="day">
                        <option value="" disabled>Day</option>
                        @for ($i = 1; $i <= 31; $i++)
                            <option value="{{ $i }}"
                                {{ old('day', $candidate->date_of_birth ? \Carbon\Carbon::parse($candidate->date_of_birth)->day : '') == $i ? 'selected' : '' }}>
                                {{ $i }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div class="col">
                    <select name="month" class="form-control" id="month">
                        <option value="" disabled>Month</option>
                        @foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $index => $month)
                            <option value="{{ $index + 1 }}"
                                {{ old('month', $candidate->date_of_birth ? \Carbon\Carbon::parse($candidate->date_of_birth)->month : '') == $index + 1 ? 'selected' : '' }}>
                                {{ $month }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <select name="year" class="form-control" id="year">
                        <option value="" disabled>Year</option>
                        @for ($i = date('Y'); $i >= 1900; $i--)
                            <option value="{{ $i }}"
                                {{ old('year', $candidate->date_of_birth ? \Carbon\Carbon::parse($candidate->date_of_birth)->year : '') == $i ? 'selected' : '' }}>
                                {{ $i }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="resume" class="form-label">CV</label>
            <input name="resume" type="file" class="form-control" id="resume">
            @error('resume')
                <div class="alert alert-danger mt-3">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="bio" class="form-label">Bio</label>
            <textarea class="form-control" name="bio" id="Body" rows="8">{{ old('bio', $candidate->bio) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="website" class="form-label">Website</label>
            <input name="website" type="text" value="{{ old('website', $candidate->website) }}" class="form-control"
                id="website" aria-describedby="website">
            @error('website')
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
