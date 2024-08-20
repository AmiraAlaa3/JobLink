@extends('layouts.app')

@section('title', 'Account')

@section('content')
<h1 class="text-center mt-5 display-4">Your Personal Info</h1>
<form class="border p-5 bordered w-75 m-auto my-5" method="post" action="{{ route('candidate_profile_update', $candidate->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="exampleInputName" class="form-label">Name</label>
      <input name="name" type="text" value="{{ old('name', $candidate->user->name) }}"  class="form-control" id="exampleInputName" aria-describedby="NameHelp">
    </div>

    <div class="mb-3">
      <label for="exampleInputnum" class="form-label">Email</label>
      <input name="student_numbers" type="email" value="{{$candidate->user->email}}" class="form-control" id="exampleInputnum" aria-describedby="studentNumbers">
    </div>


    <div class="mb-3">
      <label for="address" class="form-label">Address</label>
      <input name="address" type="text" value="{{old('address',$candidate->address)}}" class="form-control" id="address" aria-describedby="address">
    </div>

    <div class="mb-3">
      <label for="Phone" class="form-label">Phone</label>
      <input name="Phone" type="text" value='{{old('phone_number',$candidate->phone_number)}}' class="form-control" id="Phone" aria-describedby="Phone">
    </div>
    <label class="form-label">Gender</label>
    <div class="form-check">
        <input name="gender" class="form-check-input" type="radio" id="flexRadioDefault1" value="male" {{ old('gender', $candidate->gender) == 'male' ? 'checked' : '' }}>
        <label class="form-check-label" for="flexRadioDefault1">
            Male
        </label>
    </div>
    <div class="form-check mb-3">
        <input name="gender" class="form-check-input" type="radio" id="flexRadioDefault2" value="female" {{ old('gender', $candidate->gender) == 'female' ? 'checked' : '' }}>
        <label class="form-check-label" for="flexRadioDefault2">
            Female
        </label>
    </div>

    <div class="mb-3">
        <label for="Image" class="form-label">Image</label>
        <input name="image" type="file" class="form-control" id="Image">
        @if( $candidate->image )
            <img src="{{ asset('uploads/' . $candidate->image) }}" alt="Image" width="100" class="mt-2">
        @endif
    </div>

    <div class="mb-3">
        <label for="bio" class="form-label">Bio</label>
        <textarea class="form-control" name="bio" id="Body" rows="8">{{ $candidate->bio }}</textarea>
    </div>

    <div class="mb-3">
        <label for="website" class="form-label">Website</label>
        <input name="website" type="text" value="{{old('address',$candidate->website)}}" class="form-control" id="website" aria-describedby="website">
    </div>


    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
@endsection
