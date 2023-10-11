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
    <div class="section-2 text-center p-5 my-3 bg-grey-light text-grey">
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
    <div class="section-3 row container-fluid px-5 text-center my-5">
        <h2>Stay updated with latest trends</h2>
        @if($blogs)
        @foreach($blogs as $blog)
        <div class="col-md-4 p-3">
        <div class="card blog-tiles">
            <img src="{{ $blog->path }}" class="card-img-top" alt="{{ $blog->img_alt }}">
            <div class="card-body">
                <h5 class="card-title">{{ $blog->name}}</h5>
                {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                <a href="{{ url('blogs/'.$blog->slug) }}" class="btn btn-primary">Read More</a>
            </div>
            </div>
        </div>
        @endforeach
        @endif
        <a href="{{ url('blogs/') }}" class="btn btn-primary text-center my-2">Read More</a>
    </div>
    <div class="section-3 row container-fluid px-5 text-center">
        <h2>What clients say?</h2>
        <div class="container-fluid owl-carousel home-testimonial" id="owl-carousel">
            @if($testimonial)
            @foreach($testimonial as $test)
                <div>
                    <h3 class="card-title text-center">{{ $test->content }}</h3>
                </div>
            @endforeach
            @endif
        </div>
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