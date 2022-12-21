<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Crime Report</title>
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
    <script src="{{ asset('assets/js/alpinejs.js') }}" defer></script>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<style>
    .logo-hr {
        width: 100%;
        height: 5px;
        margin: 0;
        margin: 5px 0;
        border: none;
        background-color: #eee;
    }

    .nav-link {
        color: #eee;
    }

    .nav-link:hover {
        color: #bbb;
    }

    .background-img {
        background: linear-gradient(to left, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)), url('assets/images/bg4.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        object-fit: cover;
    }
    .a-message{
        position: fixed;
        max-width: 400px;
        /* margin: 0 auto; */
        top: 30px;
        left: 50%;
        right: -50%;
        transform: translate(-50%, -50%);
        z-index: 100;
    }

    /* .tab-content {
        backdrop-filter: blur(10px);
    } */
</style>

<body>
    <!-- Full Website Start-->
    <!-- Header Start -->
    <header>
        <div class="collapse bg-black" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">About</h4>
                        <p class="text-muted">This Online Crime Reporting Website allows citizens to report crime and
                            emergencies of all sorts to the Ghana police for a quick response and to assist the police
                            in their investigations.</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        @auth
                        <h4 class="text-white">Welcome, <span class="text-warning">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span></h4>
                        <ul class="list-unstyled d-inline-flex">
                            @if (auth()->user()->role == '1')
                                <li><a href="/admin/dashboard" class="btn btn-outline-primary m-2"><i class="fas fa-edit mx-1"></i> Dashboard</a></li>
                                @else
                                <li><a href="/news/manage" class="btn btn-outline-primary m-2"><i class="fas fa-edit mx-1"></i> Manage</a></li>
                            @endif
                            <li><a href="#" class="text-primary m-2">Feedback</a></li>
                            <li>
                                <form action="/logout" method="POST" class="form">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger m-2"><i class="fas fa-arrow-right"></i> Logout</button>
                                </form>
                            </li>
                        </ul>
                        @else
                        <h4 class="text-white">For Account Use Only!</h4>
                        <ul class="list-unstyled d-inline-flex">
                            <li><a href="/login" class="text-success m-2">Login</a></li>
                            <li><a href="/register" class="text-warning m-2">Register</a></li>
                            <li><a href="#" class="text-primary m-2">Feedback</a></li>
                        </ul>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="/" class="navbar-brand d-flex flex-column align-items-center">
                    <img src="{{ asset('assets/images/logo/gps_logo_white.png') }}" width="200px" alt="" class="img-fluid">
                    <hr class="logo-hr">
                    <strong><span class="text-warning">Crime</span> & <span
                            class="text-danger">Emergency</span></strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>

    <x-flash-message />
    
    <!-- Header End -->

  {{-- @yield('content') --}}
  {{ $slot }}

    <footer class="text-muted py-5 mt-3 bg-dark">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">Back to top</a>
            </p>
            
        </div><br><br>
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-2 my-2">
                    <h5>Crimes</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Missing Pserson</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Theft</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Fraud</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Rape</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Hijack</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">etc.</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Emergency</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Traffic</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Accident</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                    </ul>
                </div>

                <div class="col-md-5 offset-md-1 mb-3">
                    <form>
                        <h5>Subscribe to our newsletter</h5>
                        <p>Monthly access to what's new from us.</p>
                        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                            <label for="newsletter1" class="visually-hidden">Email address</label>
                            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                            <button class="btn btn-primary" type="button">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="py-4 my-4 border-top">
                <p class="text-center">&copy; <span class="year"></span>, Ghana Police Service &trade; All rights reserved.</p>
            </div>
        </div>
    </footer>
    <!-- Full Website End -->

    <script src="{{ asset('assets/js/all.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    {{-- <script src="{{ asset('assets2/js/script.js') }}"></script> --}}
</body>

</html>

