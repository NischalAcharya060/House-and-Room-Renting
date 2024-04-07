@extends('user.layouts.user_dashboard')

@section('title', 'Success Renting')

@section('content')
    <div class="container mt-5">
        <div class="card border-success">
            <div class="card-body">
                <h4 class="card-title text-success">Renting Successful</h4>
                <p class="card-text">Your renting process has been successfully completed. </p>
                <p class="card-text mt-3">Thank you for choosing our service. We hope you enjoy your stay!</p>
                <a href="{{ route('user.properties.index') }}" class="btn">Back</a>
            </div>
        </div>
    </div>
@endsection
