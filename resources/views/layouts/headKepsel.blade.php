<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="host_url" content="{{ url('/') }}">

    <title> Panel Dana Bos SDN 112 Sattulu Kab. Sinjai </title>

    <!-- Bootstrap -->
  <link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
  <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
  <link href="{{ asset('assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
    <!-- Custom Theme Style -->
  <link href="{{ asset('assets/build/css/custom.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-select/dist/css/bootstrap-select.css') }}">
  <link rel="stylesheet" href="{{ asset('js/sweetalert2/sweetalert2.css') }}">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('home') }}" class="site_title"><span>Dana Bos</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
              <img src="{{ asset('assets/images/img.jpg') }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
              <h2>{{ Auth::guard('kepsek')->user()->nama }}</h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> Beranda </a>
                  </li>

                  <li><a href="{{ route('kepsek.lpj') }}"><i class="fa fa-money"></i> Kelola LPJ </a>
                  </li>

                  <li><a href="{{ route('kepsek.sekolah') }}"><i class="fa fa-money"></i> Data Sekolah </a>
                  </li>

                  <li><a href="{{ route('kepsek.pegawai') }}"><i class="fa fa-money"></i> Data Pegawai </a>
                  </li>

                  <li><a href="{{ route('kepsek.siswa') }}"><i class="fa fa-money"></i> Data Siswa </a>
                  </li>
                
                 
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
         
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="{{ asset('assets/images/img.jpg') }}" alt="">{{Auth::guard('kepsek')->user()->nama}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li>
                      <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                       <i class="fa fa-sign-out pull-right"></i> Keluar </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    </li>
                  </ul>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        @yield('konten')
        @include('layouts.modal')


        <!-- footer content -->
        <footer>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
<script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
<script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
<script src="{{ asset('assets/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
<script src="{{ asset('assets/vendors/nprogress/nprogress.js') }}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
  <script src="{{ asset('assets/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/price-format/jquery.priceformat.min.js') }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('js/sweetalert2/sweetalert2.js') }}"></script>
<script src="{{ asset('assets/build/js/custom.min.js') }}"></script>
<script src="{{ asset('assets/build/js/datatable_management.js') }}"></script>
<script src="{{ asset('assets/build/js/action_management.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>
@stack('scriptKepsel')
<script>
  $(function () {
    $('.selectpicker').selectpicker();
    $('.status_option').selectpicker();
    price_format_class('currency_format');
  })
</script>
  </body>
</html>
