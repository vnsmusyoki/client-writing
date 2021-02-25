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
            height: 100vh;
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
            height: 100vh;
            position: relative;
            flex-wrap: wrap;
            display: flex;
            flex-direction: column;
            padding: 80px 32px;
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
.containeremail{
    width: 80%;
    margin: 0 auto;
}
.containeremail p{
    font-size: 14px;
    line-height: 22px;
    color: #dfe0e3;
}
    </style>
  </head>
  <body>
    <div class="registercontainer">
            <div class="leftrigistercontainer">
                <div class="containerinfo">
                        <h5>Congratulations</h5>
                        <div class="containeremail">
                            <p>Verification link has been sent to your email <span>{{ $token }}. Click the link to activate.</span></p>
                         
                        </div>
                          <div class="morelinks">
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
 
  </body>
</html>