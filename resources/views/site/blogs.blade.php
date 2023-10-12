@if($blog)
@extends('site.layouts.main', ['title' => 'Blogs', 'module' => "Pages"])
@section('seo')

@endsection
@section('content')
    <div class="container-fuild py-5 row products-pages">
        <div class="col-md-6 px-5 align-middle">
            <h2>Blogs</h2>
        </div>
        <div class="col-md-6 px-5 align-middle">
            <nav aria-label="breadcrumb" class="text-end">
                <ol class="breadcrumb float-end">
                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('site.home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="#">Blogs</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 row px-5 pt-3">
            <div class="col-md-3 bg-white border-rounded" id="sidebar-products">
                <div id="blog-categories" class="list-group">
                    @if($blogCategory)
                    @foreach($blogCategory as $category)
                    <a class="list-group-item" href="{{ route('site.blogs.sort', $category->slug)}}">{{$category->name}}</a>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-9 ps-5 service-info-container float-right" data-bs-spy="scroll" data-bs-target="#service-details" data-bs-smooth-scroll="true" tabindex="0">
                @foreach($blog as $blog)
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
            </div>
        </div>
    </div>
@endsection
@section('styles')
    
@endsection
@section('scripts')

<script>

</script>
@endsection
@endif