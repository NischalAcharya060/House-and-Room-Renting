<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/admin_dashboard.css') }}" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    @yield('styles')
</head>
<body>

<section id="sidebar">
    <a href="{{route('admin.dashboard')}}" class="brand" style="text-decoration: none;">
        <div>
            <img src="{{ asset('img/logo.png') }}" alt="logo" style="width: 65px;" />
        </div>
        <span class="text">Bashai</span>
    </a>
    <ul class="side-menu top">
        <li class="active">
            <a style="text-decoration: none;" href="{{ route('admin.dashboard') }}">
                <i class='bx bxs-dashboard' ></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        @if(auth()->check() && auth()->user()->user_type === 'admin')
            <li>
                <a style="text-decoration: none;" href="{{ route('admin.user.management') }}">
                    <i class='bx bxs-user'></i>
                    <span class="text">User Management</span>
                </a>
            </li>
        @endif
        <li>
            <a style="text-decoration: none;" href="{{ route('admin.properties.index') }}">
                <i class='bx bxs-home'></i>
                <span class="text">Properties</span>
            </a>
        </li>
        <li>
            <a style="text-decoration: none;" href="{{ route('admin.renting.index') }}">
                <i class='bx bxs-key'></i>
                <span class="text">Rentings</span>
            </a>
        </li>
        @if(auth()->check() && auth()->user()->user_type === 'admin')
            <li>
                <a style="text-decoration: none;" href="{{ route('admin.notifications.index') }}">
                    <i class='bx bxs-bell'></i>
                    <span class="text">Notification</span>
                </a>
            </li>
        @endif
        @if(auth()->check() && auth()->user()->user_type === 'admin')
            <li>
                <a style="text-decoration: none;" href="{{ route('admin.contact.index') }}">
                    <i class='bx bxs-message-square-detail'></i>
                    <span class="text">Contact Form</span>
                </a>
            </li>
        @endif
    </ul>
    <ul class="side-menu">
        <li>
            <a style="text-decoration: none;" href="{{ route('logout') }}">
                <i class='bx bxs-log-out-circle' ></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</section>

<section id="content">
    <nav>
        <i class='bx bx-menu' ></i>
        <form action="#">
            <div class="form-input">
                <input type="search" placeholder="Search...">
                <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
            </div>
        </form>
        <div class="dropdown">
            <a href="#" class="profile" id="profileDropdown" style="text-decoration: none;">
                @if (auth()->check() && $user = auth()->user())
                    @if ($user->profile_picture && Storage::exists('public/profile_pictures/' . $user->profile_picture))
                        <img src="{{ asset('storage/profile_pictures/' . $user->profile_picture) }}" alt style="width: 30px;">
                    @else
                        <img src="https://www.shareicon.net/data/256x256/2016/05/26/771188_man_512x512.png" alt="Default Profile Picture" style="width: 30px;">
                    @endif
                @endif
            </a>
            <div class="dropdown-content" id="profileDropdownContent">
                <a href="{{ route('admin.profile') }}" style="text-decoration: none;">Profile</a>
                <a href="{{ route('logout') }}" style="text-decoration: none;">Logout</a>
            </div>
        </div>
    </nav>
</section>

<div class="content">
    @yield('content')
</div>

<script src="{{ asset('js/admin_dashboard.js') }}"></script>
</body>
</html>
