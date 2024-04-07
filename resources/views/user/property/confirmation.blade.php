@extends('user.layouts.user_dashboard')
@section('title', 'Renting Confirmation')
@section('content')

    <div class="container mt-5">
        <div class="text-center mb-4">
            <h2>Renting Confirmation</h2>
        </div>

        <div class="card border-0 shadow">
            <div class="card-body">
                <p class="card-text">Thank you for choosing us! Please review the details of your renting:</p>

                <ul class="list-group">
                    <div class="card border-0 shadow">
                        @if($property->image_url)
                            <img src="{{ asset('storage/' . $property->image_url) }}" alt="Property Image" class="card-img-top">
                        @else
                            <img src="https://media.designcafe.com/wp-content/uploads/2023/07/05141750/aesthetic-room-decor.jpg" alt="Default Profile Picture" class="card-img-top">
                        @endif
                    </div>
                    <li class="list-group-item"><strong>Property:</strong> {{ $property->name }}</li>
                    <li class="list-group-item"><strong>Rental Duration:</strong> {{ $rental->rental_duration }} months</li>
                    <li class="list-group-item"><strong>Total Price:</strong> Rs. {{ $rental->total_amount }}</li>
                </ul>

                <!-- Display the map -->
                <div id="map" style="height: 300px; border-radius: 8px; overflow: hidden;"></div>

                <div class="mt-4">
                    <p class="card-text">Continue To pay</p>

                    <!-- Payment methods -->
                    <form action="{{ route('user.bookings.stripe.payment') }}" method="POST">
                        @csrf
                        <input type='hidden' name="paymentMethod" value="Stripe">
                        <input type='hidden' name="total" value="{{ $rental->total_amount }}">
                        <input type='hidden' name="productname" value="{{ $property->name }}">
                        <button type="submit" class="btn">Pay with Stripe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize map with facility coordinates
            var coordinates = [{{ $property->map_coordinates }}];
            var map = L.map('map').setView(coordinates, 15);

            // Add OpenStreetMap tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            // Add marker for the facility location
            var marker = L.marker(coordinates).addTo(map);
        });
    </script>

@endsection

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
@endsection
