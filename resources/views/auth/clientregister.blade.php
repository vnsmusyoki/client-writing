<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('clients/plugins/icon-kit/dist/css/iconkit.min.css') }}">
    <title>Client Create Account</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;

        }
        .registercontainer{
            width: 100%;
            height: 100%;
            display: grid;
            grid-template-columns: 40% 60%;
            font-family: 'Inter', sans-serif;
        }
        .registercontainer .leftrigistercontainer{
            display: flex;
            flex-direction: column;
            height: 100%;
            vertical-align: middle;
            justify-content: center;
            align-items: center;
            background-color: #273142;
        }
        .leftrigistercontainer .containerinfo{
            width: 60%;
            margin: 0 auto;
        }
        .leftrigistercontainer .containerinfo h5{
            font-family: 'Inter', sans-serif;
            color: #fafafd;
            margin-bottom: 16px;
            font-size: 30px;
            line-height: 38px;
            text-align: center;
            font-weight: 800;
        }
        .leftrigistercontainer .containerinfo form .input-group{
            margin-bottom: 1.5rem;
        }
        .leftrigistercontainer .containerinfo form{
            color: #fafafd;
            font-family: 'Inter', sans-serif;
        }
        .leftrigistercontainer .containerinfo form label{
            margin-bottom: .5rem;
        }
        .leftrigistercontainer .containerinfo form .form-control:focus{
            transition: none !important;
        }
        .leftrigistercontainer .containerinfo form .form-control{
            
    padding: 10px 7px;
    color: #a9adb3;
    font-size: 14px;
    line-height: 1.5715;
    background-color: #2d3748;
    background-image: none;
    border: 1px solid #47505e;
    border-radius: 4px;
    transition: none;
        }
        .input-group-prepend .input-group-text i{
            font-size: 24px;
        }
        .input-group-prepend .input-group-text{
            background-color: transparent !important;
            color: #a9adb3;
            border-right: none !important;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
    border: 1px solid #47505e;
    height: 100%;
             
        }
        .btnregister{
            color: #fafafd;
    background-color: #038c43;
    border-color: #038c43;
    text-shadow: 0 -1px 0 rgb(0 0 0 / 12%);
    box-shadow: 0 2px 0 rgb(0 0 0 / 5%); 
    padding: 10px 15px;
    font-size: 16px;
    border-radius: 4px; 
    cursor: pointer;   
    width: 100%;
        }
        .morelinks{
            margin-top: 2rem;
        }
        .morelinks h5.clicklogin{
            color: #fafafd;
            font-size: 15px;
            text-align: left;
            font-weight: 500;
        }
        
        .rightrigistercontainer {
            background: url('../images/placebg.jpg') no-repeat;
            background-attachment: fixed;
            background-size: cover;
            width: 100%;
            height: auto;
            position: relative; 
            display: flex;
            flex-direction: column;
            padding: 80px 32px;
            overflow: hidden;
}

.rightrigistercontainer::before {
    content: '';
    position: absolute;
    background: linear-gradient(to right, rgb(45, 55, 72) 46%, rgb(91, 96, 106) 100%);
    top: 0px;
    bottom: 0px;
    left: 0px;
    width: 100%;
    z-index: -1;
}
.middlecontentshow,
.footercontentshow{
    display: flex;
    flex-direction: column;
    height: 32vh;
}
.middlecontentshow span.intro{
    color: #fafafd;
    font-weight: 500;
    font-size: 14px;
    margin-bottom: 1rem;
}
.middlecontentshow span.introdesc{
    color: #fafafd;
    font-weight: 500;
    font-size: 34px;
    margin-bottom: 1rem;
}
.footercontentshow span.sleep{
    color: #fafafd;
    font-weight: 500;
    font-size: 14px;
    margin-bottom: 1rem;
}

.footercontentshow span.lastinfo{
    color: #fafafd;
    font-weight: 500;
    font-size: 34px;
    margin-bottom: 1rem;
}
@media only screen and (max-width: 940px) {
    .registercontainer{
            width: 100%;
            height: 200vh;
            display: grid;
            grid-template-columns: 100%;
            font-family: 'Inter', sans-serif;
        }
        .leftrigistercontainer .containerinfo h5{ 
            font-size: 18px; 
        }
.middlecontentshow span.intro{
    color: #fafafd;
    font-weight: 500;
    font-size: 14px;
    margin-bottom: 1rem;
}
.middlecontentshow span.introdesc{
    color: #fafafd;
    font-weight: 500;
    font-size: 18px;
    margin-bottom: 1rem;
}
.footercontentshow span.lastinfo{
    color: #fafafd;
    font-weight: 500;
    font-size: 18px;
    margin-bottom: 1rem;
}
.leftrigistercontainer .containerinfo{
            width: 90%;
            margin: 0 auto;
        }

}
    </style>
  </head>
  <body>
    <div class="registercontainer">
            <div class="leftrigistercontainer">
                <div class="containerinfo">
                        <h5>Registration</h5>

                        <form method="POST" action="{{ url('client/createaccount') }}" autocomplete="off">
                            @csrf
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text"> <i class="ik ik-user-check"></i></div>
                              </div>
                              <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Full names" name="full_names" value="{{ old('full_names') }}">
                             
                            </div> 
                            @error('full_names')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text"><i class="ik ik-voicemail"></i></div>
                              </div>
                              <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Email address" name="email" value="{{ old('email') }}">
                              
                            </div>
                            @error('email')
                                  <small class="text-danger">{{ $message }}</small>
                              @enderror
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text"><i class="ik ik-settings"></i></div>
                              </div>
                              <input type="password" class="form-control" id="inlineFormInputGroupUsername2" placeholder="password" name="password" value="{{ old('password') }}">
                              
                            </div>
                            @error('password')
                                  <small class="text-danger">{{ $message }}</small>
                              @enderror
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text"><i class="ik ik-voicemail"></i></div>
                              </div>
                              <input type="password" class="form-control" id="inlineFormInputGroupUsername2" placeholder="confirm password" name="password_confirmation" value="{{ old('password_confirmation') }}">
                            </div>
                            
                            
                          
                            <button type="submit" class="btnregister">Submit</button>
                          </form>
                          <div class="morelinks">
                              <h5 class="clicklogin">Already have an Account? <a href="{{ url('/client') }}">login here</a></h5>
                              <h6><a href="{{ url('/') }}">Return home</a></h6>
                          </div>
                </div>
            </div>
            <div class="rightrigistercontainer">
                    <div class="topcontentshow">
                        <img src="" alt="">
                    </div>
                    <div class="middlecontentshow">
                        <span class="intro">Writing at your convinience</span>
                        <span class="introdesc">Top Essay Writing Service
                            with Professional Essay Writers</span>
                    
                    </div>
                    <div class="footercontentshow">
                        <span class="sleep">No more sleepless nights...</span>
                        <span class="lastinfo">100% free plagiarism completed tasks</span>
                    </div>
            </div>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>