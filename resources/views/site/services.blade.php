@extends('site.layouts.main', ['title' => 'All Pages', 'module' => "Pages"])
@section('content')
    @if($services)
    @php
    @endphp
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
            <div class="col-md-4">
                
            </div>
        </div>
    </div>
    @endif
@endsection
@section('styles')


@endsection
@section('scripts')

@endsection