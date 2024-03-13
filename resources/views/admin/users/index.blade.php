@extends('admin.layouts.admin_dashboard')

@section('title', 'User Management')

@section('header', 'User Management')

@section('content')
    <div class="container">
        <h4 class="font-weight-bold py-3 mb-4">User Management</h4>

        <!-- Success message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error message -->
        @if (session('message'))
            <div class="alert alert-danger">{{ session('message') }}</div>
        @endif

        <!-- Add User button -->
        <div class="text-right mb-3">
            {{-- <a href="{{ route('admin.users.create') }}" class="btn" style="background-color: #3C91E6; border-color: #3C91E6; color: white">
                <i class='bx bx-user-plus'></i> Add User
            </a> --}}
        </div>

        <!-- User Table -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Registration At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->format('Y-m-d H:i:s') }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class='bx bx-edit'></i>
                                </a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this user?')">
                                        <i class='bx bx-trash'></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Pagination -->
            {{ $users->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin_user_management.css') }}">
    <!-- Additional stylesheets -->
@endsection
