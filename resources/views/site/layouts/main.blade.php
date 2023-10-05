<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    @yield('seo')
    <meta content="index, follow" name="robots"/>
    <meta name="author" content="Rajesh Kumar">
    <meta name="publisher" content="MakeMyApproval"/>
    
    {{-- <meta name="Classification" content="Business">
    <meta name="coverage" content="Worldwide">
    <meta name="distribution" content="Global">
    <meta name="rating" content="General">
    
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    
    <meta property="og:site_name" content="MakeMyApproval" />

    <meta property="fb:page_id" content="1590316941238982"/>
    <meta property="og:author" content="MakeMyApproval" />
    <meta property="og:image" content="{{ asset('assets/site/images/logomma.png')}}" alt = "MakeMyApproval" />
    <meta property="og:street-address" content="110, Sharma Complex A-2, Guru Nanak Pura">
    <meta property="og:locality" content="Laxmi Nagar">
    <meta property="og:region" content="Delhi">
    <meta property="og:postal-code" content="110092">
    <meta property="og:country-name" content="India">
    <meta property="og:email" content="info@bl-india.com">
    <meta property="og:phonenumber" content="+91-8130615678">
    <meta property="og:brand" content="MakeMyApproval">
    
    <meta name="twitter:card" content="summary" />
    
    <meta name="twitter:image" content="{{ asset('assets/site/images/logomma.png')}}" />

    <meta name="twitter:site" content="@Brand_Liaison" /> --}}

    <link href="{{ asset('assets/site/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="{{ asset('assets/admin/css/fontawesome/css/all.css')}}" rel="stylesheet">
    @yield('styles')
    <link href="{{ asset('assets/site/css/style.css')}}" rel="stylesheet">
  </head>
  <body>
      <div class="container-fuild">
          <div class="col-12 bg-dark p-1 top-bar">
            <a class="text-light ms-3" href="#"><i class="fa-light fa-globe"></i> Click for global enquiries</a>
            <a class="text-light me-2 float-end" href="tel:123-456-7890"><i class="fa fa-phone"></i> 123-456-7890</a>
            <a class="text-light me-3 float-end" href = "mailto:abc@example.com"><i class="fa fa-envelope"></i> abc@example.com</a>
          </div>
          <div class="col-12 row bg-light px-2">
            <div class="col-3"> 
              <img class="site-logo p-2 ps-3" src="{{ asset('assets/site/images/logomma.png')}}"/>
            </div>
            <div class="col-9 pe-0">
              <img class="header-img p-2 float-end d-none d-lg-inline" src="{{ asset('assets/site/images/raclogo1.png')}}"/>
              <img class="header-img p-2 float-end d-none d-lg-inline" src="{{ asset('assets/site/images/aajadi.jpg')}}"/>
            </div>
          </div>
      </div>
      <!-- Menu -->
      <nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-orange">
          <div class="container-fluid">
              <div class="navbar-brand">
                <img src="{{ asset('assets/site/images/MakeMyApproval-logo-black.png') }}" id="site-logo-sticky" class="img-responsive site-logo-sticky d-none"/>
              </div>
              <!-- Nav Toggle Button -->
              <button class="navbar-toggler my-2" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" 
                aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              </button>
              <!-- Nav Links -->
              <div class="collapse navbar-collapse lh-lg" id="main_nav">
                <ul class="navbar-nav p-3 p-md-0">
                    <li class="nav-item"> <a class="nav-link active" href="{{ route('site.home')}}">Home</a></li>
                    <!-- Mega Menu -->
                    <li class="nav-item dropdown ktm-mega-menu">
                      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Services</a>
                      <!-- Mega Menu -->
                      <div class="dropdown-menu mega-menu p-3">
                          <div class="container-fluid row px-5">
                            @if($services)
                            @foreach($services as $service)
                            <div class="col-md-3 service-nav">
                              <a href="{{ route('site.services.index',$service->slug)}}" class="card">
                                <div class="card-body">
                                  <img src="{{ url($service->path)}}">
                                  <h5 class="card-title">{{ $service->service }}</h5>
                                </div>
                              </a>
                            </div>
                            @endforeach
                            @endif
                          </div>
                      </div>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="#">Contact</a></li>
                </ul>
              </div>
              <div class="d-flex justify-content-end">
                <div class="btn-group">
                  <button class="btn btn-outline-dark btn-sm me-2 mb-1 float-end" type="button" id="navbarRegisterBtn" data-bs-toggle="dropdown" data-bs-display="static" data-bs-auto-close="inside" aria-expanded="false">
                    <i class="fa fa-user-plus"></i> <span class="">Register</span>
                  </button>
                  <form class="dropdown-menu dropdown-menu-start p-4" aria-labelledby="navbarRegisterBtn">
                    <div class="mb-3">
                      <label for="exampleDropdownFormEmail2" class="form-label">Email address</label>
                      <input type="email" class="form-control" id="exampleDropdownFormEmail2" placeholder="email@example.com">
                    </div>
                    <div class="mb-3">
                      <label for="exampleDropdownFormPassword2" class="form-label">Password</label>
                      <input type="password" class="form-control" id="exampleDropdownFormPassword2" placeholder="Password">
                    </div>
                    <div class="mb-3">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="dropdownCheck2">
                        <label class="form-check-label" for="dropdownCheck2">
                          Remember me
                        </label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                  </form>
                </div>
                <a href="{{ route('register') }}" class="btn btn-outline-dark btn-sm me-2 mb-1 float-end"><i class="fa fa-user-plus"></i> Register</a>                 
                <a href="{{ route('login') }}" class="btn btn-outline-dark btn-sm me-2 mb-1 float-end"><i class="fa fa-user"></i> <span class="">Login<i></a>
              </div>
          </div>
      </nav>

    <!-- Ends -->

    @yield('content')

    <div class="container-fluid footer px-4">
      <div class="row pt-5 pb-5 ">
        <div class="col-md-3">
          <h5>About Us</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id ligula porta, mollis tortor id, volutpat diam. Praesent metus eros, egestas vitae feugiat at, bibendum et erat.</p>
          <ul class="nav flex-column">
            <li class="nav-item"><i class="fa fa-map-marker-alt"></i> <a href="geo:124.028582,-29.201930" target="_blank">123 Street, New York, NY 10016</a></li>
            <li class="nav-item"><i class="fa fa-phone"></i> <a href="tel:123-456-7890">123-456-7890</a></li>
            <li class="nav-item"><i class="fa fa-envelope"></i> <a href = "mailto:abc@example.com">abc@example.com</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5>Important Links</h5>
          <ul class="nav flex-column">
            <li class="nav-item"><a href="{{ url('/')}}">Home</a></li>
            {{-- <li class="nav-item"><a href="#">About us</a></li>
            <li class="nav-item"><a href="#">Careers</a></li>
            <li class="nav-item"><a href="#">News &amp; Blogs</a></li>
            <li class="nav-item"><a href="#">Terms &amp; conditions</a></li>
            <li class="nav-item"><a href="#">Privacy Policy</a></li> --}}
            <li class="nav-item"><a href="{{ url('/contact')}}">Contact us</a></li>
          </ul>
          <h5 class="mt-4">Partner with us</h5>
          <ul class="nav flex-column">
            {{-- <li class="nav-item"><a href="#">Become Service Partner</a></li>
            <li class="nav-item"><a href="#">Become Channel Partner</a></li> --}}
          </ul>
        </div>
        <div class="col-md-3">
          <h5>Services</h5>
          <ul class="nav flex-column">
            @foreach ($services as $s)
              <li> 
                <a href="{{ route('site.services.index', $s->slug)}}">
                {{ $s->service }}
                </a>
              </li>
            @endforeach
          </ul>
          <h5 class="mt-4">Industries</h5>
          <ul class="nav flex-column">
            <li class="nav-item"><a href="#">Mandatory Product List</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5>Recent Notifications</h5>
          <div id="carouselExampleControls" class="carousel slide p-3 bg-orange" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id ligula porta, mollis tortor id, volutpat diam. Praesent metus eros, egestas vitae feugiat at, bibendum et erat.</p>
              </div>
              <div class="carousel-item">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id ligula porta, mollis tortor id, volutpat diam. Praesent metus eros, egestas vitae feugiat at, bibendum et erat.</p>
              </div>
              <div class="carousel-item">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id ligula porta, mollis tortor id, volutpat diam. Praesent metus eros, egestas vitae feugiat at, bibendum et erat.</p>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>          
          </div>
          <h5 class="mt-4">Connect with us</h5>
          <ul class="nav">
            <li class="nav-item"><a class="nav-link pb-0" href="#"><i class="fa-brands fa-facebook fa-lg"></i></a></li>
            <li class="nav-item"><a class="nav-link pb-0" href="#"><i class="fa-brands fa-linkedin fa-lg"></i></a></li>
            <li class="nav-item"><a class="nav-link pb-0" href="#"><i class="fa-brands fa-twitter fa-lg"></i></a></li>
            <li class="nav-item"><a class="nav-link pb-0" href="#"><i class="fa-brands fa-instagram fa-lg"></i></a></li>
            <li class="nav-item"><a class="nav-link pb-0" href="#"><i class="fa-brands fa-youtube fa-lg"></i></a></li>
            <li class="nav-item"><a class="nav-link pb-0" href="#"><i class="fa-brands fa-pinterest fa-lg"></i></a></li>
            <li class="nav-item"><a class="nav-link pb-0" href="#"><i class="fa-brands fa-google fa-lg"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="col-12 text-center pb-2" style="font: 12px arial;"><p>Copyright &copy; {{ date('Y');}} {{ env('COMPANY_NAME')}}. All Rights Reserved.</p></div>
    </div>
    <script src="{{ asset('assets/site/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/bootstrap.bundle.min.js')}}" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/site/js/custom.min.js') }}"></script>
    @yield('scripts')
  </body>
</html>