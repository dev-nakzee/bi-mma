@extends('site.layouts.main', ['title' => 'All Pages', 'module' => "Pages"])
@section('content')
    <!-- Container element -->
    <div class="container-fluid home-banner p-5">
        <h1 class="">Launch Your Product In India?</h1>
        <p class="mb-5">Get your Product Approval to Sell it in India Fast & Economical way</p>
        <ul class="contain-fluid mt-5 pt-5 ps-0 service-icon">
            <li>
                <img src="{{ asset('assets/site/images/services/serviceicon1.png')}}">
            </li>
            <li>
                <img src="{{ asset('assets/site/images/services/serviceicon2.png')}}">
            </li>
            <li>
                <img src="{{ asset('assets/site/images/services/serviceicon3.png')}}">
            </li>
            <li>
                <img src="{{ asset('assets/site/images/services/serviceicon4.png')}}">
            </li>
            <li>
                <img src="{{ asset('assets/site/images/services/serviceicon5.png')}}">
            </li>
            <li>
                <img src="{{ asset('assets/site/images/services/serviceicon6.png')}}">
            </li>
        </ul>
    </div>
    <div class="section-2 text-center p-5 my-3 bg-grey-light text-grey">
        <h1>Prominent Product Approvals<br>For Indian Market</h1>
        <div class="container-fluid row py-5 service-links">
            <div class="col-md-3 p-3">
                <a href="#">
                    <img src="{{ asset('assets/site/images/services/serviceicon1.png')}}">
                    <p>BIS/ CRS Registration</p>
                </a>
            </div>
            <div class="col-md-3 p-3">
                <a href="#">
                    <img src="{{ asset('assets/site/images/services/serviceicon4.png')}}">
                    <p>BEE Registration</p>
                </a>
            </div>
            <div class="col-md-3 p-3">
                <a href="#">
                    <img src="{{ asset('assets/site/images/services/serviceicon3.png')}}">
                    <p>EPRA for Battery Waste</p>
                </a>
            </div>
            <div class="col-md-3 p-3">
                <a href="#">
                    <img src="{{ asset('assets/site/images/services/serviceicon3.png')}}">
                    <p>EPRA for E-Waste</p>
                </a>
            </div>
            <div class="col-md-3 p-3">
                <a href="#">
                    <img src="{{ asset('assets/site/images/services/serviceicon5.png')}}">
                    <p>WPC-ETA Approval</p>
                </a>
            </div>
            <div class="col-md-3 p-3">
                <a href="#">
                    <img src="{{ asset('assets/site/images/services/serviceicon3.png')}}">
                    <p>EPR Authorization for P-Waste Products</p>
                </a>
            </div>
            <div class="col-md-3 p-3">
                <a href="#">
                    <img src="{{ asset('assets/site/images/services/serviceicon6.png')}}">
                    <p>ISI / BIS Certification</p>
                </a>
            </div>
            <div class="col-md-3 p-3">
                <a href="#">
                    <img src="{{ asset('assets/site/images/services/serviceicon2.png')}}">
                    <p>TEC Certification</p>
                </a>
            </div>
        </div>
    </div>
    <div class="section-3">
        <div class="container-fluid row">
            @if($blogs)
            @foreach($blogs as $blog)
            <div class="col-md-4 p-3">
                <div class="card">
                    @if($media)
                    @foreach($media as $m)
                        @if($m->id === $blog->image)
                        <img src="{{ asset($media->path)}}" class="card-img-top" alt="{{ asset($blog->img_alt)}}">
                        @endif
                    @endforeach
                    @endif
                    <h3 class="card-title text-center">{{ $blog->name }}</h3>
                </div>
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
@endsection
@section('scripts')

@endsection