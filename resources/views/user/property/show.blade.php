@extends('user.layouts.user_dashboard')

@section('title', 'View Property')

@section('header', 'View Property')

@section('content')
    <div class="container">
        <h4 class="font-weight-bold py-3 mb-4">Property Details</h4>

        <div class="card mb-4">
            @if($property->image_url)
                <img src="{{ asset('storage/' . $property->image_url) }}" alt="Property Image" class="card-img-top">
            @else
                <img src="https://media.designcafe.com/wp-content/uploads/2023/07/05141750/aesthetic-room-decor.jpg" alt="Default Profile Picture" class="card-img-top">
            @endif
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th>Name</th>
                    <td>{{ $property->name }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $property->description }}</td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td>{{ $property->location }}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{ $property->price }}</td>
                </tr>
                <tr>
                    <th>Publish Date</th>
                    <td>{{ \Carbon\Carbon::parse($property->updated_at)->format('F j, Y') }}</td>
                </tr>
                <tr>
                    <th>Map</th>
                    <td>
                        <div id="map" style="height: 300px;"></div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <h4 class="font-weight-bold py-3 mb-4">Rent Property</h4>
        <form action="{{ route('user.properties.confirm', ['propertyId' => $property->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="rental_duration">Rental Duration</label>
                <select name="rental_duration" class="form-control" id="rental_duration">
                    <option value="1">1 month</option>
                    <option value="2">2 months</option>
                    <option value="3">3 months</option>
                    <option value="6">6 months</option>
                    <option value="12">1 year</option>
                </select>
            </div>
            <button type="submit" class="btn">Proceed to Rent Property</button>
        </form>
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
@endsection


