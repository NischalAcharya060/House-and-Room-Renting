<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/user_dashboard.css') }}" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.1/css/boxicons.min.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&family=Poppins:wght@400;500;600;700&display=swap"
      rel="stylesheet">
    <style>
        a:hover{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header class="header" data-header>

        <div class="overlay" data-overlay></div>

        <div class="header-top">
          <div class="container">

            <ul class="header-top-list">

              <li>
                <a href="mailto:info@.com" class="header-top-link">
                  <ion-icon name="mail-outline"></ion-icon>

                  <span>info@bashai.com</span>
                </a>
              </li>

              <li>
                <a href="#" class="header-top-link">
                  <ion-icon name="location-outline"></ion-icon>

                  <address>ithari, Nepal</address>
                </a>
              </li>

            </ul>

            <div class="wrapper">
              <button class="header-top-btn">Add Listing</button>
            </div>

          </div>
        </div>
        <br>
        <br>

        <div class="header-bottom">
          <div class="container">

            <a href="#" class="logo">
              <img src="{{ asset('img/logo.png') }}" alt="logo" style="width: 65px;">
            </a>

            <nav class="navbar" data-navbar>

              <div class="navbar-top">

                <a href="#" class="logo">
                  <img src="{{ asset('img/logo.png') }}" alt=" logo">
                </a>

                <button class="nav-close-btn" data-nav-close-btn aria-label="Close Menu">
                  <ion-icon name="close-outline"></ion-icon>
                </button>

              </div>

              <div class="navbar-bottom">
                <ul class="navbar-list">

                  <li>
                    <a href="{{ route('user.dashboard') }}" class="navbar-link" data-nav-link>Home</a>
                  </li>

                  <li>
                    <a href="{{ route('user.dashboard') }}" class="navbar-link" data-nav-link>About</a>
                  </li>

                  <li>
                    <a href="{{ route('user.properties.index') }}" class="navbar-link" data-nav-link>Property</a>
                  </li>

                  <li>
                    <a href="{{ route('user.contact.showform') }}" class="navbar-link" data-nav-link>Contact</a>
                  </li>

                </ul>
              </div>

            </nav>

            <div class="header-bottom-actions">

              <button class="header-bottom-actions-btn" aria-label="Profile">
                <ion-icon name="person-outline"></ion-icon>

                <span>Profile</span>
              </button>

              <button class="header-bottom-actions-btn" aria-label="Logout">
                <a href="{{ route('logout') }}" style="text-decoration: none; color: black;">
                    <i class='bx bx-log-out-circle' style="font-size: 20px; text-align: right;"></i>
                </a>
            </button>

              <button class="header-bottom-actions-btn" data-nav-open-btn aria-label="Open Menu">
                <ion-icon name="menu-outline"></ion-icon>

                <span>Menu</span>
              </button>

            </div>

          </div>
        </div>

      </header>
                    <div class="card-body">
                        @yield('content')
                    </div>

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
                            <a href="{{ route('user.dashboard') }}" class="footer-link">Home</a>
                        </li>

                        <li>
                            <a href="{{ route('user.dashboard') }}" class="footer-link">About</a>
                        </li>

                        <li>
                            <a href="{{ route('user.properties.index') }}" class="footer-link">Property</a>
                        </li>

                        <li>
                            <a href="{{ route('user.contact.showform') }}" class="footer-link">Contact</a>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/user_dashboard.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
