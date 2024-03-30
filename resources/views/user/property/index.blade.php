@extends('user.layouts.user_dashboard')

@section('title', 'Properties')

@section('header', 'Properties')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($properties as $property)
                <div class="col-md-4">
                    <div class="card mb-4">
                        @if($property->image_url)
                            <img src="{{ asset('storage/property_images/' . $property->image_url) }}" alt="Property Image" class="card-img-top">
                        @else
                            <img src="https://media.designcafe.com/wp-content/uploads/2023/07/05141750/aesthetic-room-decor.jpg" alt="Default Profile Picture" class="card-img-top">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $property->name }}</h5>
                            <p class="card-text">{{ $property->description }}</p>
                            <p class="card-text">Location: {{ $property->location }}</p>
                            <p class="card-text">Price: Rs. {{ $property->price }}</p>
                            <div class="d-grid gap-2">
                                <a href="{{ route('user.properties.rent', ['property' => $property->id]) }}" class="btn btn-custom-primary">Rent</a>
                                <a href="{{ route('user.properties.show', ['property' => $property->id]) }}" class="btn btn-custom-secondary">View Property</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.1.0/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /* Custom button styles */
        .btn-custom-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-custom-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-custom-primary:hover,
        .btn-custom-secondary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
@endsection
