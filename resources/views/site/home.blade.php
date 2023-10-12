@extends('site.layouts.main', ['title' => 'All Pages', 'module' => "Pages"])
@section('content')
    <!-- Container element -->
    <div class="container-fluid home-banner p-5">
        <h1 class="">Launch Your Product In India?</h1>
        <p class="mb-5">Get your Product Approval to Sell it in India Fast & Economical way</p>
        <ul class="contain-fluid mt-5 pt-5 ps-0 service-icon">
            @if($service)
            @foreach($service as $s)
            <li>
                <img src="{{ $s->path }}" alt="{{ $s->img_alt }}">
            </li>
            @endforeach
            @endif
        </ul>
    </div>
    <div class="section-2 text-center p-5 mt-3 text-grey shadow p-3 bg-white rounded">
        <h2>Prominent Product Approvals<br>For Indian Market</h2>
        <div class="container-fluid row py-5 service-links">
            @if($service)
            @foreach($service as $s)
            <div class="col-md-3 p-3">
                <a href="{{ url('services/'.$s->slug) }}">
                    <img src="{{ $s->path}}" alt="{{ $s->img_alt }}">
                    <p>{{ $s->service }}</p>
                </a>
            </div>
            @endforeach
            @endif
        </div>
    </div>
    <div class="section-2 text-center p-5 mb-3 bg-orange text-grey">
        <h2>Product List Which Needs Approval Before the Launch</h2>
        <p>
There are many products that need approval or certification before they can enter in the
market for various compliance service categories like BIS, BEE, WPC-ETA, TEC and ISI. We&#39;ve
compiled a comprehensive list of these products so that you can easily check the required
certification for your products and make sure that they are compliant for a successful
launch.
        </p>
    </div>
    <div class="section-3 row container-fluid px-5 text-center mt-4">
        <h2>Latest Industry Notifications</h2>
        <p>Staying updated with the latest notifications is essential to maintain the eligibility of your
            products with the required certifications and approvals. You can get the latest notifications
            for all the compliance services on our website to ensure that your products meet regulatory
            requirements. Our platform provides you with real-time notifications, so you&#39;ll never miss
            important updates.</p>
            <div id="notices" class="carousel slide p-3 bg-secondary" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item px-5 active">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id ligula porta, mollis tortor id, volutpat diam. Praesent metus eros, egestas vitae feugiat at, bibendum et erat.</p>
                  </div>
                  <div class="carousel-item px-5">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id ligula porta, mollis tortor id, volutpat diam. Praesent metus eros, egestas vitae feugiat at, bibendum et erat.</p>
                  </div>
                  <div class="carousel-item px-5">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id ligula porta, mollis tortor id, volutpat diam. Praesent metus eros, egestas vitae feugiat at, bibendum et erat.</p>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#notices" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#notices" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>          
              </div>
        <a href="{{ route('site.clients') }}" class="btn btn-secondary bg-orange btn-sm col-md-3 text-center my-2 mx-auto">Explore older</a>
    </div>
    <div class="section-3 row container-fluid px-5 text-center my-5">
        <h2>Stay updated with latest trends</h2>
        <p>Our blogs are your one-stop destination for everything you need to know. Whether you
            want information on the product certification process, the required documents or the
            validity of any compliance service certificate, our informative blogs have covered you to
            keep you updated with the industry trends.</p>
        @if($blogs)
        @foreach($blogs as $blog)
        <div class="col-md-4 p-3">
        <div class="card blog-tiles border border-secondary">
            <img src="{{ $blog->path }}" class="card-img-top" alt="{{ $blog->img_alt }}">
            <div class="card-body">
                <h5 class="card-title">{{ $blog->name}}</h5>
                {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                <a href="{{ route('site.blogs.single', [$blog->category,$blog->slug]) }}" class="link">Read More</a>
            </div>
            </div>
        </div>
        @endforeach
        @endif
        <a href="{{ route('site.blogs') }}" class="btn btn-secondary bg-orange btn-sm col-md-3 text-center my-2 mx-auto">All blogs</a>
    </div>
    <div class="section-3 row container-fluid px-5 text-center">
        <h2>What clients say?</h2>
        <p>Our proven track record demonstrates our swift and efficient product certification
            assistance, with satisfied clients sharing positive testimonials on our website. Our success
            stories underscore our team&#39;s dedication and expertise in compliance management,
            highlighting the positive outcomes we achieve for our valued clients and emphasizing our
            commitment to industry excellence.</p>

        @if($testimonials)
        @foreach($testimonials as $t)
        <div class="col-md-3 p-2">
            <div class="client-testimonials border border-primary rounded p-3 text-center">
            <img src="{{ $t->path }}" class="d-block rounded-circle mb-3 mx-auto" alt="{{ $t->client.'-testimonial' }}">
            <h3>{{ $t->client }}</h3>
            <h6>{{ $t->position }}</h6>
            <p>{{ $t->description }}</p>
            </div>
        </div>
        @endforeach
        @endif
        <a href="{{ route('site.clients') }}" class="btn btn-secondary bg-orange btn-sm col-md-3 text-center my-2 mx-auto">Read More</a>
    </div>
@endsection
@section('styles')
<style>
    .home-banner {
      /* The image used */
      background-image: url({{ asset('assets/site/images/bg2.png')}});
      /* Set a specific height */
      min-height: 500px;
      /* Create the parallax scrolling effect */
      /* background-attachment: fixed; */
      background-position: top right;
      background-repeat: no-repeat;
      background-size: contain;
    }
    @media only screen and (max-device-width: 960px) {
        .home-banner {
            background-attachment: scroll;
        }
    }
    .service-icon li::before {
        content: url({{ asset('assets/site/images/services/check-mark-50.png')}}) !important;
        position: absolute;
        z-index: 1;
        width: 70px;
        overflow: visible !important;
        left: 40px;
        top: 44px;
        height: 70px;
    
    }
    </style>
    <link rel="stylesheet" href="{{asset('assets/site/owl-slider/assets/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/site/owl-slider/assets/owl.theme.default.min.css')}}">
@endsection
@section('scripts')
<script src="{{asset('assets/site/owl-slider/owl.carousel.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $("#owl-carousel").owlCarousel({
            center: true,
            items:2,
            loop:false,
            margin:10,
            responsive:{
                600:{
                    items:4
                }
            }
        });
    });
</script>
@endsection