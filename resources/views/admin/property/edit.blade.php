@extends('admin.layouts.admin_dashboard')

@section('title', 'Edit Property')

@section('header', 'Edit Property')

@section('content')
    <div class="container">
        <div class="card-header">
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
            <h4>Edit Property</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.properties.update', $property->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $property->name }}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control">{{ $property->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" name="location" id="location" class="form-control" value="{{ $property->location }}">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" id="price" class="form-control" value="{{ $property->price }}">
                </div>
                <!-- New Fields -->
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="map_coordinates">Map Coordinates</label>
                    <input type="hidden" name="map_coordinates" id="map_coordinates" class="form-control" value="{{ $property->map_coordinates }}">
                </div>
                <div id="map" style="height: 300px;"></div>
                <div class="form-group">
                    <label for="property_type">Property Type</label>
                    <select name="property_type" id="property_type" class="form-control">
                        <option value="room" {{ old('property_type', $property->property_type) === 'room' ? 'selected' : '' }}>Room</option>
                        <option value="floor" {{ old('property_type', $property->property_type) === 'floor' ? 'selected' : '' }}>Floor</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="property_owner">Property Owner</label>
                    <input type="text" name="property_owner" id="property_owner" class="form-control" value="{{ $property->property_owner }}">
                </div>
                <div class="form-group">
                    <label for="property_owner_phone_no">Property Owner Phone No</label>
                    <input type="text" name="property_owner_phone_no" id="property_owner_phone_no" class="form-control" value="{{ $property->property_owner_phone_no }}">
                </div>
                <button type="submit" class="btn btn-primary">Update Property</button>
            </form>
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

            var marker = L.marker(coordinates, { draggable: true }).addTo(map);

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
@endsection

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
@endsection
