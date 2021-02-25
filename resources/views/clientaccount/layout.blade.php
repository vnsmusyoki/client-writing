<!doctype html>
{{-- <html class="no-js" lang="en"> --}}

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Clients  |  Dashboard</title>
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
    <link rel="stylesheet" href="{{ asset('clients/dist/css/client.css') }}"> 
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
                                aria-haspopup="true" aria-expanded="false">
                                @if (Auth()->user()->picture == '')
                                <div class="onelefts">
                                    <span>{{ substr( Auth()->user()->userid, 6) }}</span>
                                </div>
                                     
                                     {{-- <img class="avatar" src="{{ asset('storage/profiles/'.Auth()->user()->picture) }}" alt=""> --}}
                                @else
                                     <img class="avatar" src="{{ asset('storage/profiles/'.Auth()->user()->picture) }}" alt="">
                                @endif
                                 
                                </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('client') }}"><i class="ik ik-user dropdown-icon"></i>
                                    Profile</a>
                                <a class="dropdown-item" href="{{ url('client/myaccount') }}"><i class="ik ik-settings dropdown-icon"></i>
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

        <div class="page-wrap" >
            <div class="app-sidebar colored">
                <div class="sidebar-header">
                    <a class="header-brand" href="{{ route('client') }}">
                        <div class="logo-img">
                            <img src="{{ asset('clients/src/img/brand-white.svg') }}" class="header-brand-img" alt="{{ Auth::user()->name }}">
                        </div>
                        <span class="text">clients</span>
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
                                <a href="{{ route('client') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                            </div>
                            <div class="nav-item has-sub">
                                <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>My Profile</span></a>
                                <div class="submenu-content">
                                    <a href="{{ url('client/myacccount') }}" class="menu-item">My account</a>
                                    <a href="{{ url('client/settings') }}" class="menu-item">Settings</a> 
                                    <a href="" class="menu-item">Logout</a>  
                                </div>
                            </div>
                            <div class="nav-item has-sub">
                                <a href="javascript:void(0)"><i class="ik ik-cloud-lightning"></i><span>Orders</span></a>
                                <div class="submenu-content">
                                    <a href="{{ url('client/submit-order') }}" class="menu-item">Add New Order</a>
                                    <a href="{{ url('client/my-orders-prices') }}" class="menu-item">Pay for My Orders</a> 
                                    <a href="{{ url('client/myorders') }}" class="menu-item">All My Orders</a> 
                                     
                                </div>
                            </div>
                            <div class="nav-item">
                                <a href="{{ url('client/my-notifications') }}"><i class="fas fa-bell"></i><span>Notifications</span> </a>
                            </div>
                            <div class="nav-item">
                                <a href="{{ url('client/my-wallet') }}"><i class="ik ik-credit-card"></i><span>All Transactions</span> </a>
                            </div>
                            <div class="nav-item">
                                <a href="{{ url('client/my-messages') }}"><i class="fas fa-user-lock"></i><span>Chat Admin</span> </a>
                            </div>
                             
                            {{-- <div class="nav-item has-sub">
                                <a href="javascript:void(0)"><i class="ik ik-cloud-lightning"></i><span>Orders</span></a>
                                <div class="submenu-content">
                                    <a href="" class="menu-item">New Orders</a>
                                    <a href="" class="menu-item">Viewed Orders</a> 
                                    <a href="" class="menu-item">Bids</a>  
                                </div>
                            </div> --}}
                            {{--  --}}
                            {{-- <div class="nav-item has-sub">
                                <a href="javascript:void(0)"><i class="fas fa-money-check-alt"></i><span>Payments</span></a>
                                <div class="submenu-content">
                                    <a href="" class="menu-item">Settled Transactions</a>
                                    <a href="" class="menu-item">Pending payments</a> 
                                    <a href="" class="menu-item">Disputed payments</a> 
                                </div>
                            </div> --}}
                             
                          
                           
                            
                            <div class="nav-lavel">Support Staff</div>
                            {{-- <div class="nav-item">
                                <a href="{{ url('client/dashboard/guidelines') }}"><i class="fab fa-guilded"></i><span>Guide</span> </a>
                            </div>
                            <div class="nav-item">
                                <a href=""><i class="fas fa-exclamation-triangle"></i><span>Penalties</span> </a>
                            </div>
                            <div class="nav-item">
                                <a href=""><i class="fab fa-angular"></i><span>FAQ's</span> </a>
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
            <div class="main-content" style="background-color: #E8EDF2">
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
         $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#allprices').DataTable();
            $('.deletejob').click(function(e) {
            e.preventDefault();

            var taskid = $(this).closest('.deleteorder').find('.taskid').val();
     
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, this task details will be removed from your account!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    var data = {
                        "_token":$('input[name="csrf-token"]').val(),
                        "id":taskid,
                    }
                    $.ajax({
                        type: 'DELETE',
                        url: 'removetask/'+taskid,
                        data: data, 
                        success: function(response){
                            if (willDelete) {
                                swal(response.status, {
                                icon: "success",
                                })
                                .then((result) =>{
                                    location.reload();
                                });
                            } 
                        },
                        error: function () {
                                console.log('AJAX load did not work');
                        }
                    });
                    
                });
        });
         
        document.getElementById("categoryfield").addEventListener("click", displaycategory);
        document.getElementById("deadlinefield").addEventListener("click", displaydeadline);
        document.getElementById("topic").addEventListener("click", displaytopic);
        document.getElementById("solution").addEventListener("click", displaysolution);
        document.getElementById("images").addEventListener("click", displayimages);
        document.getElementById("education").addEventListener("click", displayeducation);
        document.getElementById("description").addEventListener("click", displaydesc);
        document.getElementById("amount").addEventListener("click", displayamount);
        document.getElementById("language").addEventListener("click", displaylanguage);
            function displaycategory() {
            document.getElementById("category").innerHTML = "select the type of task you have.Prices varry from one task to another";
            }
            function displaytopic() {
            document.getElementById("category").innerHTML = "set a suitable topic of your task which will give a rough idea of what you expect as the final document";
            }
            function displaysolution() {
            document.getElementById("category").innerHTML = "select the final document format.if its not specified in the list, pplease make sure you specify it in the description field given below";
            }
            function displayimages() {
            document.getElementById("category").innerHTML = "upload any relevant document to your tasks.its adviceable to provide a ziped file in cases where attachments are more than 1";
            }
            function displayeducation() {
            document.getElementById("category").innerHTML = "select the academic level of your assignment.our writers will adjust the complexity of the vocabulary and ideas accordingly. Please note the higher the level the higher the price.";
            }
            function displaydesc() {
            document.getElementById("category").innerHTML = "provide a description of all relevant information, instructions, citings for your assignment here.";
            }
            function displaylanguage() {
            document.getElementById("category").innerHTML = "choose prefered language for your assignment";
            }
            function displayamount() {
            document.getElementById("category").innerHTML = "state the amount you are willing to pay. please not that if the tasks is underpaid, the admin will communicate with you.";
            }
            function displaydeadline() {
            document.getElementById("category").innerHTML = " set the time after which you will receiver your task.Receiving your work earlie before the deadline set will alow room for edit if any";
            }
            
    </script>
