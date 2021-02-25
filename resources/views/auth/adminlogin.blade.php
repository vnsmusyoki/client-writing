<!DOCTYPE html>
<html>
<head>
	<title>Admin Account Login</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('pages/css/clientlogin.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Poppins:500&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="{{ asset('pages/images/wave.png') }}">
	<div class="container">
		<div class="img">
			<img src="{{ asset('pages/images/bg.svg') }}">
		</div>
		<div class="login-content">
			<form method="POST" action="{{ route('login') }}">
                @csrf
				<img src="{{ asset('pages/images/avatar.svg') }}">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
                   
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name="email">
           		   </div>
           		</div>
                @error('email')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password">
            	   </div>

            	</div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            	<a href="#">Forgot Password?</a>
            	<input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('pages/js/clientlogin.js') }}"></script>
</body>
</html>
