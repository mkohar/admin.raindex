<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="x-ua-compatible" content="ie=edge">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

 
   @yield('title')
   

   <!-- Styles -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">

   <script>
      window.Laravel = {!! json_encode([
         'user' => [
            'name' => auth()->check() ? auth()->user()->name : null
         ]
      ]) !!};
   </script>




   <!-- Font Awesome Icons -->
   <link rel="stylesheet" href="{{ asset('/vendor/plugins/fontawesome-free/css/all.min.css') }}">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="{{ asset('/vendor/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">  
   <!-- Theme style -->
   <link rel="stylesheet" href="{{ asset('/vendor/dist/css/adminlte.min.css') }}">
   <!-- Google Font: Source Sans Pro -->
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
   <!-- page CSS -->
   @yield('css')
   
</head>
<body class="hold-transition sidebar-mini layout-fixed" style="font-family: 'Montserrat', sans-serif; font-size:12px">
<div class="wrapper" id="app">

   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
      <li class="nav-item">
         <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      </ul>

      <ul class="navbar-nav ml-auto">
         {{-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
               <i class="far fa-comments"></i>
               <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
               <a href="#" class="dropdown-item">
               <div class="media">
                  <img src="{{ asset('/AdminLTE/dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                  <div class="media-body">
                     <h3 class="dropdown-item-title">
                        Brad Diesel
                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                     </h3>
                     <p class="text-sm">Call me whenever you can...</p>
                     <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
               </div>
            </a>
            <div class="dropdown-divider"></div>
               <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
         </li>
         <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" id="btn-bell">
               <i class="far fa-bell"></i>
               @if (count(Notification::newMessage()) > 0)
                  <span class="badge badge-warning navbar-badge" id="total-notif">{{ count(Notification::newMessage()) }}</span>
               @endif
               
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
               <span class="dropdown-header">{{ count(Notification::newMessage()) }} Notifications</span>
               <div class="dropdown-divider"></div>
               <div  style="overflow-y: scroll; max-height:400px;">
                  @foreach (Notification::newMessage() as $new_message)
                     <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> {{ $new_message->name }}
                     </a>
                  @endforeach
               </div>
               
               
               <div class="dropdown-divider"></div>
               <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
         </li> --}}
         {{-- <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
               class="fas fa-th-large"></i></a>
         </li> --}}
         <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               {{-- <i class="nav-icon fas fa-power-off" style="color:#dc3545"></i> --}}
               <i class="nav-icon far fa-user"></i>
               {{-- <i class="nav-icon fas fa-user"></i> --}}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="#" role="button" data-toggle="modal" data-target="#modalChangePasword">Ubah Kata Sandi</a>
               <a class="dropdown-item" href="#">Profil</a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-power-off mr-2" style="color:#dc3545"></i>Keluar</a>
            </div>
         </li>
      </ul>
   </nav>
   {{-- Modal Change Password --}}
   <div class="modal fade" id="modalChangePasword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <form action="">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ubah Kata Sandi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="form-group">
                     <label for="oldPassword">Kata Sandi Lama</label>
                     <input type="password" class="form-control" id="oldPassword">
                  </div>
                  <div class="form-group">
                     <label for="newPassword">Kata Sandi Baru</label>
                     <input type="password" class="form-control" id="newPassword">
                  </div>
                  <div class="form-group">
                     <label for="newPassword2">Ulangi Kata Sandi Baru</label>
                     <input type="password" class="form-control" id="newPassword2">
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  <button type="button" class="btn btn-primary">Ganti Kata Sandi</button>
               </div>
            </form>
         </div>
      </div>
   </div>
   <!-- /.navbar -->

   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
         {{-- <img src="{{ asset('/logo/raindexcreative.png') }}" alt="Raindex Creative Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
         <div class="row">

            {{-- <div class="ml-3 mr-3">
               <i class="fas fa-mosque"></i>
            </div> --}}
            <span class="brand-text font-weight-light ">RAINDEX CREATIVE</span>
         </div>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">
            <img src="{{ asset('/vendor/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
         </div>
         <div class="info">
            <a href="#" class="d-block">{{Auth::user()->name}}</a>
         </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            {{-- <li class="nav-item has-treeview menu-open"> --}}
            <li class="nav-item has-treeview">
               <a href="{{ route('dashboard') }}" class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Dashboard
                  </p>
               </a>
            </li>
            <li class="nav-item has-treeview">
               <a href="{{ route('aboutUs') }}" class="nav-link {{ Request::routeIs('aboutUs') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                     About Us
                  </p>
               </a>
            </li>
            <li class="nav-item has-treeview">
               <a href="{{ route('portfolio') }}" class="nav-link {{ Request::routeIs('portfolio') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                     Portfolio
                  </p>
               </a>
            </li>
            <hr>
            <li class="nav-item has-treeview">
               <a href="{{ route('project') }}" class="nav-link {{ Request::routeIs('project*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                     Project
                  </p>
               </a>
            </li>
            
            <li class="nav-item mt-2">
               <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  {{-- <i class="nav-icon fas fa-power-off" style="color:red"></i> --}}
                  <i class="nav-icon fas fa-sign-out-alt" style="color:#dc3545"></i>
                  <p>
                     Keluar
                  </p>
               </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
               </form>
            </li>
         </ul>
      </nav>
   </aside>

   <!-- Content Wrapper. Contains page content -->
   <div >

      @yield('content')
   </div>
   <!-- /.content-wrapper -->

   <!-- Control Sidebar -->
   {{-- <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
      </div>
   </aside> --}}
   <!-- /.control-sidebar -->

   <!-- Main Footer -->
   <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
      Anything you want
      </div>
      <!-- Default to the left -->
      &copy; Copyright 2019 Masjid Sahid Nurul Iman | Made with <i class="fas fa-heart" style="color: firebrick"></i>
   </footer>
</div>
<!-- ./wrapper -->

@yield('js')


</body>
</html>
