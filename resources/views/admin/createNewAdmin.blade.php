@extends('layouts.admin')

@section('title', 'Admin: Add Admin')

@section('content')

    <form method="POST" action="{{ route('admin.storeAdmin') }}" class="border p-5">
        @csrf
        <div class="modal-header">
            <h2 class="modal-title mb-3" id="addAdminModalLabel">Add New <span class="text-primary">Admin</span></h2>
        </div>
        <div class="modal-body">
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            @error('name')
                <div class="alert alert-danger mt-3">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            @error('email')
                <div class="alert alert-danger mt-3">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            @error('password')
                <div class="alert alert-danger mt-3">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group mb-4">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                    required>
            </div>
            @error('confirm_password')
                <div class="alert alert-danger mt-3">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-group mb-4">
                <label for="phone_number">Phone Number</label>
                <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
            </div>
            <div class="form-group mb-4">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <input type="hidden" name="role" value="admin">
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary me-3">Save</button>
            <a href="{{route('admin.admins')}}">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" >
                Cancal
            </button>
            </a>
        </div>
    </form>


@endsection
