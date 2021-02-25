<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HomeworkElites</title>


  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
    <!-- Morris chart -->
 <link rel="stylesheet" href="assets/plugins/morris/morris.css">
 
 <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
 <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="assets/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

      <style type="text/css">
        #ls_warning-message { display: none; }

    @media only screen and (orientation:portrait){

        #ls_wrapper { display:none; }

        #ls_warning-message { display:block; }

    }

    @media only screen and (orientation:landscape){

        #ls_warning-message { display:none; }

    }
      </style>

</head>
<body  class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@if(Auth::check())
  
  <header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Homework</b>Elites</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>HomeworkElites</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

<div class="navbar-custom-menu">
        <ul class="nav navbar-nav"> 
          
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">  
              Status: Active
            </a> 
          </li>

          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
              UNPAID: KES: 0.00
            </a>
          </li>
          
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">3</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 0 tasks</li> 
            </ul>
          </li>


    <ul class="nav navbar-nav"> 
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown user user-menu">
            <a href="{{ url('/') }}" class="dropdown-toggle" data-toggle="dropdown">
              <!-- <i class="fa fa-envelope-o"></i> -->
              <img src="{{ asset('frontend/images/avatars/avatar.png') }}" class="user-image" alt="User Image"/>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                </form>
              
            </ul>
          </li>
      </ul> 
       
      </div>

      
    </nav>
  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- search form -->
     <!--  <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
     <li><a href="#"><i class="fa fa-book"></i> <span>Messages</span></a></li>
     <li><a href="#"><i class="fa fa-book"></i> <span>Public Orders</span></a></li>
     <li><a href="#"><i class="fa fa-book"></i> <span>Unconfirmed</span></a></li>
     <li><a href="#"><i class="fa fa-book"></i> <span>Current</span></a></li>
     <li><a href="#"><i class="fa fa-book"></i> <span>Revision</span></a></li>
     <li><a href="#"><i class="fa fa-book"></i> <span>Editing</span></a></li>
     <li><a href="#"><i class="fa fa-book"></i> <span>Completed</span></a></li>
     <li><a href="#"><i class="fa fa-book"></i> <span>Payments</span></a></li>
     <li><a href="#"><i class="fa fa-book"></i> <span>Disputed</span></a></li>
     <li><a href="#"><i class="fa fa-book"></i> <span>My Fines</span></a></li>
     <li><a href="#"><i class="fa fa-book"></i> <span>My Statistics</span></a></li>
     <li><a href="#"><i class="fa fa-book"></i> <span>My Files</span></a></li>
     <li><a href="#"><i class="fa fa-book"></i> <span>Questions</span></a></li>
     <li><a href="#"><i class="fa fa-book"></i> <span>Guides</span></a></li>

     
        
      <!-- </ul> -->
    </section>
    <!-- /.sidebar -->
  </aside>

 @endif
          
  <div class="content-wrapper">
    @yield('content')        
  </div>
</div>
</div>
 
<div class="col-md-12" style="color: rgb(255,255,255); text-align: center;background-color: rgb(0,0,0);" >
            <div class="pt-5">
              <p style="color: rgb(255,255,255); text-align: center;background-color: rgb(0,0,0);">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> HomeworkElites |  All Rights Reserved | <a href="#" target="_blank" >privacy Policy</a> | <a href="#" target="_blank" >Term of use</a> |  <a href="http://gatewaymicrosystem.com" target="_blank" >HomeworkElites</a> 
            
            </p>
            <!-- </div> -->
          </div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="assets/bower_components/raphael/raphael.min.js"></script>
<script src="assets/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<script src="assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="assets/bower_components/moment/min/moment.min.js"></script>
<script src="assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- ChartJS 1.0.2 -->
<script src="assets/plugins/chartjs-old/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
</body>
</html>
