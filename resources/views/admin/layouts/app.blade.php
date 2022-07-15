<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Commerce</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  {{-- toaster  --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <!-- data tables -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/data_table/dataTables.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.css') }}">
  <style>
    .sidebar-light-white {
      background-color: #9381FF !important ;
    }
    .sidebar-light-white .nav-link {
      color: #fff !important;
    }
    .sidebar-light-white .nav-link.active{
      color: #9381FF !important;
    }

    .nav-treeview .nav-link.active{
        color:#fff !important;
        background-color: #9381FF !important;
        border: 1px solid #fff !important;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-white elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('frontend#index')}}" class="brand-link">
      {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-bold text-white">E-Market</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin#dashboard') }}" class="nav-link {{ Request::url() == route('admin#dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Dashboard
                </p>
            </a>
          </li>
          <li class="nav-header text-white text-uppercase">Tools</li>
          <li class="nav-item">
            <a href="{{ route('admin#brand') }}" class="nav-link {{ Request::url() == route('admin#brand') ? 'active' : '' }}">
                <i class="nav-icon fas fa-cube"></i>
              <p>
                Brand
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin#color') }}" class="nav-link {{ Request::url() == route('admin#color') ? 'active' : '' }}">
                <i class="nav-icon fas fa-palette"></i>
              <p>
                Color
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin#size') }}" class="nav-link {{ Request::url() == route('admin#size') ? 'active' : '' }}">
                <i class="fas fa-shapes nav-icon"></i>
              <p>
                Size
              </p>
            </a>
          </li>
          <li class="nav-header text-white text-uppercase">Manage Category</li>
          <li class="nav-item">
            <a href="{{ route('admin#category') }}" class="nav-link {{ Request::url() == route('admin#category') ? 'active' : '' }}">
                <i class="fas fa-layer-group nav-icon"></i>
              <p>
                Category
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin#subCategory') }}" class="nav-link {{ Request::url() == route('admin#subCategory') ? 'active' : '' }}">
                <i class="fas fa-layer-group nav-icon"></i>
              <p>
                SubCategory
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin#subSubCat') }}" class="nav-link {{ Request::url() == route('admin#subSubCat') ? 'active' : '' }}">
                <i class="fas fa-layer-group nav-icon"></i>
              <p>
                SubSubCategory
              </p>
            </a>
          </li>
          <li class="nav-header text-white text-uppercase">Manage Products</li>
          <li class="nav-item">
            <a href="{{ route('admin#product') }}" class="nav-link {{ Request::url() == route('admin#product') ? 'active' : '' }}">
                <i class="nav-icon fab fa-product-hunt"></i>
              <p>
                Products
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{ route('admin#createVariant') }}" class="nav-link {{ Request::url() == route('admin#createVariant') ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
              <p>
                Product Variants
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{ route('admin#coupon') }}" class="nav-link {{ Request::url() == route('admin#coupon') ? 'active' : '' }}">
                <i class="nav-icon fas fa-percent"></i>
              <p>
                Coupons
              </p>
            </a>
          </li>

          <li class="nav-header text-white text-uppercase">Manage Delivery Locations</li>
          <li class="nav-item">
            <a href="{{ route('admin#statedivision') }}" class="nav-link {{ Request::url() == route('admin#statedivision') ? 'active' : '' }}">
                <i class="nav-icon fas fa-map-marker-alt"></i>
              <p>
                State Divisions
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin#city') }}" class="nav-link {{ Request::url() == route('admin#city') ? 'active' : '' }}">
                <i class="nav-icon fas fa-map-marker-alt"></i>
              <p>
                City
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin#township') }}" class="nav-link {{ Request::url() == route('admin#township') ? 'active' : '' }}">
                <i class="nav-icon fas fa-map-marker-alt"></i>
              <p>
                Township
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>

          <li class="nav-header text-white text-uppercase">Manage Orders</li>
          <li class="nav-item">
            <a href="{{ route('admin#order') }}" class="nav-link {{ Request::url() == route('admin#order') ? 'active' : '' }}">
                <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                All Orders
              </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin#pendingOrder') }}" class="nav-link {{ Request::url() == route('admin#pendingOrder') ? 'active' : '' }}">
                <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Pending Orders
              </p>
            </a>
        </li>


          <li class="nav-header text-white text-uppercase">Manage Profile</li>
          <li class="nav-item">
            <a href="{{ route('admin#editProfile') }}" class="nav-link {{ Request::url() == route('admin#editProfile') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Edit Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin#editPassword') }}" class="nav-link {{ Request::url() == route('admin#editPassword') ? 'active' : '' }}">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button onclick="return confirm('Are you sure do you want to logout?')" class="btn nav-link d-flex align-items-center justify-content-start">
                    <i class="fas fa-sign-out-alt nav-icon"></i>
                    <p class="">Logout</p>
                </button>
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

        @yield('content')
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->


</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
{{-- datatable --}}
<script src="{{ asset('admin/plugins/data_table/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/data_table/dataTables.bootstrap4.min.js')}}"></script>
{{-- sweet alert  --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
@yield('script')
<script>
    $(document).ready(function () {
         $('#dataTable').DataTable();
    });

    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 4000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });
    @if (Session::has('success'))
        Toast.fire({
                    icon: 'success',
                    title: "{{ Session::get('success') }}",
                })
    @endif
</script>

</body>
</html>
