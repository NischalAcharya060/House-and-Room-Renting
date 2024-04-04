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
                                <input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}" required>
                            </div>

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
@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
@endsection
