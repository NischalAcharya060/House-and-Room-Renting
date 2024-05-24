@extends('user.layouts.user_dashboard')

@section('title', 'User Dashboard')

@section('header', 'User Dashboard')

@section('content')
<section class="hero" id="home">
    <div class="container">

      <div class="hero-content">

        <p class="hero-subtitle">
          <ion-icon name="home"></ion-icon>

          <span>Bashai</span>
        </p>

        <h2 class="h1 hero-title">Find Your Dream House By Us</h2>

        <button class="btn">Make An Enquiry</button>

      </div>

      <figure class="hero-banner">
        <img src="{{ asset("img/modern.webp") }}" alt="Modern house model" class="w-100">
      </figure>

    </div>
  </section>





  <!--
    - #ABOUT
  -->

  <section class="about" id="about">
    <div class="container">

      <figure class="about-banner">
        <img src="{{ asset("img/modern.webp") }}" alt="House interior">

        <img src="{{ asset("img/interior.webp") }}" alt="House interior" class="abs-img">
      </figure>

      <div class="about-content">

        <p class="section-subtitle">About Us</p>

        <h2 class="h2 section-title">The Leading Real Estate Rental Marketplace.</h2>

        <p class="about-text">
          Over 39,000 people work for us in more than 70 countries all over the This breadth of global coverage,
          combined with
          specialist services
        </p>

        <ul class="about-list">

          <li class="about-item">
            <div class="about-item-icon">
              <ion-icon name="home-outline"></ion-icon>
            </div>

            <p class="about-item-text">Smart Home Design</p>
          </li>

          <li class="about-item">
            <div class="about-item-icon">
              <ion-icon name="leaf-outline"></ion-icon>
            </div>

            <p class="about-item-text">Beautiful Scene Around</p>
          </li>

          <li class="about-item">
            <div class="about-item-icon">
              <ion-icon name="wine-outline"></ion-icon>
            </div>

            <p class="about-item-text">Exceptional Lifestyle</p>
          </li>

          <li class="about-item">
            <div class="about-item-icon">
              <ion-icon name="shield-checkmark-outline"></ion-icon>
            </div>

            <p class="about-item-text">Complete 24/7 Security</p>
          </li>

        </ul>

      </div>

    </div>
  </section>

  <!--
    - #PROPERTY
  -->

  <section class="property" id="property">
    <div class="container">

      <p class="section-subtitle">Properties</p>

      <h2 class="h2 section-title">Featured Listings</h2>

          <div class="row">
              @if($properties->isEmpty())
                  <div class="col-12 text-center">
                      <p>No properties found.</p>
                      <a href="{{ route('user.dashboard') }}" class="btn">Back</a>
                  </div>
              @else
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
                                      <a href="{{ route('user.properties.show', ['property' => $property->id]) }}" class="btn">Rent</a>
                                      <a href="{{ route('user.properties.show', ['property' => $property->id]) }}" class="btn">View Property</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  @endforeach
              @endif
          </div>

    </div>
  </section>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.1.0/css/boxicons.min.css' rel='stylesheet'>
@endsection
