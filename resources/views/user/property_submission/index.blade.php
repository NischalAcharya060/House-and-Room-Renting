@extends('user.layouts.user_dashboard')

@section('title', 'Properties Submission')

@section('header', 'Properties Submission')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Submit Property') }}</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('properties_submission.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="description">{{ __('Description') }}</label>
                                <textarea id="description" class="form-control" name="description" required>{{ old('description') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="location">{{ __('Location') }}</label>
                                <input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}" required onchange="updateMap()">
                            </div>

                            <div class="form-group">
                                <label for="map_coordinates">Map Coordinates</label>
                                <input type="hidden" name="map_coordinates" id="map_coordinates" class="form-control" value="{{ old('map_coordinates') }}">
                            </div>
                            <div id="map" style="height: 300px;"></div>

                            <div class="form-group">
                                <label for="price">{{ __('Price') }}</label>
                                <input id="price" type="number" class="form-control" name="price" value="{{ old('price') }}" required>
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
                                <label for="image">{{ __('Image') }}</label>
                                <input id="image" type="file" class="form-control" name="image">
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
@endsection
