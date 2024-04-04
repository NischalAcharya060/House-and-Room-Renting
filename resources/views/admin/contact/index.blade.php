@extends('admin.layouts.admin_dashboard')

@section('title', 'Contact Messages')

@section('header', 'Contact Messages')

@section('content')
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($contactMessages as $message)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->subject }}</td>
                        <td>{{ $message->message }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
