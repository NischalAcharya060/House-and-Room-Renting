@extends('admin.layouts.admin_dashboard')

@section('title', 'User Profile')

@section('header', 'User Profile')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">Profile Information</h5>
                        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="media align-items-center">
                                @if ($user->profile_picture && Storage::exists('public/profile_pictures/' . $user->profile_picture))
                                    <img src="{{ asset('storage/profile_pictures/' . $user->profile_picture) }}" alt="Profile Picture" class="rounded-circle profile-picture" width="150">
                                @else
                                    <img src="https://www.shareicon.net/data/256x256/2016/05/26/771188_man_512x512.png" alt="Default Profile Picture" class="rounded-circle profile-picture" width="150">
                                @endif

                                <div class="media-body ml-4">
                                    <label for="profile_picture" class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" id="profile_picture" name="profile_picture" class="d-none">
                                    </label>
                                    <div class="text-muted small mt-1">Allowed JPG, GIF, or PNG. Max size of 800KB</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                            </div>

                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm New Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        /* Profile picture styling */
        .profile-picture {
            border: 3px solid #007bff;
        }
    </style>
@endsection
