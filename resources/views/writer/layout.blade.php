<!doctype html>
{{-- <html class="no-js" lang="en"> --}}

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Writer-Elite  |  Dashboard</title> 
    <meta name="description" content="Developed By Intruder">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg==" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('clients/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clients/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clients/plugins/icon-kit/dist/css/iconkit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clients/plugins/ionicons/dist/css/ionicons.min.css') }}">
     <link rel="stylesheet" href="{{ asset('clients/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <link rel="stylesheet" href="{{ asset('clients/plugins/c3/c3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clients/plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clients/plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clients/dist/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('clients/dist/css/dashboard-css.css') }}"> 
    <link rel="stylesheet" href="{{ asset('clients/dist/css/manager.css') }}"> 
    <link rel="stylesheet" href="{{ asset('clients/dist/css/responsive.css') }}"> 
    <script src="{{ asset('clients/src/js/vendor/modernizr-2.8.3.min.js') }}"></script>
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
                                aria-haspopup="true" aria-expanded="false" >
                                {{-- <img class="avatar" src="{{ asset('clients/img/logo.jpg') }}"
                                    alt=""> --}}
                                    @if (Auth()->user()->picture == '')
                                    <span style="border-radius:50%;padding:1rem;background-color:#286BB8; color:white;">{{ substr( Auth()->user()->userid, 6) }}</span>
                                    @else
                                    <img class="avatar" src="{{ asset('storage/profiles/'.Auth()->user()->picture) }}" alt="">
                                    @endif
                                </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('writer') }}"><i class="ik ik-user dropdown-icon"></i>
                                    Profile</a>
                                <a class="dropdown-item" href="{{ url('writer/myaccount') }}"><i class="ik ik-settings dropdown-icon"></i>
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
                    <a class="header-brand" href="{{ route('writer') }}">
                        {{-- <div class="logo-img">
                            <img src="{{ asset('clients/src/img/brand-white.svg') }}" class="header-brand-img" alt="{{ Auth::user()->name }}">
                        </div> --}}
                        <span class="text">Writers</span>
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
                                <a href="{{ route('writer') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                            </div>
                            
                            <div class="nav-item">
                                <a href="{{ url('writer/dashboard/my-notifications') }}"><i class="fas fa-bell"></i><span>Notifications</span> </a>
                            </div>
                            <div class="nav-item">
                                <a href="{{ url('writer/dashboard/my-transactions') }}"><i class="ik ik-credit-card"></i><span>All Transactions</span> </a>
                            </div>
                            <div class="nav-item">
                                <a href="{{ url('writer/completed-jobs') }}"><i class="ik ik-check-circle"></i><span>Completed Jobs</span> </a>
                            </div>
                            <div class="nav-item">
                                <a href="{{ url('writer/revision-jobs') }}"><i class="ik ik-alert-circle"></i><span>Revision Jobs</span> </a>
                            </div>
                            <div class="nav-item">
                                <a href="{{ url('writer/dashboard/time-extension-requests') }}"> <i class="ik ik-clock"></i><span>Time Extensions</span> </a>
                            </div>
                            <div class="nav-item">
                                <a href="{{ url('writer/my-messages') }}"><i class="fas fa-user-lock"></i><span>Chat Admin</span> </a>
                            </div>
                             
                            {{-- <div class="nav-item has-sub">
                                <a href="javascript:void(0)"><i class="ik ik-cloud-lightning"></i><span>Orders</span></a>
                                <div class="submenu-content">
                                    <a href="" class="menu-item">New Orders</a>
                                    <a href="" class="menu-item">Viewed Orders</a> 
                                    <a href="" class="menu-item">Bids</a>  
                                </div>
                            </div> --}}
                            {{-- <div class="nav-item has-sub">
                                <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>My Progress</span></a>
                                <div class="submenu-content">
                                    <a href=" " class="menu-item">Completed Orders</a>
                                    <a href="" class="menu-item">Revisions</a> 
                                    <a href="" class="menu-item">In Progress</a> 
                                    <a href="" class="menu-item">Today Submissions</a> 
                                </div>
                            </div> --}}
                            {{-- <div class="nav-item has-sub">
                                <a href="javascript:void(0)"><i class="fas fa-money-check-alt"></i><span>Payments</span></a>
                                <div class="submenu-content">
                                    <a href="" class="menu-item">Settled Transactions</a>
                                    <a href="" class="menu-item">Pending payments</a> 
                                    <a href="" class="menu-item">Disputed payments</a> 
                                </div>
                            </div> --}}
                             
                          
                           
                            
                            <div class="nav-lavel">Support STaff</div>
                            {{-- <div class="nav-item">
                                <a href="{{ url('client/dashboard/guidelines') }}"><i class="fab fa-guilded"></i><span>Guide</span> </a>
                            </div>
                            <div class="nav-item">
                                <a href=""><i class="fas fa-exclamation-triangle"></i><span>Penalties</span> </a>
                            </div>
                            <div class="nav-item">
                                <a href=""><i class="fab fa-angular"></i><span>ads</span> </a>
                            </div> --}}
                            
                             
                            {{-- <div class="nav-item">
                                <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="ik ik-help-circle"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </div> --}}
                        </nav>
                    </div>
                </div>
            </div>
            <div class="main-content">
                <div class="container-fluid maincontainerfluid">
                    @yield('content')
                </div>
            </div>
           

        </div>
    </div>





 

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="{{ asset('clients/plugins/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scrollbar/8.6.0/smooth-scrollbar.js" integrity="sha512-D4CJI31/ENGHaZG3S8BVJ5F9dUS1uOB6/dEGzQl7J3R7nT7SNcUQKT+X8emKZ6U4ekY4RnHVkN3vXkVwsApNrw==" crossorigin="anonymous"></script>
    <script src="{{ asset('clients/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('clients/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('clients/plugins/screenfull/dist/screenfull.js') }}"></script> 
    <script src="{{ asset('clients/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('clients/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('clients/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('clients/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>
     
    <script src="{{ asset('clients/plugins/moment/moment.js') }}"></script>
    
    <script src="{{ asset('clients/plugins/d3/dist/d3.min.js') }}"></script>
    <script src="{{ asset('clients/plugins/c3/c3.min.js') }}"></script>
    <script src="{{ asset('clients/js/tables.js') }}"></script> 
    <script src="{{ asset('clients/js/charts.js') }}"></script>
    <script src="{{ asset('clients/dist/js/theme.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    {!! Toastr::message() !!}

    <script> 
        $('#receivedorders').DataTable();
        $('#allbids').DataTable();
    </script>
</body>
 <script>
     $(document).ready(function(){
        $('#bidtask').on('show.bs.modal', function(event)
            { 
                var button =$(event.relatedTarget); 
                var records  = button.data('recordid'); 

                var modal = $(this);

                modal.find('.modal-title').text('Bid Now');  
                modal.find('.modal-body #orderid').val(records);  
        });
        $('#modaltimeextension').on('show.bs.modal', function(event)
            { 
                var button =$(event.relatedTarget); 
                var records  = button.data('recordid'); 

                var modal = $(this);

                modal.find('.modal-title').text('Bid Now');  
                modal.find('.modal-body #orderid').val(records);  
        });
        $('#modalfinaldocumentupload').on('show.bs.modal', function(event)
            { 
                var button =$(event.relatedTarget); 
                var records  = button.data('recordid'); 

                var modal = $(this);

                modal.find('.modal-title').text('Bid Now');  
                modal.find('.modal-body #orderid').val(records);  
        });
     });
 </script>

</html>
