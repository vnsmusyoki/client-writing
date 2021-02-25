<!doctype html>
{{-- <html class="no-js" lang="en"> --}}

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin  |  Dashboard</title>
    <meta name="description" content="Developed By Intruder">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg==" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('superadmin/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('superadmin/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('superadmin/plugins/icon-kit/dist/css/iconkit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('superadmin/plugins/ionicons/dist/css/ionicons.min.css') }}">
     <link rel="stylesheet" href="{{ asset('superadmin/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <link rel="stylesheet" href="{{ asset('superadmin/plugins/c3/c3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('superadmin/plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('superadmin/plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('superadmin/dist/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('superadmin/dist/css/dashboard-css.css') }}">
    <link rel="stylesheet" href="{{ asset('superadmin/dist/css/admin.css') }}"> 
    <link rel="stylesheet" href="{{ asset('superadmin/dist/css/responsive.css') }}"> 
    <script src="{{ asset('superadmin/src/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
</head>

<body>


    <div class="wrapper">
        <header class="header-top" header-theme="light">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <div class="top-menu d-flex align-items-center">
                        <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                        <div class="header-search">
                            <div class="input-group">
                                <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <button type="button" id="navbar-fullscreen" class="nav-link"><i
                                class="ik ik-maximize"></i></button>
                    </div>
                    <div class="top-menu d-flex align-items-center">
                         

                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><img class="avatar" src="{{ asset('clients/img/logo.jpg') }}"
                                    alt=""></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('superadmin') }}"><i class="ik ik-user dropdown-icon"></i>
                                    Profile</a>
                                <a class="dropdown-item" href=""><i class="ik ik-settings dropdown-icon"></i>
                                    Settings</a>
                                 
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="ik ik-power dropdown-icon"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>

        <div class="page-wrap">
            <div class="app-sidebar colored">
                <div class="sidebar-header">
                    <a class="header-brand" href="{{ route('superadmin') }}">
                        <div class="logo-img">
                            <img src="{{ asset('superadmin/src/img/brand-white.svg') }}" class="header-brand-img" alt="{{ Auth::user()->name }}">
                        </div>
                        <span class="text">Admin</span>
                    </a>
                    <button type="button" class="nav-toggle"><i data-toggle="expanded"
                            class="ik ik-toggle-right toggle-icon"></i></button>
                    <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                </div>

                <div class="sidebar-content">
                    <div class="nav-container">
                        <nav id="main-menu-navigation" class="navigation-main">
                            <div class="nav-lavel">Main</div>
                            <div class="nav-item active">
                                <a href="{{ route('superadmin') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                            </div>
                            
                             
                            <div class="nav-item">
                                <a href="{{ url('admin/admin-notifications') }}"><i class="fas fa-bell"></i><span>Messages</span> </a>
                            </div>
                            <div class="nav-item">
                                <a href="{{ url('admin/all-revisions') }}"><i class="ik ik-credit-card"></i><span>Revisions</span> </a>
                            </div>
                             
                            <div class="nav-item has-sub">
                                <a href="javascript:void(0)"><i class="ik ik-cloud-lightning"></i><span>Orders</span></a>
                                <div class="submenu-content">
                                    <a href="{{ url('admin/available-orders') }}" class="menu-item">Available Orders</a>
                                    {{-- <a href="" class="menu-item">Critical Orders</a> 
                                    <a href="" class="menu-item">Pending Orders</a>   --}}
                                </div>
                            </div> 
                             <div class="nav-item has-sub">
                                <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Writers</span></a>
                                <div class="submenu-content">
                                    <a href="{{ url('admin/all-writers') }}" class="menu-item">All Writers</a>
                                    <a href="{{ url('admin/new-writer') }}" class="menu-item">Add New Writer</a> 
                                    <a href="{{ url('admin/suspend-writer') }}" class="menu-item">Suspend Writer</a> 
                                    <a href="{{ url('admin/blocked-writers') }}" class="menu-item">Blocked Writers</a> 
                                </div>
                            </div> 
                             <div class="nav-item has-sub">
                                <a href="javascript:void(0)"><i class="ik ik-users"></i><span>Clients</span></a>
                                <div class="submenu-content">
                                    <a href="{{ url('admin/all-clients') }}" class="menu-item">All Clients</a>
                                    {{-- <a href="{{ url('admin/all-clients') }}" class="menu-item">Add New Writer</a>  
                                    <a href="{{ url('admin/all-clients') }}" class="menu-item">Delete Client Account</a>  --}}
                                </div>
                            </div> 
                            <div class="nav-item has-sub">
                                <a href="javascript:void(0)"><i class="ik ik-dollar-sign"></i> <span>Payments</span></a>
                                <div class="submenu-content">
                                    <a href="" class="menu-item">Settled Transactions</a>
                                    <a href="" class="menu-item">Pending payments</a> 
                                    <a href="" class="menu-item">Disputed payments</a> 
                                </div>
                            </div>
                             
                          
                           
                            
                            {{-- <div class="nav-lavel">Other Links</div> --}}
                            {{-- <div class="nav-item">
                                <a href="{{ url('client/dashboard/guidelines') }}"><i class="fab fa-guilded"></i><span>Guide</span> </a>
                            </div> --}}
                            <div class="nav-item">
                                <a href=""><i class="ik ik-alert-triangle"></i><span>Award Penalty</span> </a>
                            </div>
                            {{-- <div class="nav-item">
                                <a href=""><i class="fab fa-angular"></i><span>FAQ's</span> </a>
                            </div> --}}
                            
                             
                            <div class="nav-item">
                                <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="ik ik-help-circle"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="main-content">
                <div class="container-fluid maincontainerfluid" >
                    @yield('content')
                </div>
            </div>
           

        </div>
    </div>





 

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="{{ asset('superadmin/plugins/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scrollbar/8.6.0/smooth-scrollbar.js" integrity="sha512-D4CJI31/ENGHaZG3S8BVJ5F9dUS1uOB6/dEGzQl7J3R7nT7SNcUQKT+X8emKZ6U4ekY4RnHVkN3vXkVwsApNrw==" crossorigin="anonymous"></script>
    <script src="{{ asset('superadmin/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('superadmin/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('superadmin/plugins/screenfull/dist/screenfull.js') }}"></script> 
    <script src="{{ asset('superadmin/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('superadmin/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('superadmin/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('superadmin/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>
     
    <script src="{{ asset('superadmin/plugins/moment/moment.js') }}"></script>
    
    <script src="{{ asset('superadmin/plugins/d3/dist/d3.min.js') }}"></script>
    <script src="{{ asset('superadmin/plugins/c3/c3.min.js') }}"></script>
    <script src="{{ asset('superadmin/js/tables.js') }}"></script> 
    <script src="{{ asset('superadmin/js/charts.js') }}"></script>
    <script src="{{ asset('superadmin/dist/js/theme.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    {!! Toastr::message() !!}

    <script>
        $('#receivedorders').DataTable();
    </script>
</body>
 
<script>
    $(document).ready(function() {
        $('#exampleModal').on('show.bs.modal', function(event)
            { 
                var button =$(event.relatedTarget); 
                var client  = button.data('client'); 
                var records  = button.data('recordid'); 

                var modal = $(this);

                modal.find('.modal-title').text('Start Convsersation with client now'); 
                modal.find('.modal-body #modalrecordid').val(records);  
                modal.find('.modal-body #modalemail').val(client);  
                modal.find('.modal-body #recipientemail').val(client);  
                modal.find('.modal-body #modalrecordedid').val(records);  
        });
    });
</script>
</html>
