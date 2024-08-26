@extends('layouts.admin')

@section('title', 'Admin: Add New Admin')

@section('content')

<div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="addAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form method="POST" action="{{ route('admin.storeAdmin') }}">
            @csrf
            <div class="modal-header">
                <h3 class="modal-title mb-3" id="addAdminModalLabel">Add New <span class="text-primary">Admin</span></h3>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="confirm_password">Phone Number</label>
                        <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="confirm_password">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <input type="hidden" name="role" value="admin">
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary me-3">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </form>
        </div>
    </div>
</div>

@endsection