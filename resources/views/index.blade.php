<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Toko DIY</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('admin/img/logo/logo.png')}}">
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="{{url('admin/css/bootstrap.min.css')}}">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="{{url('admin/css/font-awesome.min.css')}}">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="{{url('admin/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{url('admin/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{url('admin/css/owl.transitions.css')}}">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="{{url('admin/css/animate.css')}}">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="{{url('admin/css/normalize.css')}}">
    <!-- meanmenu icon CSS
        ============================================ -->
    <link rel="stylesheet" href="{{url('admin/css/meanmenu.min.css')}}">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="{{url('admin/css/main.css')}}">
    <!-- morrisjs CSS
        ============================================ -->
    <link rel="stylesheet" href="{{url('admin/css/morrisjs/morris.css')}}">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="{{url('admin/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <!-- metisMenu CSS
        ============================================ -->
    <link rel="stylesheet" href="{{url('admin/css/metisMenu/metisMenu.min.css')}}">
    <link rel="stylesheet" href="{{url('admin/css/metisMenu/metisMenu-vertical.css')}}">
    <!-- calendar CSS
        ============================================ -->
    <link rel="stylesheet" href="{{url('admin/css/calendar/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{url('admin/css/calendar/fullcalendar.print.min.css')}}">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="{{url('admin/style.css')}}">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="{{url('admin/css/responsive.css')}}">
    <!-- modernizr JS
        ============================================ -->
    <script src="{{url('admin/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="left-sidebar-pro">
       @include('layouts.navbar')
    </div>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="{{url('index')}}"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                    <i class="fa fa-bars"></i>
                                                </button>
                                        </div>
                                    </div>
                                 @include('layouts.header')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
         
            <!-- Mobile Menu end -->
            <!-- <div class="breadcome-area" style="height: 70px; margin-top: 10px">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcome-heading">
                                             
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <ul class="breadcome-menu">
                                            <li><a href="{{url('index')}}">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Dashboard V.1</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
       
        <div class="container-fluid" style="position:relative; bottom:-50px; overflow-y:scroll; height:700px;">
             <div class="card-body">                  


                  @yield('content')

                </div>
        </div>


      
   <!--  
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright &copy; 2018 <a href="https://colorlib.com/wp/templates/">Colorlib</a> All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>

    <!-- jquery
        ============================================ -->
 <script src="{{url('admin/js/vendor/jquery-1.11.3.min.js')}}"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="{{url('admin/js/bootstrap.min.js')}}"></script>
    <!-- wow JS
        ============================================ -->
    <script src="{{url('admin/js/wow.min.js')}}"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="{{url('admin/js/jquery-price-slider.js')}}"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="{{url('admin/js/jquery.meanmenu.js')}}"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="{{url('admin/js/owl.carousel.min.js')}}"></script>
    <!-- sticky JS
        ============================================ -->
    <script src="{{url('admin/js/jquery.sticky.js')}}"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="{{url('admin/js/jquery.scrollUp.min.js')}}"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="{{url('admin/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{url('admin/js/scrollbar/mCustomScrollbar-active.js')}}"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="{{url('admin/js/metisMenu/metisMenu.min.js')}}"></script>
    <script src="{{url('admin/js/metisMenu/metisMenu-active.js')}}"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="{{url('admin/js/morrisjs/raphael-min.js')}}"></script>
    <script src="{{url('admin/js/morrisjs/morris.js')}}"></script>
    <script src="{{url('admin/js/morrisjs/morris-active.js')}}"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="{{url('admin/js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{url('admin/js/sparkline/jquery.charts-sparkline.js')}}"></script>
    <!-- calendar JS
   
  
        ============================================ -->
    <script src="{{url('admin/js/plugins.js')}}"></script>
    <!-- main JS
        ============================================ -->
    <script src="{{url('admin/js/main.js')}}"></script>
</body>

</html>