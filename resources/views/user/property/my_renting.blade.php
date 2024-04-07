@extends('user.layouts.user_dashboard')

@section('title', 'My Renting')

@section('header', 'My Renting')

@section('content')
    <div class="container">
        <h1 class="mb-4">My Renting</h1>

        @if ($rentedProperties->isEmpty())
            <div class="alert alert-info" role="alert">
                <p>You have not rented any properties yet.</p>
            </div>
        @else
            @foreach ($rentedProperties as $key => $rental)
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                @if($rental->property->image_url)
                                    <img src="{{ asset('storage/' . $rental->property->image_url) }}" alt="Property Image" class="img-fluid">
                                @else
                                    <img src="https://media.designcafe.com/wp-content/uploads/2023/07/05141750/aesthetic-room-decor.jpg" alt="Default Profile Picture" class="img-fluid">
                                @endif
                            </div>
                            <div class="col-md-9">
                                <h5 class="card-title">{{ $key + 1 }}. {{ $rental->property->name }}</h5>
                                <p class="card-text"><strong>Description:</strong> {{ $rental->property->description }}</p>
                                <p class="card-text"><strong>Rental Duration:</strong> {{ $rental->rental_duration }} months</p>
                                <p class="card-text"><strong>Total Amount:</strong> Rs. {{ $rental->total_amount }}</p>
                                <p class="card-text"><strong>Status:</strong> {{ $rental->status }}</p>
                                <a href="{{ route('user.properties.show', ['property' => $rental->property->id]) }}" class="btn btn-primary">View Property</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="d-flex justify-content-center">
                    {{ $rentedProperties->links('vendor.pagination.bootstrap-4') }}
                </div>
        @endif
    </div>
@endsection
