@if($services)
@extends('site.layouts.main', ['title' => 'All Pages', 'module' => "Pages"])
@section('seo')
<title>{{ $services->seotitle }}</title>
<meta name="description" content="{{ $services->seodescription}}" />
<meta name="keywords" content="{{$services->seokeywords}}" />

{{-- <meta property="og:title" content="{{ $services->seotitle }}"/>
<meta property="og:description" content="{{ $services->seodescription}}"/>

<meta property="og:url" content="https://www.bl-india.com/holiday-list.php" />

<meta name="twitter:title" content="{{ $services->seotitle }}" />
<meta name="twitter:description" content="{{ $services->seodescription}}" />

<meta name="twitter:url" content="https://www.bl-india.com/holiday-list.php" /> --}}

@endsection
@section('content')
    <div class="container-fuild py-5 row services-pages">
        <div class="col-md-6 px-5 align-middle">
            <img class="img-fluid img-thumbnail mx-auto d-inline" src="{{ $services->path }}">
            <h2 class="d-inline-block">{{$services->service}}</h2>
        </div>
        <div class="col-md-6 px-5 align-middle">
            <nav aria-label="breadcrumb" class="text-end">
                <ol class="breadcrumb float-end">
                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('site.home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="#">Services</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$services->service}}</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 row px-5 pt-3">
            <div class="col-md-3 bg-white border-rounded" id="sidebar-services">
                <p class="text-center fs-4"> {{ $services->service }}</p>
                <div id="service-details" class="list-group">
                    <a class="list-group-item list-group-item-action action-url" href="#about-service">About Service</a>
                    <a class="list-group-item list-group-item-action action-url" href="#mandatory-product-list">Mandatory Product List</a>
                    <a class="list-group-item list-group-item-action action-url" href="#required-documents">Required Documents</a>
                    <a class="list-group-item list-group-item-action action-url" href="#standard-costing-timeline">Standard Costing and Timeline</a>
                    <a class="list-group-item list-group-item-action action-url" href="#registration-process">Registration Process</a>
                    <a class="list-group-item list-group-item-action action-url" href="#download-info-guidelines">Download Info & Guideline</a>
                    <a class="list-group-item list-group-item-action action-url" href="#industry-notifications">Industry Notification</a>
                    <a class="list-group-item list-group-item-action action-url" href="#faqs">FAQ</a>
                </div>
            </div>
            <div class="col-md-9 ps-5 service-info-container float-right" data-bs-spy="scroll" data-bs-target="#service-details" data-bs-smooth-scroll="true" tabindex="0">
                <div class="about-section" id="about-service">
                    <div>
                        {!! $services->about !!}
                    </div>
                </div>
                <div class="mandatory-list-section" id="mandatory-product-list">
                    <h4>
                        <span style="font-size: calc(1.275rem + .3vw);color:rgb(255, 102, 0);">
                            Mandatory Product List
                        </span>
                    </h4>
                    <div>
                        @if($products)
                        @foreach($products as $product)
                        {{$product->product}}
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="documents-section" id="required-documents">
                    <div>
                        {!! $services->documents !!}
                    </div>
                </div>
                <div class="costing-timeline-section" id="standard-costing-timeline">
                    <div>
                        {!! $services->stdcosttime!!}
                    </div>
                </div>
                <div class="process-section" id="registration-process">
                    <div>
                        {!! $services->process!!}
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
                <div class="faq-section" id="faqs">
                    <h4>
                        <span style="font-size: calc(1.275rem + .3vw);color:rgb(255, 102, 0);">
                            FAQ
                        </span>
                    </h4>
                    <div class="accordion accordion-flush">
                        @php $i = 0; @endphp
                        @foreach(json_decode($services->faq, true) as $que=>$ans)
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-{{ $i }}" aria-expanded="false" aria-controls="flush-collapseOne">
                                {{ $que }}
                            </button>
                          </h2>
                          <div id="faq-{{ $i }}" class="accordion-collapse collapse" data-bs-parent="#faqs">
                            <div class="accordion-body">{{ $ans }}</div>
                          </div>
                        </div>
                        @php $i++; @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('styles')
<style> 

</style>
@endsection
@section('scripts')
<script>
    $('.action-url').on('click', function(e) {
        var href = $(this).attr('href');
        var link = $(this).html();
        var slug = '{{ $services->slug }}';
        link = link.toLowerCase();
        link = link.replaceAll(' ', '-');
        title = '{{ $services->seotitle }}';
        var newUrl = '/services/'+slug+'#'+link;
        if(link === 'about-service') {
            var newUrl = '/services/'+slug;
        }
        history.pushState({}, title, newUrl);
    });
    $(document).on('scroll', function(){
        console.log(document.documentElement.scrollTop);
        
        if (document.documentElement.scrollTop > 150) {
            $('#sidebar-services').addClass('sidebar-fixed');
            $('#sidebar-cover').removeClass('d-none');
        } else {
            $('#sidebar-services').removeClass('sidebar-fixed');
            $('#sidebar-cover').addClass('d-none');
        }
    });
    
</script>
@endsection
@endif