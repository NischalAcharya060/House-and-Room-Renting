@extends('admin.layouts.admin_dashboard')

@section('title', 'Admin Dashboard')

@section('header', 'Admin Dashboard')

@section('content')
    <div class="container">
        <h2 class="mb-4">Welcome, {{ $user->name }}!</h2>

        @if(session('success'))
            <div class="alert alert-success mt-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="row mt-4">
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('admin.user.management') }}" class="card-link">
                    <div class="card rounded shadow">
                        <div class="card-body text-center">
                            <i class='bx bx-user bx-lg'></i>
                            <h5 class="card-title mt-3">Total Users</h5>
                            <p class="card-text">{{ $userCount }}</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-lg-4">
                <a href="{{ route('admin.renting.index') }}" class="card-link">
                    <div class="card rounded shadow">
                        <div class="card-body text-center">
                            <i class='bx bx-calendar bx-lg'></i>
                            <h5 class="card-title mt-3">Total Rentings</h5>
                            <p class="card-text">{{ $rentingCount }}</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-lg-4">
                <a href="{{ route('admin.properties.index') }}" class="card-link">
                    <div class="card rounded shadow">
                        <div class="card-body text-center">
                            <i class='bx bxs-building bx-lg'></i>
                            <h5 class="card-title mt-3">Total Properties</h5>
                            <p class="card-text">{{ $propertyCount }}</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <canvas id="userChart"></canvas>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('userChart').getContext('2d');
            var userCounts = {!! json_encode($userCounts) !!};
            var userTypes = Object.keys(userCounts);

            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: userTypes,
                    datasets: [{
                        label: 'Types of Users',
                        backgroundColor: ['blue', 'green', 'orange'],
                        data: Object.values(userCounts)
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: { display: false },
                        title: { display: true, text: 'User Distribution by Type' }
                    }
                }
            });
        });
    </script>
@endsection

@section('styles')
    <style>
        .card {
            margin-bottom: 20px;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .card-body i {
            font-size: 3rem;
            margin-bottom: 15px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin_dashboard.css') }}" />
@endsection