</body>
<script>
    $(document).ready(function(){
        $('#modaltopicedit').on('show.bs.modal', function(event)
            { 
                var button =$(event.relatedTarget);
                var topics  = button.data('topic'); 
                var records  = button.data('recordid'); 

                var modal = $(this);

                modal.find('.modal-title').text('Edit Task Topic');
                modal.find('.modal-body #modaltopic').val(topics);  
                modal.find('.modal-body #modalrecord').val(records);  
        });
        $('#modaldescriptioncedit').on('show.bs.modal', function(event)
            { 
                var button =$(event.relatedTarget);
                var description  = button.data('description'); 
                var records  = button.data('recordid'); 

                var modal = $(this);

                modal.find('.modal-title').text('Edit Task Description');
                modal.find('.modal-body #modaldescritption').val(description);  
                modal.find('.modal-body #modalrecord').val(records);  
        });
        $('#modalsolutionformatedit').on('show.bs.modal', function(event)
            { 
                var button =$(event.relatedTarget);
                var description  = button.data('description'); 
                var records  = button.data('recordid'); 

                var modal = $(this);

                modal.find('.modal-title').text('Edit Task Solution Format');
                modal.find('.modal-body #modaldescritption').val(description);  
                modal.find('.modal-body #modalrecord').val(records);  
        });
        $('#modalattachmentsedit').on('show.bs.modal', function(event)
            { 
                var button =$(event.relatedTarget); 
                var records  = button.data('recordid'); 

                var modal = $(this);

                modal.find('.modal-title').text('Edit Attachments'); 
                modal.find('.modal-body #modalrecord').val(records);  
        });
        $('#modalotherdetailsedit').on('show.bs.modal', function(event)
            { 
                var button =$(event.relatedTarget); 
                var records  = button.data('recordid'); 
                var deadline  = button.data('deadline'); 
                var language  = button.data('language'); 
                var education = button.data('education'); 
                var amount  = button.data('amount'); 

                var modal = $(this);

                modal.find('.modal-title').text('Edit Final Details'); 
                modal.find('.modal-body #modalrecord').val(records);  
                modal.find('.modal-body #modallanguage').val(language);  
                modal.find('.modal-body #modaldeadline').val(deadline);  
                modal.find('.modal-body #modaleducation').val(education);  
                modal.find('.modal-body #modalamount').val(amount);  
        });
        
    });
</script>

</html>
