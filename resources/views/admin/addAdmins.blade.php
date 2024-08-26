@extends('layouts.admin')

@section('title', 'Admin: Add Admin')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Manage Admins</h1>
        <button class="btn btn-outline-primary text-primary bg-white" style="border-width: 3px;"><i class="fa-solid fa-plus"></i> Add New Admin</button>
    </div>

    <div class="row">
        @foreach($admins as $admin)
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>{{ $admin->name }}</h5>
                        <div>
                            <a href="#" class="btn btn-sm btn-danger"><i class="fa-solid fa-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-muted"><i class="fa-solid fa-envelope"></i> {{ $admin->email }}</p>
                        <p class="text-muted"><i class="fa-solid fa-phone"></i> 01068785803</p>
                        <p class="text-muted"><i class="fa-solid fa-location-dot"></i> Cairo</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection