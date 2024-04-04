@extends('user.layouts.user_dashboard')

@section('title', 'Properties')

@section('header', 'Properties')

@section('content')
    <div class="container">
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
        <div class="row">
            @foreach($properties as $property)
                <div class="col-md-4">
                    <div class="card mb-4">
                        @if($property->image_url)
                        <img src="{{ asset('storage/' . $property->image_url) }}" alt="Property Image">
                        @else
                            <img src="https://media.designcafe.com/wp-content/uploads/2023/07/05141750/aesthetic-room-decor.jpg" alt="Default Profile Picture" class="card-img-top">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $property->name }}</h5>
                            <p class="card-text">{{ $property->description }}</p>
                            <p class="card-text">Location: {{ $property->location }}</p>
                            <p class="card-text">Price: Rs. {{ $property->price }}</p>
                            <div class="d-grid gap-2">
                                <form method="POST" action="{{ route('user.properties.rent', ['property' => $property->id]) }}">
                                    @csrf
                                    <button type="submit" class="btn ">Rent</button>
                                </form>
                                <a href="{{ route('user.properties.show', ['property' => $property->id]) }}" class="btn">View Property</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
    </style>
@endsection
