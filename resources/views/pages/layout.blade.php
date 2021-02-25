<!DOCTYPE HTML>
<html lang="en">
<head>
   
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-105838021-1"></script>
 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Homework Elites are here to do your Homework; Place Order Now</title>
<meta name="description" content="A single grade can ruin your goals. We are here to make sure that does not happen. Check our...">

<link rel="shortcut icon" href="images/favicon.png">
<link href="{{ asset('pages/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet" />
<link  href="{{ asset('pages/css/font-awesome.min.css') }}" type="text/css" rel="stylesheet" />
<link  href="{{ asset('pages/css/style.css') }}" type="text/css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">
<link rel="canonical" href="https://homeworkelite.org/">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
 
<script src="https://cdn.homework-market.us/js/app.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body class="homepage">
 
<header class="header">
    
    <nav class="navbar">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{url('/')}}"><img src="{{ asset('pages/images/logo-homeworkelite.jpg') }}" alt="Homework Elites" title="" /></a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
          <li><a href="{{ url('about-us') }}">about us</a></li> 
          <li><a href="{{ url('how-it-works') }}"  >how it works</a></li>
          <li><a href="{{ url('comments') }}">reviews</a></li>
          <li><a href="{{ url('contact-us') }}" >contact us</a></li>
          
          {{-- <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Services <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li class="dropdown dropdown-submenu"><a href="">Accounting Homework Help </a><span class="dropdown-toggle" data-toggle="dropdown"></span>
                    <ul class="dropdown-menu">
                        <li><a href="">Financial accounting homework help</a></li>
                        <li><a href="">Managerial accounting homework help</a></li>
                    </ul>
                </li>
                <li><a href="">College Homework Help</a></li>
                <li><a href="">Economics Homework Help</a></li>
                <li class="dropdown dropdown-submenu"><a href="">Do My Math Homework</a><span class="dropdown-toggle" data-toggle="dropdown"></span>
                    <ul class="dropdown-menu">
                        <li><a href="">Do My Algebra Homework </a></li>
                        <li><a href="">Calculus Homework Help</a></li>
                        <li><a href="">Do My Online Math Class</a></li>
                        <li><a href="">Geometry Homework Help</a></li>
                    </ul>
                </li>
                <li><a href="">Exam Helper Online</a></li>
                
                <li><a href=""> Statistics Homework Help</a></li>
                <li><a href="">Buy Homework Online</a></li>
                
            </ul>
          </li> --}}
          
          <li class="ordernow"><a href="{{ url('client') }}" target="_blank">Place Order Now <span class="fa fa-arrow-right"></span></a></li>
          <li class="signin"><a href="{{ url('writer') }}" target="_blank">Sign in</a></li>
        </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
</header>

@yield('content')

<footer>
	 <div class="footercontent">
         <div class="topfootercontent">
             <div class="footerlogo">
                <img src="{{ asset('pages/images/logo-homeworkelite.jpg')}}" alt="">
             </div>
             <div class="footersubscribe">
                 <form action="">
                     <label for="" class="footerlable">Subscribe</label>
                     <div>
                        <input type="text" class="footerfield" placeholder="To receive latest notifications">
                        <button type="button">subscribe</button>
                     </div>
                     
                 </form>
             </div>
         </div>
         <div class="middlefootercontent">
             <div class="sectionlinks">
                 <h5>Our name</h5>
                 <ul>
                     <li><a href="">My Account</a></li>
                     <li><a href="">Academic Intergrity</a></li>
                     <li><a href="">Refund Policy</a></li>
                     <li><a href="">Terms & Conditions</a></li>
                 </ul>  
             </div>
             <div class="sectionlinks">
                 <h5>IMportant links</h5>
                 <ul>
                     <li><a href="">Blogs</a></li>
                     <li><a href="">Become  a Writer</a></li>
                     <li><a href="">FAQ's</a></li> 
                     <li><a href="">Track Order Progress</a></li>
                     <li><a href="">Pay For Task Done</a></li>
                 </ul>
             </div>
             <div class="sectionlinks">
                 <h5>Contact Us</h5>
                 <p>Address: 8th floor, Bills Building</p>
                 <p>MA , USA</p>
                 <p>Phone:+1(442) 262-1608 </p>
                 <p>Email: sendus@homeworkelites.org</p>
             </div>
             <div class="sectionlinks">
                 <h5>Brief Description</h5>
                 <p>Our Work are NOT intended to be forwarded as finalized work as it is only strictly meant to be used for research and study purposes. HomeworkElites does not endorse or condone any type of plagiarism.</p>
             </div>
         </div>
         <div class="bottomfootercontent">
             <div class="leftbottomfootercontent">
                 <p>Copyright &#174; 2021. Designed by <span>E-Developers&#174;</span>. All Rights Reserved.</p>
             </div>
             <div class="rightbottomfootercontent">
                 <ul>
                     <li>
                         <a href="">F</a>
                         
                     </li>
                     <li>
                         <a href="https://twitter.com/ElitesHomework">T</a>
                     </li>
                     <li>
                         <a href="">L</a>
                     </li>
                     <li>
                         <a href="">I</a>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
</footer>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="{{ asset('pages/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pages/js/script.js') }}"></script>
 
 

</body>
</html>
