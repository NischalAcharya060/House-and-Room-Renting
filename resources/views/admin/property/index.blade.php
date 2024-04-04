@extends('admin.layouts.admin_dashboard')

@section('title', 'Property Management')

@section('header', 'Property Management')

@section('content')
    <div class="container">
        <h4 class="font-weight-bold py-3 mb-4">Property Management</h4>

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

        {{-- Add Property button --}}
        <div class="text-right mb-3">
            <a href="{{ route('admin.properties.create') }}" class="btn btn-primary">
                <i class='bx bx-plus'></i> Add Property
            </a>
        </div>

        {{-- Property Table --}}
        <div class="table-responsive">
            @if($properties->isEmpty())
                {{-- Display message if no properties found --}}
                <p>No properties found</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Property Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Location</th>
                            <th>Price</th>
                            <th>Map Coordinates</th>
                            <th>Property Type</th>
                            <th>Property Owner</th>
                            <th>Property Owner Phone No</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($properties as $property)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($property->image_url)
                                    <img src="{{ asset('storage/' . $property->image_url) }}" alt="Property Image">
                                    @else
                                    <img src="https://media.designcafe.com/wp-content/uploads/2023/07/05141750/aesthetic-room-decor.jpg" alt="Default Profile Picture" class="img-fluid">
                                    @endif
                                </td>
                                <td>{{ $property->name }}</td>
                                <td>{{ $property->description }}</td>
                                <td>{{ $property->location }}</td>
                                <td>{{ $property->price }}</td>
                                <td>{{ $property->map_coordinates }}</td>
                                <td>{{ $property->property_type }}</td>
                                <td>{{ $property->property_owner }}</td>
                                <td>{{ $property->property_owner_phone_no }}</td>
                                <td>
                                    <a href="{{ route('admin.properties.show', $property->id) }}" class="btn btn-info btn-sm" title="View">
                                        <i class='bx bx-show'></i>
                                    </a>
                                    <a href="{{ route('admin.properties.edit', $property->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                        <i class='bx bx-edit'></i>
                                    </a>
                                    <form action="{{ route('admin.properties.destroy', $property->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this property?')">
                                            <i class='bx bx-trash'></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- Pagination Links --}}
                {{ $properties->links('vendor.pagination.bootstrap-4') }}
            @endif
        </div>
    </div>
@endsection
