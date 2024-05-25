@extends('admin.layouts.admin_dashboard')

@section('title', 'Notification')

@section('header', 'Notification')

@section('content')
    <div class="container">
        <h4 class="font-weight-bold py-3 mb-4">Notification</h4>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($notifications->isEmpty())
            <div class="alert alert-danger">
                <p>No notifications at this time.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Added By</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($notifications as $notification)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $notification->added_by }}</td>
                            <td>{{ $notification->message }}</td>
                            <td>{{ $notification->status }}</td>
                            <td>
                                @if($notification->status === 'pending')
                                    <form action="{{ route('admin.notification.accept', $notification->id) }}" method="post" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success">Accept</button>
                                    </form>
                                    <form action="{{ route('admin.notification.reject', $notification->id) }}" method="post" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
@endsection
