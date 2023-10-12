@if($blog)
@extends('site.layouts.main', ['title' => 'Contact', 'module' => "Pages"])
@section('seo')

@endsection
@section('content')
    <div class="container-fuild py-5 row products-pages">
        <div class="col-md-6 px-5 align-middle">
            <h2>Get in touch</h2>
        </div>
        <div class="col-md-6 px-5 align-middle">
            <nav aria-label="breadcrumb" class="text-end">
                <ol class="breadcrumb float-end">
                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('site.home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('site.blogs')}}">Contact</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 row px-5 pt-3">

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