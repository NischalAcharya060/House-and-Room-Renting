@extends('user.layouts.user_dashboard')

@section('title', 'User Dashboard')

@section('header', 'User Dashboard')

@section('content')
<section class="hero" id="home">
    <div class="container">

      <div class="hero-content">

        <p class="hero-subtitle">
          <ion-icon name="home"></ion-icon>

          <span>Real Estate Agency</span>
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

        <a href="#service" class="btn">Our Services</a>

      </div>

    </div>
  </section>





  <!-- 
    - #SERVICE
  -->

  <section class="service" id="service">
    <div class="container">

      <p class="section-subtitle">Our Services</p>

      <h2 class="h2 section-title">Our Main Focus</h2>

      <ul class="service-list">
        <li>
          <div class="service-card">

            <div class="card-icon">
              <img src="{{ asset("img/modern.webp") }}" class="small-image">
            </div>

            <h3 class="h3 card-title">
              <a href="#">Rent a home</a>
            </h3>

            <p class="card-text">
              over 1 million+ homes for sale available on the website, we can match you with a house you will want
              to call home.
            </p>

            <a href="#" class="card-link">
              <span>Find A Home</span>

              <ion-icon name="arrow-forward-outline"></ion-icon>
            </a>

          </div>
        </li>

      </ul>

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

                <button class="banner-actions-btn">
                  <ion-icon name="camera"></ion-icon>

                  <span>4</span>
                </button>

                <button class="banner-actions-btn">
                  <ion-icon name="film"></ion-icon>

                  <span>2</span>
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

              <ul class="card-list">

                <li class="card-item">
                  <strong>3</strong>

                  <ion-icon name="bed-outline"></ion-icon>

                  <span>Bedrooms</span>
                </li>

                <li class="card-item">
                  <strong>2</strong>

                  <ion-icon name="man-outline"></ion-icon>

                  <span>Bathrooms</span>
                </li>

                <li class="card-item">
                  <strong>3450</strong>

                  <ion-icon name="square-outline"></ion-icon>

                  <span>Square Ft</span>
                </li>

              </ul>

            </div>

            <div class="card-footer">

              <div class="card-author">

                <figure class="author-avatar">
                  <img src="{{ asset("img/modern.webp") }}" alt="William Seklo" class="w-100">
                </figure>

                <div>
                  <p class="author-name">
                    <a href="#">William Seklo</a>
                  </p>

                  <p class="author-title">Estate Agents</p>
                </div>

              </div>

              <div class="card-footer-actions">

                <button class="card-footer-actions-btn">
                  <ion-icon name="resize-outline"></ion-icon>
                </button>

                <button class="card-footer-actions-btn">
                  <ion-icon name="heart-outline"></ion-icon>
                </button>

                <button class="card-footer-actions-btn">
                  <ion-icon name="add-circle-outline"></ion-icon>
                </button>

              </div>

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

                <button class="banner-actions-btn">
                  <ion-icon name="camera"></ion-icon>

                  <span>4</span>
                </button>

                <button class="banner-actions-btn">
                  <ion-icon name="film"></ion-icon>

                  <span>2</span>
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

              <ul class="card-list">

                <li class="card-item">
                  <strong>3</strong>

                  <ion-icon name="bed-outline"></ion-icon>

                  <span>Bedrooms</span>
                </li>

                <li class="card-item">
                  <strong>2</strong>

                  <ion-icon name="man-outline"></ion-icon>

                  <span>Bathrooms</span>
                </li>

                <li class="card-item">
                  <strong>3450</strong>

                  <ion-icon name="square-outline"></ion-icon>

                  <span>Square Ft</span>
                </li>

              </ul>

            </div>

            <div class="card-footer">

              <div class="card-author">

                <figure class="author-avatar">
                  <img src="{{ asset("img/modern.webp") }}" alt="William Seklo" class="w-100">
                </figure>

                <div>
                  <p class="author-name">
                    <a href="#">William Seklo</a>
                  </p>

                  <p class="author-title">Estate Agents</p>
                </div>

              </div>

              <div class="card-footer-actions">

                <button class="card-footer-actions-btn">
                  <ion-icon name="resize-outline"></ion-icon>
                </button>

                <button class="card-footer-actions-btn">
                  <ion-icon name="heart-outline"></ion-icon>
                </button>

                <button class="card-footer-actions-btn">
                  <ion-icon name="add-circle-outline"></ion-icon>
                </button>

              </div>

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

                <button class="banner-actions-btn">
                  <ion-icon name="camera"></ion-icon>

                  <span>4</span>
                </button>

                <button class="banner-actions-btn">
                  <ion-icon name="film"></ion-icon>

                  <span>2</span>
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

              <ul class="card-list">

                <li class="card-item">
                  <strong>3</strong>

                  <ion-icon name="bed-outline"></ion-icon>

                  <span>Bedrooms</span>
                </li>

                <li class="card-item">
                  <strong>2</strong>

                  <ion-icon name="man-outline"></ion-icon>

                  <span>Bathrooms</span>
                </li>

                <li class="card-item">
                  <strong>3450</strong>

                  <ion-icon name="square-outline"></ion-icon>

                  <span>Square Ft</span>
                </li>

              </ul>

            </div>

            <div class="card-footer">

              <div class="card-author">

                <figure class="author-avatar">
                  <img src="{{ asset("img/modern.webp") }}" alt="William Seklo" class="w-100">
                </figure>

                <div>
                  <p class="author-name">
                    <a href="#">William Seklo</a>
                  </p>

                  <p class="author-title">Estate Agents</p>
                </div>

              </div>

              <div class="card-footer-actions">

                <button class="card-footer-actions-btn">
                  <ion-icon name="resize-outline"></ion-icon>
                </button>

                <button class="card-footer-actions-btn">
                  <ion-icon name="heart-outline"></ion-icon>
                </button>

                <button class="card-footer-actions-btn">
                  <ion-icon name="add-circle-outline"></ion-icon>
                </button>

              </div>

            </div>

          </div>
        </li>

        <li>
          <div class="property-card">

            <figure class="card-banner">

              <a href="#">
                <img src="./assets/images/property-4.png" alt="Luxury villa in Rego Park" class="w-100">
              </a>

              <div class="card-badge green">For Rent</div>

              <div class="banner-actions">

                <button class="banner-actions-btn">
                  <ion-icon name="location"></ion-icon>

                  <address>Belmont Gardens, Chicago</address>
                </button>

                <button class="banner-actions-btn">
                  <ion-icon name="camera"></ion-icon>

                  <span>4</span>
                </button>

                <button class="banner-actions-btn">
                  <ion-icon name="film"></ion-icon>

                  <span>2</span>
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

              <ul class="card-list">

                <li class="card-item">
                  <strong>3</strong>

                  <ion-icon name="bed-outline"></ion-icon>

                  <span>Bedrooms</span>
                </li>

                <li class="card-item">
                  <strong>2</strong>

                  <ion-icon name="man-outline"></ion-icon>

                  <span>Bathrooms</span>
                </li>

                <li class="card-item">
                  <strong>3450</strong>

                  <ion-icon name="square-outline"></ion-icon>

                  <span>Square Ft</span>
                </li>

              </ul>

            </div>

            <div class="card-footer">

              <div class="card-author">

                <figure class="author-avatar">
                  <img src="./assets/images/author.jpg" alt="William Seklo" class="w-100">
                </figure>

                <div>
                  <p class="author-name">
                    <a href="#">William Seklo</a>
                  </p>

                  <p class="author-title">Estate Agents</p>
                </div>

              </div>

              <div class="card-footer-actions">

                <button class="card-footer-actions-btn">
                  <ion-icon name="resize-outline"></ion-icon>
                </button>

                <button class="card-footer-actions-btn">
                  <ion-icon name="heart-outline"></ion-icon>
                </button>

                <button class="card-footer-actions-btn">
                  <ion-icon name="add-circle-outline"></ion-icon>
                </button>

              </div>

            </div>

          </div>
        </li>

      </ul>

    </div>
  </section>
  <!-- 
    - #CTA
  -->

  <section class="cta">
    <div class="container">

      <div class="cta-card">
        <div class="card-content">
          <h2 class="h2 card-title">Looking for a dream home?</h2>

          <p class="card-text">We can help you realize your dream of a new home</p>
        </div>

        <button class="btn cta-btn">
          <span>Explore Properties</span>

          <ion-icon name="arrow-forward-outline"></ion-icon>
        </button>
      </div>

    </div>
  </section>

