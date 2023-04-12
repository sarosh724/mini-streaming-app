<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Healdi - Medical & Health Template">

    <!-- ========== Page Title ========== -->
    <title>Login - Music Streaming</title>
    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="{{asset('assets/img/logo-3.png')}}" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/themify-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/flaticon-set.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/magnific-popup.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/owl.theme.default.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/bootsnav.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="{{asset('assets/js/html5/html5shiv.min.js')}}"></script>
    <script src="{{asset('assets/js/html5/respond.min.js')}}"></script>
    <![endif]-->

    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;600;700;800&display=swap" rel="stylesheet">

</head>

<body>
    <div class="d-flex align-items-center justify-content-center bg-gradient" style="height: 100vh;">
    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 col-10 p-4 bg-white rounded">
        <div class="mb-3 text-center">
            <a href="{{url('/')}}">
                <img src="{{asset('assets/img/logo-3.png')}}" class="logo logo-scrolled" alt="Logo">
            </a>
        </div>
        <form method="POST" action="{{url('authenticate')}}" name="login-form" id="login-form">
            @csrf
            <div class="form-group">
                <label class="form-label required" for="username">Email</label>
                <input type="text" class="form-control shadow-none" name="email" id="email" required="">
            </div>
            <div class="form-group">
                <div class="d-flex justify-content-between">
                    <label class="form-label required" for="password">Password</label>
                </div>
                <div class="input-group">
                    <input type="password" class="form-control shadow-none"
                           name="password" id="password">
                    <div class="input-group-append">
                            <span class="input-group-text  cursor-pointer">
                                <i class="fa eye fa-eye-slash toggle-password"></i>
                            </span>
                    </div>
                </div>
                <label id="password-error" class="error" for="password"></label>
            </div>
            <div>
                <button class="btn btn-sm btn-gradient btn-block">Signin</button>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
        <div class="mt-2 text-center">
                <span>
                    Don't have an account?
                    <a href="{{url('register')}}" style="text-decoration: underline;">
                        Register Yourself
                    </a>
                </span>
        </div>
    </div>
</div>

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="{{asset('assets/js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/equal-height.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.appear.js')}}"></script>
    <script src="{{asset('assets/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/modernizr.custom.13711.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/js/progress-bar.min.js')}}"></script>
    <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/count-to.js')}}"></script>
    <script src="{{asset('assets/js/YTPlayer.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/bootsnav.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script type="text/javascript">
        $('.toggle-password').click(function() {
            if(document.getElementById("password").type == "password"){
                $('#password').get(0).type= 'text'
                $(this).removeClass('fa-eye-slash')
                $(this).addClass('fa-eye')
            }else{
                $('#password').get(0).type= 'password'
                $(this).removeClass('fa-eye')
                $(this).addClass('fa-eye-slash')
            }
        });

        $(document).ready(function (){
            $("#login-form").validate({
                rules:{
                    email: {
                        email: true,
                        required:true
                    },
                    password: {
                        required: true
                    }
                },
                messages:{
                    email: {
                        required:"Email is Required*",
                        email: "Please enter Valid Email*"
                    },
                    password: {
                        required: "Password is Required*",
                    }
                },
                submitHandler:function(form){
                    return true;
                }
            });
        });
    </script>
</body>
</html>
