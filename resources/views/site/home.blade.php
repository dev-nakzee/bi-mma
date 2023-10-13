@extends('site.layouts.main', ['title' => 'All Pages', 'module' => "Pages"])
@section('content')
    <!-- Container element -->
    <div class="container-fluid home-banner p-5">
        <h1 class="">Launch Your Product In India?</h1>
        <p class="mb-5">Get your Product Approval to Sell it in India Fast & Economical way</p>
        <form class="col-md-6" id="search-form" method="POST" action="{{ route('site.search')}}">
        <div class="input-group">
            <input type="text" class="form-control" name="search-text" placeholder="Type services &amp; products" aria-label="" aria-describedby="search-btn">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit" id="search-btn">
                <i class="fa fa-search"></i>
              </button>
            </div>
        </div>
        </form>
        <div class="bg-dark col-md-6 d-none" id="suggestions">

        </div>
        {{-- <ul class="contain-fluid mt-5 pt-5 ps-0 service-icon">
            @if($service)
            @foreach($service as $s)
            <li>
                <img src="{{ $s->path }}" alt="{{ $s->img_alt }}">
            </li>
            @endforeach
            @endif
        </ul> --}}
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
    <div class="container-fluid row px-5my-5 py-5 bg-orange">
        <div class="col-md-6 text-center">
            <img src="{{ url('/media/codes-1697112570.gif')}}" alt="" class="rounded">
        </div>
        <div class="col-md-6">
            <h2 class="text-center">About services text</h2>
        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus fringilla leo arcu, ut aliquet augue fermentum at. Curabitur ornare facilisis sollicitudin. Mauris luctus laoreet dictum. Aliquam viverra vestibulum sapien vel varius. Praesent tincidunt rutrum ante, consectetur aliquam nisi lacinia a. Etiam est odio, efficitur a eros vel, porta rutrum ex. Vivamus ultrices tristique tristique.
<br><br>
            Pellentesque tortor augue, luctus quis elit eu, tempor molestie ante. Donec rutrum elit ipsum, in convallis enim ullamcorper vel. Aliquam aliquet facilisis maximus. Proin dapibus fermentum iaculis. Etiam volutpat porta eros a tristique. Vivamus eget feugiat leo, et egestas felis. Quisque at elementum sapien, ut volutpat ipsum. Aliquam in mollis tellus. Praesent ultrices nisl et dolor lacinia posuere. Cras mattis scelerisque lectus id venenatis. Nam laoreet dui id tellus dictum tristique vitae sit amet quam. Nunc ac quam ac ex finibus dignissim quis nec lorem. Nam quis felis sed lacus sagittis tristique. </p>
        </div>
    </div>
    <div class="container-fluid row px-5 py-5 bg-grey-light text-center">
        <h2 class="pt-5">Advantages</h2>
        <p class="p-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus fringilla leo arcu, ut aliquet augue fermentum at. Curabitur ornare facilisis sollicitudin. Mauris luctus laoreet dictum. Aliquam viverra vestibulum sapien vel varius. Praesent tincidunt rutrum ante, consectetur aliquam nisi lacinia a. Etiam est odio, efficitur a eros vel, porta rutrum ex. Vivamus ultrices tristique tristique.</p>
        <div class="col-md-3 advantage-icons p-2 mb-3">
            <i class="fa-light fa-file-certificate"></i>
            <h5 class="my-3">Comprehensive Cetification</h5>
        </div>
        <div class="col-md-3 advantage-icons p-2 mb-3">
            <i class="fa-light fa-life-ring"></i>
            <h5 class="my-3">End-to-End Support</h5>
        </div>
        <div class="col-md-3 advantage-icons p-2 mb-3">
            <i class="fa-light fa-bolt"></i>
            <h5 class="my-3">Lighting-fast Services</h5>
        </div>
        <div class="col-md-3 advantage-icons p-2 mb-3">
            <i class="fa-light fa-signal-bars"></i>
            <h5 class="my-3">100% Online Process</h5>
        </div>
    </div>
    <div class="container-fluid row px-5 py-5 bg-orange text-center">
        <h2 class="pt-5">Why choose us?</h2>
        <p class="p-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus fringilla leo arcu, ut aliquet augue fermentum at. Curabitur ornare facilisis sollicitudin. Mauris luctus laoreet dictum. Aliquam viverra vestibulum sapien vel varius. Praesent tincidunt rutrum ante, consectetur aliquam nisi lacinia a. Etiam est odio, efficitur a eros vel, porta rutrum ex. Vivamus ultrices tristique tristique.
        <br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus fringilla leo arcu, ut aliquet augue fermentum at. Curabitur ornare facilisis sollicitudin. Mauris luctus laoreet dictum. Aliquam viverra vestibulum sapien vel varius. Praesent tincidunt rutrum ante, consectetur aliquam nisi lacinia a. Etiam est odio, efficitur a eros vel, porta rutrum ex. Vivamus ultrices tristique tristique.
        <br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus fringilla leo arcu, ut aliquet augue fermentum at. Curabitur ornare facilisis sollicitudin. Mauris luctus laoreet dictum. Aliquam viverra vestibulum sapien vel varius. Praesent tincidunt rutrum ante, consectetur aliquam nisi lacinia a. Etiam est odio, efficitur a eros vel, porta rutrum ex. Vivamus ultrices tristique tristique.</p>
        </div>
    </div>
    <div class="section-3 row container-fluid px-5 text-center my-5 py-5">
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

@endsection
@section('scripts')
<script>
$('#search-form').on('click', function(e){
    $(this).preventDefault();
});
</script>
@endsection