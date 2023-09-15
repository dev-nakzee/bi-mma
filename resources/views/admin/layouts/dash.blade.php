<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uxliner.com/adminkit/demo/minisidebar/ltr/pages-blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 May 2021 18:47:41 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>{{ env('APP_NAME') }}</title>

<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Security CSRF token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Favicon -->
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/admin/images/icon.png') }}">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- v4.0.0 -->
<link rel="stylesheet" href="{{ asset('assets/admin/bootstrap/css/bootstrap.min.css') }}">

<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/css/fontawesome/css/all.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/css/et-line-font/et-line-font.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/css/themify-icons/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/css/simple-lineicon/simple-line-icons.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">
<!-- jQuery 3 --> 
<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>

<!-- v4.0.0-alpha.6 -->
<script src="{{ asset('assets/admin/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- template --> 
<script src="{{ asset('assets/admin/js/adminkit.js') }}"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
@yield('styles')

</head>
<body class="sidebar-mini sidebar-collapse">
<div class="wrapper boxed-wrapper">
  <header class="main-header"> 
    <!-- Logo --> 
    <a href="{{ route('admin.dashboard')}}" class="logo blue-bg"> 
    <!-- mini logo for sidebar mini 50x50 pixels --> 
    <span class="logo-mini"><img src="{{ asset('assets/admin/img/logo-n.png') }}" alt=""></span> 
    <!-- logo for regular state and mobile devices --> 
    <span class="logo-lg"><img src="{{ asset('assets/admin/img/logo.png') }}" alt=""></span> </a> 
    <!-- Header Navbar -->
    <nav class="navbar blue-bg navbar-static-top"> 
      <!-- Sidebar toggle button-->
      <ul class="nav navbar-nav pull-left">
        <li><a class="sidebar-toggle" data-toggle="push-menu" href="#"></a> </li>
      </ul> 
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages -->
          <li class="dropdown messages-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa-light fa-envelope"></i>
            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 new messages</li>
              <li>
                <ul class="menu">
                  <li><a href="#">
                    <div class="pull-left"><img src="{{ asset('assets/admin/img/img1.jpg') }}" class="img-circle" alt="User Image"> <span class="profile-status online pull-right"></span></div>
                    <h4>Alex C. Patton</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">9:30 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left"><img src="{{ asset('assets/admin/img/img3.jpg') }}" class="img-circle" alt="User Image"> <span class="profile-status offline pull-right"></span></div>
                    <h4>Nikolaj S. Henriksen</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">10:15 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left"><img src="{{ asset('assets/admin/img/img2.jpg') }}" class="img-circle" alt="User Image"> <span class="profile-status away pull-right"></span></div>
                    <h4>Kasper S. Jessen</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">8:45 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left"><img src="{{ asset('assets/admin/img/img4.jpg') }}" class="img-circle" alt="User Image"> <span class="profile-status busy pull-right"></span></div>
                    <h4>Florence S. Kasper</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">12:15 AM</span></p>
                    </a></li>
                </ul>
              </li>
              <li class="footer"><a href="#">View All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications  -->
          <li class="dropdown messages-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa-light fa-bell"></i>
            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Notifications</li>
              <li>
                <ul class="menu">
                  <li><a href="#">
                    <div class="pull-left icon-circle red"><i class="icon-lightbulb"></i></div>
                    <h4>Alex C. Patton</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">9:30 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left icon-circle blue"><i class="fa fa-coffee"></i></div>
                    <h4>Nikolaj S. Henriksen</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">1:30 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left icon-circle green"><i class="fa fa-paperclip"></i></div>
                    <h4>Kasper S. Jessen</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">9:30 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left icon-circle yellow"><i class="fa  fa-plane"></i></div>
                    <h4>Florence S. Kasper</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">11:10 AM</span></p>
                    </a></li>
                </ul>
              </li>
              <li class="footer"><a href="#">Check all Notifications</a></li>
            </ul>
          </li>
          <!-- User Account  -->
          <li class="dropdown user user-menu p-ph-res"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <!--<img src="{{ asset('assets/admin/img/img1.jpg') }}" class="user-image" alt="User Image">--> <span class="hidden-xs">{{ Auth::user()->name }}</span> </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                {{-- <div class="pull-left user-img"><img src="{{ asset('assets/admin/img/img1.jpg') }}" class="img-responsive img-circle" alt="User"></div> --}}
                <p class="text-left">{{ Auth::user()->name }} <small>{{ Auth::user()->email }}</small> </p>
              </li>
              <li><a href="#"><i class="icon-profile-male"></i> My Profile</a></li>
              <li role="separator" class="divider"></li>
              <li style="text-align: center"><form method="POST" action="{{ route('admin.logout')}}">@csrf<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-power-off"></i> Logout</button></form></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
   <!-- Left side column. contains the logo and sidebar -->
   @include('admin.partials.sidemenu')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1>{{ $title }}</h1>
      <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li><i class="fa fa-angle-right mx-1"></i> {{ $module }}</li>
        <li><i class="fa fa-angle-right mx-1"></i> {{ $title }}</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      @yield('content')
    </div>
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">Version 1.0</div>
    Copyright © 2023 Brand Liaison. All rights reserved.</footer>
</div>
<!-- ./wrapper --> 
@yield('scripts')
</body>

<!-- Mirrored from uxliner.com/adminkit/demo/minisidebar/ltr/pages-blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 May 2021 18:47:41 GMT -->
</html>
