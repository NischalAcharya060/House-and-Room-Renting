@extends('user.layouts.user_dashboard')

@section('title', $property->name)

@section('header', $property->name)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-body">
                        @if($property->image_url)
                            <img src="{{ asset('storage/property_images/' . $property->image_url) }}" alt="Property Image" class="img-fluid mb-3 rounded">
                        @else
                            <img src="https://media.designcafe.com/wp-content/uploads/2023/07/05141750/aesthetic-room-decor.jpg" alt="Default Profile Picture" class="img-fluid mb-3 rounded">
                        @endif
                        <p class="lead">{{ $property->description }}</p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group">
                                    <li class="list-group-item"><strong>Location:</strong> {{ $property->location }}</li>
                                    <li class="list-group-item"><strong>Price:</strong> Rs. {{ $property->price }}</li>
                                    <li class="list-group-item"><strong>Property Type:</strong> {{ $property->property_type }}</li>
                                    <li class="list-group-item"><strong>Property Owner:</strong> {{ $property->property_owner }}</li>
                                    <li class="list-group-item"><strong>Owner Phone No.:</strong> {{ $property->property_owner_phone_no }}</li>
                                </ul>
                            </div>
{{--                            <div class="col-md-6">--}}
{{--                                <div id="map" style="height: 300px;"></div>--}}
{{--                            </div>--}}
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('user.properties.rent', ['property' => $property->id]) }}" class="btn btn-custom-primary">Rent</a>
                            <a href="{{ route('user.properties.index') }}" class="btn btn-custom-secondary">Back to Properties</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var coordinates = [{{ $property->map_coordinates }}];
            var map = L.map('map').setView(coordinates, 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            var marker = L.marker(coordinates).addTo(map);
        });
    </script>
@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