</article>
</main>





<!-- 
- #FOOTER
-->

<footer class="footer">

<div class="footer-top">
  <div class="container">

    <div class="footer-brand">

      <a href="#" class="logo">
        <img src="{{ asset('img/logo.png') }}" alt="Bashai logo">
      </a>

      <p class="section-text">
        Lorem Ipsum is simply dummy text of the and typesetting industry. Lorem Ipsum is dummy text of the printing.
      </p>

      <ul class="contact-list">

        <li>
          <a href="#" class="contact-link">
            <ion-icon name="location-outline"></ion-icon>

            <address>Ithari, Nepal</address>
          </a>
        </li>

        <li>
          <a href="tel:+0123456789" class="contact-link">
            <ion-icon name="call-outline"></ion-icon>

            <span>+0123-456789</span>
          </a>
        </li>

        <li>
          <a href="mailto:info@bashai.com" class="contact-link">
            <ion-icon name="mail-outline"></ion-icon>

            <span>info@bashai.com</span>
          </a>
        </li>

      </ul>

    </div>

    <div class="footer-link-box">

      <ul class="footer-list">

        <li>
          <p class="footer-list-title">Home</p>
        </li>

        <li>
          <a href="#" class="footer-link">About</a>
        </li>

        <li>
          <a href="#" class="footer-link">Service</a>
        </li>

        <li>
          <a href="#" class="footer-link">Property</a>
        </li>

        <li>
          <a href="#" class="footer-link">Contact</a>
        </li>

      </ul>

      <ul class="footer-list">

        <li>
          <a href="#" class="footer-link">My account</a>
        </li>

        <li>
          <a href="#" class="footer-link">Wish List</a>
        </li>

        <li>
          <a href="#" class="footer-link">Order tracking</a>
        </li>

      </ul>

    </div>

  </div>
</div>

<div class="footer-bottom">
  <div class="container">

    <p class="copyright">
      &copy; 2022 <a href="#">Bashai</a>. All Rights Reserved.
    </p>

  </div>
</div>

</footer>

@endsection

@section('styles')
    <style>
        .small-image {
  width: 50px; /* Adjust the width as needed */
  height: auto; /* To maintain aspect ratio */
}
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.1.0/css/boxicons.min.css' rel='stylesheet'>
@endsection