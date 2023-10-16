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
                    <a class="list-group-item list-group-item-action action-url" href="#necessary-certifications">Documents Required</a>
                    <a class="list-group-item list-group-item-action action-url" href="#industry-notifications">Industry Notification</a>
                </div>
            </div>
            <div class="col-md-9 ps-5 product-info-container float-right" data-bs-spy="scroll" data-bs-target="#service-details" data-bs-smooth-scroll="true" tabindex="0">
                <div class="about-section row section" id="about-product">
                    <div class="col-md-4">
                        <img class="product-image" src="{{ $media->path }}" alt="{{ $products->img_alt }}">
                    </div>
                    <div class="col-md-8">
                        <h2 class="orange">{{$products->product}}</h2>
                        <div class="container my-3">
                            <span class="standard-pill">{{$products->standards}}</span>
                        </div>
                        <hr>
                        <div class="container mt-2">
                        @if($services)
                        @foreach($services as $service)
                        <a class="text-center p-2 d-inline-block orange border border-secondary rounded rounded-lg" href="{{ route('site.services.index', $service->slug)}}"><img src="{{ $service->path }}"><br>{{$service->service}}</a>
                        @endforeach
                        @endif
                        </div>
                    </div>
                    <div class="col-md-12">{!! $products->description !!}</div>
                </div>
                <div class="necessary-certifications section" id="necessary-certifications">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        @if($services)
                        @foreach($services as $service)
                        <li class="nav-item" role="presentation">
                          <button class="nav-link @if($loop->first){{"active"}}@endif" id="{{$service->slug}}" data-bs-toggle="pill" data-bs-target="#{{$service->slug}}-pill" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><img src="{{ $service->path }}"><br>{{$service->service}}</button>
                        </li>
                        @endforeach
                        @endif
                      </ul>
                      <div class="tab-content" id="pills-tabContent">
                        @if($services)
                        @foreach($services as $service)
                        <div class="tab-pane fade show @if($loop->first){{"active"}}@endif" id="{{$service->slug}}-pill" role="tabpanel" aria-labelledby="pills-home-tab">
                            <h3>{{$services->service}}</h3>
                            {!! $services->description !!}
                            <div>

                            </div>
                        </div>
                        @endforeach
                        @endif
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