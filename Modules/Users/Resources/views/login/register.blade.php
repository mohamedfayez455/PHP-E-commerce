<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Register </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('assets/login/images/icons/favicon.ico')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            @php $url = asset('assets/login/images/bg-01.jpg')  @endphp
            <div class="login100-form-title" style="background-image: url({{$url}});">
					<span class="login100-form-title-1">
						Sign Up
					</span>
            </div>

            <form class="login100-form validate-form" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">name</span>
                    <input class="input100" type="text" name="name" placeholder="Enter name">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-26" data-validate="Useremail is required">
                    <span class="label-input100">email</span>
                    <input class="input100" type="email" name="email" placeholder="Enter email">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="password" placeholder="Enter password">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-26" >
                    <span class="label-input100">phone</span>
                    <input class="input100" type="text" name="phone" placeholder="Enter phone">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-26" >
                    <span class="label-input100">photo</span>
                    <input class="input100" type="file" name="photo" placeholder="Enter photo">
                    <span class="focus-input100"></span>
                </div>



                <div class="flex-sb-m w-full p-b-30">
                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                                Register
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="container-login100-form-btn">
                            <a href="{{url('/front/login')}}" class="login100-form-btn">
                                login
                            </a>
                        </div>
                    </div>
                </div>


                <div class="row" style="margin-top: 10px;">
                    <div class="col-sm-6">
                        <div class="container-login100-form-btn">
                            <a href="{{url('/auth/facebook')}}" class="login100-form-btn">
                                facebook login
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="container-login100-form-btn">
                            <a href="{{url('/auth/google')}}" class="login100-form-btn">
                                google login
                            </a>
                        </div>
                    </div>
                </div>


            </form>


        </div>
    </div>
</div>

<!--===============================================================================================-->
<script src="{{asset('assets/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/login/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/login/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('assets/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/login/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/login/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('assets/login/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/login/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/login/js/main.js')}}"></script>

</body>
</html>