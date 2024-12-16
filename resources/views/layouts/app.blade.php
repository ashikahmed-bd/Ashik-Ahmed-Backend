<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Personal Finance Management</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon.png')}}">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/remix-icon/remixicon.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/simplemde/simplemde.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/toastify.min.css')}}">
</head>

<body class="dashboard">
<div id="preloader" style="display: none;">
    <i>.</i>
    <i>.</i>
    <i>.</i>
</div>
<div id="main-wrapper">
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="header-content">
                        <div class="header-left">
                            <div class="brand-logo">
                                <a href="{{route('home')}}" class="mini-logo">
                                    <img src="{{asset('images/logo.png')}}" alt="" width="40">
                                </a>
                            </div>
                            <div class="search">
                                <form action="#">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search Here">
                                        <span class="input-group-text"><i class="fi fi-br-search"></i></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="header-right">
                            <div class="dark-light-toggle" onclick="themeToggle()">
                                <span class="dark"><i class="fi fi-rr-eclipse-alt"></i></span>
                                <span class="light"><i class="fi fi-rr-eclipse-alt"></i></span>
                            </div>
                            <div class="nav-item dropdown notification">
                                <div data-bs-toggle="dropdown">
                                    <div class="notify-bell icon-menu">
                                        <span><i class="fi fi-rs-bells"></i></span>
                                    </div>
                                </div>
                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-end">
                                    <h4>Recent Notification</h4>
                                    <div class="lists">
                                        <a class="" href="index-2.html#">
                                            <div class="d-flex align-items-center">
                                                <span class="me-3 icon success"><i class="fi fi-bs-check"></i></span>
                                                <div>
                                                    <p>Account created successfully</p>
                                                    <span>2024-11-04 12:00:23</span>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="" href="index-2.html#">
                                            <div class="d-flex align-items-center">
                                                <span class="me-3 icon fail"><i class="fi fi-sr-cross-small"></i></span>
                                                <div>
                                                    <p>2FA verification failed</p>
                                                    <span>2024-11-04 12:00:23</span>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="" href="index-2.html#">
                                            <div class="d-flex align-items-center">
                                                <span class="me-3 icon success"><i class="fi fi-bs-check"></i></span>
                                                <div>
                                                    <p>Device confirmation completed</p>
                                                    <span>2024-11-04 12:00:23</span>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="" href="index-2.html#">
                                            <div class="d-flex align-items-center">
                                                <span class="me-3 icon pending"><i class="fi fi-rr-triangle-warning"></i></span>
                                                <div>
                                                    <p>Phone verification pending</p>
                                                    <span>2024-11-04 12:00:23</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="more">
                                        <a href="notifications.html">More<i class="fi fi-bs-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown profile_log dropdown">
                                <div data-toggle="dropdown">
                                    <div class="user icon-menu active">
                                        <img class="rounded-full" src="{{asset_url(auth()->user()->photo)}}" alt="{{auth()->user()->name}}" width="40">
                                    </div>
                                </div>
                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu dropdown-menu-end">
                                    <div class="user-email">
                                        <div class="user">
                                            <div class="thumb">
                                                <img class="rounded-full" src="{{asset_url(auth()->user()->photo)}}" alt="">
                                            </div>
                                            <div class="user-info">
                                                <h5>{{auth()->user()->name}}</h5>
                                                <span>{{auth()->user()->email}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="dropdown-item" href="profile.html">
                                        <span><i class="fi fi-rr-user"></i></span>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="wallets.html">
                                        <span><i class="fi fi-rr-wallet"></i></span>
                                        Wallets
                                    </a>
                                    <a class="dropdown-item" href="settings.html">
                                        <span><i class="fi fi-rr-settings"></i></span>
                                        Settings
                                    </a>
                                    <a href="{{route('logout')}}" class="dropdown-item logout">
                                        <i class="fi fi-bs-sign-out-alt"></i>
                                        Logout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <aside class="sidebar">
        <div class="brand-logo">
            <a href="{{route('home')}}" class="full-logo">
                <img src="{{asset('images/logo.png')}}" alt="" width="30">
            </a>
        </div>
        <div class="menu active">
            <ul class="show">
                <li class="active">
                    <a href="{{route('home')}}" class="active">
                        <i class="ri-home-5-line"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('post.all')}}">
                        <i class="ri-wallet-line"></i>
                        <span class="nav-text">Posts</span>
                    </a>
                </li>
                <li><a href="bill.html">
                        <span><i class="ri-secure-payment-line"></i></span>
                        <span class="nav-text">Payment</span>
                    </a>
                </li>
                <li><a href="invoice.html">
                        <span><i class="ri-file-copy-2-line"></i></span>
                        <span class="nav-text">Invoice</span>
                    </a>
                </li>
                <li><a href="settings-profile.html">
                        <span><i class="ri-settings-3-line"></i></span>
                        <span class="nav-text">Settings</span>
                    </a>
                </li>
                <li class="logout">
                    <a href="{{route('logout')}}">
                        <i class="ri-logout-circle-line"></i>
                        <span class="nav-text">Sign out</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>


    <div class="content-body">
        @yield('content')
    </div>

</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/toastify-js.js')}}"></script>
<script src="{{asset('vendor/simplemde/simplemde.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script>
    @if(Session::has('success'))
    Toastify({
        text: "{{ session('success') }}",
        duration: 3000
    }).showToast();
    @endif

    @if(Session::has('error'))
    Toastify({
        text: "{{ session('error') }}",
        duration: 3000
    }).showToast();
    @endif

    @if($errors->any())
    @foreach($errors->all() as $error)
    Toastify({
        text: "{{ $error }}",
        duration: 3000
    }).showToast();
    @endforeach
    @endif
</script>
</body>
</html>
