@extends('admin.layouts.admin_dashboard')

@section('title', 'Add Property')

@section('header', 'Add Property')

@section('content')
    <div class="container">
        <h4 class="font-weight-bold py-3 mb-4">Add Property</h4>

        <div class="card">
            <div class="card-header">
                <h4>Add Property</h4>
            </div>
            <div class="card-body">
                {{-- Display success message if available --}}
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Display error message if available --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
                <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name="location" id="location" class="form-control"  value="{{ old('location') }}" onchange="updateMap()">
                    </div>
                    <div class="form-group">
                        <label for="map_coordinates">Map Coordinates</label>
                        <input type="hidden" name="map_coordinates" id="map_coordinates" class="form-control" value="{{ old('map_coordinates') }}">
                    </div>
                    <div id="map" style="height: 300px;"></div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}">
                    </div>
                    <div class="form-group">
                        <label for="property_type">Property Type</label>
                        <select name="property_type" id="property_type" class="form-control">
                            <option value="room" {{ old('property_type') === 'room' ? 'selected' : '' }}>Room</option>
                            <option value="floor" {{ old('property_type') === 'floor' ? 'selected' : '' }}>Floor</option>
                        </select>
                    </div>                    
                    <div class="form-group">
                        <label for="property_owner">Property Owner</label>
                        <input type="text" name="property_owner" id="property_owner" class="form-control" value="{{ old('property_owner') }}">
                    </div>
                    <div class="form-group">
                        <label for="property_owner_phone_no">Property Owner's Phone Number</label>
                        <input type="text" name="property_owner_phone_no" id="property_owner_phone_no" class="form-control" value="{{ old('property_owner_phone_no') }}">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Property</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var map = L.map('map').setView([0, 0], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            var marker = L.marker([0, 0], { draggable: true }).addTo(map);

            marker.on('dragend', function (event) {
                var position = marker.getLatLng();
                document.getElementById('map_coordinates').value = position.lat + ',' + position.lng;
            });
            window.updateMap = function () {
                var locationInput = document.getElementById('location').value;

                if (locationInput) {
                    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(locationInput)}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data && data.length > 0) {
                                var newCoordinates = [parseFloat(data[0].lat), parseFloat(data[0].lon)];
                                map.setView(newCoordinates, 15);
                                marker.setLatLng(newCoordinates);
                                document.getElementById('map_coordinates').value = newCoordinates.join(',');
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching coordinates:', error);
                        });
                }
            };
        });
    </script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
@endsection
