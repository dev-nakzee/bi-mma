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
                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('site.blogs')}}">blogs</a></li>
                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('site.blogs.sort', $category)}}">{{ $category }}</a></li>
                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('site.blogs.single', [$category, $blog->slug]) }}">{{$blog->slug}}</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 row px-5 pt-3">
            <div class="col-md-3 bg-white border-rounded">
                <h5>Categories</h5>
                <div id="blog-categories" class="list-group">
                    @if($blogCategory)
                    @foreach($blogCategory as $cat)
                    <a class="list-group-item" href="{{ route('site.blogs.sort', $cat->slug)}}">{{$cat->name}}</a>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-9 ps-5 float-right row">
                <h3>{{ $blog->name }}</h3>
                <img src="{{ $blog->path}}" alt="{{ $blog->img_alt }}" class="img-fluid my-3">
                <div class="container-fluid mt-5">
                    {!! $blog->content !!}
                </div>
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