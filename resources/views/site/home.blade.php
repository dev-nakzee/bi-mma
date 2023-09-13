@extends('site.layouts.main', ['title' => 'All Pages', 'module' => "Pages"])
@section('content')
    <!-- Container element -->
    <div class="container-fluid home-banner p-5">
        <h1 class="">Launch Your Product In India?</h1>
        <p>Get your Product Approval to Sell it in India Fast & Economical way</p>
    </div> 
@endsection
@section('styles')
<style>
    .home-banner {
      /* The image used */
      background-image: url("{{ asset('assets/site/images/bg2.png')}}");
      /* Set a specific height */
      min-height: 500px;
    
      /* Create the parallax scrolling effect */
      background-attachment: fixed;
      background-position: bottom;
      background-repeat: no-repeat;
      background-size: contain;
    }
    @media only screen and (max-device-width: 960px) {
        .home-banner {
            background-attachment: scroll;
        }
    }
    </style>
@endsection
@section('scripts')

@endsection