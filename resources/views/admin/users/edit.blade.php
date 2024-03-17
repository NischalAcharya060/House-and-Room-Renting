@extends('admin.layouts.admin_dashboard')

@section('title', 'Edit User')

@section('header', 'Edit User')

@section('content')
    <div class="container">
        <h4 class="font-weight-bold py-3 mb-4">Edit User</h4>

        <!-- Error messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Success message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4>Edit User</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Leave blank to keep unchanged">
                    </div>
                    <div class="form-group">
                        <label for="user_type">User Type</label>
                        <select name="user_type" id="user_type" class="form-control">
                            <option value="admin" {{ $user->user_type === 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="landlord" {{ $user->user_type === 'landlord' ? 'selected' : '' }}>Landlord</option>
                            <option value="user" {{ $user->user_type === 'user' ? 'selected' : '' }}>User</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
