@extends('user.layouts.user_dashboard')

@section('title', 'My Renting')

@section('header', 'My Renting')

@section('content')
    <div class="container">
        <h1>My Renting</h1>
        <br>
        @if ($rentedProperties->isEmpty())
            <div class="alert alert-info" role="alert">
                <p>You have not rented any properties yet.</p>
            </div>
        @else
            @foreach ($rentedProperties as $rental)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $rental->property->name }}</h5>
                        <p class="card-text">{{ $rental->property->description }}</p>
                        <!-- Add more property details as needed -->
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
