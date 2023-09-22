@if($services)
@extends('site.layouts.main', ['title' => 'All Pages', 'module' => "Pages"])
@section('seo')
<title>{{ $services->seotitle }}</title>
<meta name="description" content="{{ $services->seodescription}}" />
<meta name="keywords" content="{{$services->seokeywords}}" />
@endsection
@section('content')

    <div class="container-fuild p-5 row">
        <div class="col-md-12">
            <h2>{{$services->service}}</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('site.home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="">Services</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$services->service}}</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 row">
            <div class="col-md-3">
                <div id="list-example" class="list-group">
                    <a class="list-group-item list-group-item-action" href="#aboutSection">About Service</a>
                    <a class="list-group-item list-group-item-action" href="#mandatoryListSection">Mandatory Product List</a>
                    <a class="list-group-item list-group-item-action" href="#documentsSection">Required Documents</a>
                    <a class="list-group-item list-group-item-action" href="#costingTimelineSection">Standard Costing and Timeline</a>
                    <a class="list-group-item list-group-item-action" href="#processSection">Registration Process</a>
                    <a class="list-group-item list-group-item-action" href="#guidelineSection">Download Info & Guideline</a>
                    <a class="list-group-item list-group-item-action" href="#notificationSection">Industry Notification</a>
                    <a class="list-group-item list-group-item-action" href="#faqSection">FAQ</a>
                </div>
            </div>
            <div class="col-md-9 service-info-container" data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" tabindex="0"">
                <div class="about-section" id="aboutSection">
                    <div>
                        {!! $services->about !!}
                    </div>
                </div>
                <div class="mandatory-list-section" id="mandatoryListSection">
                    <h4>
                        <span style="font-size: calc(1.275rem + .3vw);color:rgb(255, 102, 0);">
                            Mandatory Product List
                        </span>
                    </h4>
                    <div>
                    </div>
                </div>
                <div class="documents-section" id="documentsSection">
                    <div>
                        {!! $services->documents !!}
                    </div>
                </div>
                <div class="costing-timeline-section" id="costingTimelineSection">
                    <div>
                        {!! $services->stdcosttime!!}
                    </div>
                </div>
                <div class="process-section" id="processSection">
                    <div>
                        {!! $services->process!!}
                    </div>
                </div>
                <div class="mandatory-list-section" id="guidelineSection">
                    <h4>
                        <span style="font-size: calc(1.275rem + .3vw);color:rgb(255, 102, 0);">
                            Download Info & Guideline
                        </span>
                    </h4>
                    <div>
                    </div>
                </div>
                <div class="notification-section" id="notificationSection">
                    <h4>
                        <span style="font-size: calc(1.275rem + .3vw);color:rgb(255, 102, 0);">
                            Industry Notification
                        </span>
                    </h4>
                    <div>
                    </div>
                </div>
                <div class="faq-section" id="faqSection">
                    <h4>
                        <span style="font-size: calc(1.275rem + .3vw);color:rgb(255, 102, 0);">
                            FAQ
                        </span>
                    </h4>
                    <div class="accordion accordion-flush" id="faqs">
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

@endsection
@section('scripts')

@endsection
@endif