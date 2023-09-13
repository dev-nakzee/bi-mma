<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="{{ asset('assets/site/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="{{ asset('assets/admin/css/fontawesome/css/all.css')}}" rel="stylesheet">
    @yield('styles')
    <link href="{{ asset('assets/site/css/style.css')}}" rel="stylesheet">
  </head>
  <body>
      <div class="d-flex">
        <div>
          <img src="{{ asset('assets/site/images/logomma.png')}}"/>
        </div>
      </div>
      <!-- Menu -->
      <nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-orange">
          <div class="container-fluid">
              <!-- Nav Toggle Button -->
              <button class="navbar-toggler my-2" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" 
                aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              </button>
              <!-- Nav Links -->
              <div class="collapse navbar-collapse lh-lg" id="main_nav">
                <ul class="navbar-nav p-3 p-md-0">
                    <li class="nav-item"> <a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">About us</a>
                      <!-- Dropdown -->
                      <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">About Us </a></li>
                          <li><a class="dropdown-item" href="#">Login </a></li>
                      </ul>
                    </li>
                    <!-- Mega Menu -->
                    <li class="nav-item dropdown ktm-mega-menu">
                      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Services</a>
                      <!-- Mega Menu -->
                      <div class="dropdown-menu mega-menu p-3">
                          <span>
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                          </span>
                      </div>
                    </li>
                    
                    <li class="nav-item"> <a class="nav-link" href="#">Contact</a></li>
                </ul>
              </div>
              <div class="navbar-nav">
                <button class="btn btn-outline-dark btn-sm ms-auto me-2 mb-1 float-sm-end"><i class="fa fa-user-plus"></i> <span class="d-none d-inline d-lg-inline">Register</span></button>
                <button class="btn btn-outline-dark btn-sm me-2 float-sm-end"><i class="fa fa-user"></i> <span class="d-none d-inline d-lg-inline">Login<i></button>
              </div>
          </div>
      </nav>
    <!-- Ends -->

    @yield('content')
    <script src="{{ asset('assets/site/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/bootstrap.bundle.min.js')}}" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/site/js/custom.min.js') }}"></script>
    @yield('scripts')
  </body>
</html>