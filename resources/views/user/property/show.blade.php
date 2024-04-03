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
{{--                                <div id="map" class="property-map"></div>--}}
{{--                            </div>--}}
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <form method="POST" action="{{ route('user.properties.rent', ['property' => $property->id]) }}">
                                @csrf
                                <button type="submit" class="btn btn-primary">Rent</button>
                            </form>
                            <a href="{{ route('user.properties.index') }}" class="btn btn-secondary">Back to Properties</a>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /* Custom button styles */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-primary:hover,
        .btn-secondary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .property-map {
            height: 300px;
            border-radius: 8px;
            overflow: hidden;
            margin-top: 10px;
        }
    </style>
@endsection
