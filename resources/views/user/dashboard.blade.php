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

        <p class="hero-text">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.
        </p>

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

        <p class="callout">
          "Enimad minim veniam quis nostrud exercitation
          llamco laboris. Lorem ipsum dolor sit amet"
        </p>

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

      <ul class="property-list has-scrollbar">

        <li>
          <div class="property-card">

            <figure class="card-banner">

              <a href="#">
                <img src="{{ asset("img/modern.webp") }}" alt="New Apartment Nice View" class="w-100">
              </a>

              <div class="card-badge green">For Rent</div>

              <div class="banner-actions">

                <button class="banner-actions-btn">
                  <ion-icon name="location"></ion-icon>

                  <address>Belmont Gardens, Chicago</address>
                </button>

              </div>

            </figure>

            <div class="card-content">

              <div class="card-price">
                <strong>$34,900</strong>/Month
              </div>

              <h3 class="h3 card-title">
                <a href="#">New Apartment Nice View</a>
              </h3>

              <p class="card-text">
                Beautiful Huge 1 Family House In Heart Of Westbury. Newly Renovated With New Wood
              </p>

            </div>

          </div>
        </li>

        <li>
          <div class="property-card">

            <figure class="card-banner">

              <a href="#">
                <img src="{{ asset("img/modern.webp") }}" alt="Modern Apartments" class="w-100">
              </a>

              <div class="card-badge orange">For Sales</div>

              <div class="banner-actions">

                <button class="banner-actions-btn">
                  <ion-icon name="location"></ion-icon>

                  <address>Belmont Gardens, Chicago</address>
                </button>

              </div>

            </figure>

            <div class="card-content">

              <div class="card-price">
                <strong>$34,900</strong>/Month
              </div>

              <h3 class="h3 card-title">
                <a href="#">Modern Apartments</a>
              </h3>

              <p class="card-text">
                Beautiful Huge 1 Family House In Heart Of Westbury. Newly Renovated With New Wood
              </p>

            </div>

          </div>
        </li>

        <li>
          <div class="property-card">

            <figure class="card-banner">

              <a href="#">
                <img src="{{ asset("img/modern.webp") }}" alt="Comfortable Apartment" class="w-100">
              </a>

              <div class="card-badge green">For Rent</div>

              <div class="banner-actions">

                <button class="banner-actions-btn">
                  <ion-icon name="location"></ion-icon>

                  <address>Belmont Gardens, Chicago</address>
                </button>

              </div>

            </figure>

            <div class="card-content">

              <div class="card-price">
                <strong>$34,900</strong>/Month
              </div>

              <h3 class="h3 card-title">
                <a href="#">Comfortable Apartment</a>
              </h3>

              <p class="card-text">
                Beautiful Huge 1 Family House In Heart Of Westbury. Newly Renovated With New Wood
              </p>

            </div>

          </div>
        </li>

        <li>
          <div class="property-card">

            <figure class="card-banner">

              <a href="#">
                <img src="{{ asset("img/modern.webp") }}" alt="Luxury villa in Rego Park" class="w-100">
              </a>

              <div class="card-badge green">For Rent</div>

              <div class="banner-actions">

                <button class="banner-actions-btn">
                  <ion-icon name="location"></ion-icon>

                  <address>Belmont Gardens, Chicago</address>
                </button>

              </div>

            </figure>

            <div class="card-content">

              <div class="card-price">
                <strong>$34,900</strong>/Month
              </div>

              <h3 class="h3 card-title">
                <a href="#">Luxury villa in Rego Park</a>
              </h3>

              <p class="card-text">
                Beautiful Huge 1 Family House In Heart Of Westbury. Newly Renovated With New Wood
              </p>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </section>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.1.0/css/boxicons.min.css' rel='stylesheet'>
@endsection
