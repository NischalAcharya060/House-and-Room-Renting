@extends('admin.layouts.admin_dashboard')

@section('title', 'View Property')

@section('header', 'View Property')

@section('content')
    <div class="container">
        <h4 class="font-weight-bold py-3 mb-4">Property Details</h4>

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
                    <div id="map" style="height: 300px;"></div>
                    <tr>
                        <th>Price</th>
                        <td>{{ $property->price }}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $property->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{ $property->updated_at }}</td>
                    </tr>
                </tbody>
            </table>
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
@endsection