@extends('admin.layouts.admin_dashboard')

@section('title', 'Rentings')

@section('header', 'Rentings')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($rentals->isEmpty())
                    <div class="alert alert-info" role="alert">
                        No rentals available.
                    </div>
                @else
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Property</th>
                            <th>User Name</th>
                            <th>Rental Duration</th>
                            <th>Rental Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rentals as $rental)
                            <tr>
                                <td>{{ $rental->id }}</td>
                                <td>{{ $rental->property->name }}</td>
                                <td>{{ $rental->user->name }}</td>
                                <td>{{ $rental->rental_duration }}</td>
                                <td>{{ $rental->created_at->format('Y-m-d H:i:s') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination links -->
                    {{ $rentals->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection
