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
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&family=Poppins:wght@400;500;600;700&display=swap"
      rel="stylesheet">
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
    
        <div class="header-bottom">
          <div class="container">
    
            <a href="#" class="logo">
              <img src="{{ asset('img/logo.jpg') }}" alt="logo" style="width: 65px;">
            </a>
    
            <nav class="navbar" data-navbar>
    
              <div class="navbar-top">
    
                <a href="#" class="logo">
                  <img src="{{ asset('img/logo.jpg') }}" alt=" logo">
                </a>
    
                <button class="nav-close-btn" data-nav-close-btn aria-label="Close Menu">
                  <ion-icon name="close-outline"></ion-icon>
                </button>
    
              </div>
    
              <div class="navbar-bottom">
                <ul class="navbar-list">
    
                  <li>
                    <a href="#home" class="navbar-link" data-nav-link>Home</a>
                  </li>
    
                  <li>
                    <a href="#about" class="navbar-link" data-nav-link>About</a>
                  </li>
    
                  <li>
                    <a href="#service" class="navbar-link" data-nav-link>Service</a>
                  </li>
    
                  <li>
                    <a href="#property" class="navbar-link" data-nav-link>Property</a>
                  </li>
    
                  <li>
                    <a href="#contact" class="navbar-link" data-nav-link>Contact</a>
                  </li>
    
                </ul>
              </div>
    
            </nav>
    
            <div class="header-bottom-actions">
    
              <button class="header-bottom-actions-btn" aria-label="Search">
                <ion-icon name="search-outline"></ion-icon>
    
                <span>Search</span>
              </button>
    
              <button class="header-bottom-actions-btn" aria-label="Profile">
                <ion-icon name="person-outline"></ion-icon>
    
                <span>Profile</span>
              </button>
    
              <button class="header-bottom-actions-btn" aria-label="Cart">
                <ion-icon name="cart-outline"></ion-icon>
    
                <span>Cart</span>
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
                

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/user_dashboard.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
