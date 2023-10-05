@if($products)
@extends('site.layouts.main', ['title' => 'All Pages', 'module' => "Pages"])
@section('seo')
<title>{{ $products->seo_title }}</title>
<meta name="description" content="{{ $products->seo_description}}" />
<meta name="keywords" content="{{$products->seo_keywords}}" />

@endsection
@section('content')
    <div class="container-fuild py-5 row products-pages">
        <div class="col-md-6 px-5 align-middle">
            
        </div>
        <div class="col-md-6 px-5 align-middle">
            <nav aria-label="breadcrumb" class="text-end">
                <ol class="breadcrumb float-end">
                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('site.home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="#">products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$products->product}}</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 row px-5 pt-3">
            <div class="col-md-3 bg-white border-rounded" id="sidebar-products">
                <div id="service-details" class="list-group">
                    <a class="list-group-item list-group-item-action action-url" href="#about-product">About Product</a>
                    <a class="list-group-item list-group-item-action action-url" href="#download-info-guidelines">Download Info & Guideline</a>
                    <a class="list-group-item list-group-item-action action-url" href="#industry-notifications">Industry Notification</a>
                </div>
            </div>
            <div class="col-md-9 ps-5 service-info-container float-right" data-bs-spy="scroll" data-bs-target="#service-details" data-bs-smooth-scroll="true" tabindex="0">
                <div>
                    <h2 class="d-inline-block">{{$products->product}}</h2>
                </div>
                <div class="about-section" id="about-service">
                    <div>
                        <img src="{{ $media->path }}" alt="{{ $products->img_alt }}">
                        {!! $products->description !!}
                    </div>
                    <div>
                        {!! $products->description !!}
                    </div>
                </div>
                <div class="guidelines-section" id="download-info-guidelines">
                    <h4>
                        <span style="font-size: calc(1.275rem + .3vw);color:rgb(255, 102, 0);">
                            Download Info & Guidelines
                        </span>
                    </h4>
                    <div>

                    </div>
                </div>
                <div class="notification-section" id="industry-notifications">
                    <h4>
                        <span style="font-size: calc(1.275rem + .3vw);color:rgb(255, 102, 0);">
                            Industry Notification
                        </span>
                    </h4>
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables/datatables.min.css') }}" type="text/css" />
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('assets/admin/plugins/datatables/datatables.min.js')}}"></script>
<script>

</script>
@endsection
@endif