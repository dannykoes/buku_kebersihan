<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Akarindo | Buku Kebersihan</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('asset/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset/assets/css/authentication/form-1.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('asset/assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/assets/css/forms/switches.css')}}">
</head>

<body class="form">


    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap" style="max-width: 560px">
                <div class="form-container">
                    <div class="form-content">
                        <h1 class="">Log In <a href="#"><span class="brand-name">BUKU CLEANING</span></a></h1>
                        {{-- <p class="signup-link">New Here? <a href="auth_register.html">Create an account</a></p>
                        --}}
                        <form method="POST" class="text-left" action="{{ route('login') }}">
                            @csrf
                            <div class="form">

                                <div id="username-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                        </path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                    <input id="email" name="email" type="text" class="form-control" placeholder="Email">
                                </div>

                                <div id="password-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="d-sm-flex justify-content-end  mb-2">
                                    <div class="field-wrapper toggle-pass">
                                        <p class="d-inline-block">Show Password</p>
                                        <label class="switch s-primary">
                                            <input type="checkbox" id="toggle-password" class="d-none">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    {{-- <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary btn-block " value="">Login</button>
                                    </div> --}}

                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Login</button>

                                {{-- <div class="field-wrapper text-center keep-logged-in">
                                    <div class="n-chk new-checkbox checkbox-outline-primary">
                                        <label class="new-control new-checkbox checkbox-outline-primary">
                                            <input type="checkbox" class="new-control-input">
                                            <span class="new-control-indicator"></span>Keep me logged in
                                        </label>
                                    </div>
                                </div>

                                <div class="field-wrapper">
                                    <a href="auth_pass_recovery.html" class="forgot-pass-link">Forgot Password?</a>
                                </div> --}}

                            </div>
                        </form>
                        <p class="terms-conditions text-center">© {{ \Carbon\Carbon::now()->year }} All Rights Reserved <a href="https://gagtodolist.id/">PT. Guna Adi Graha | Cleaning Service</a> <a href="https://akarindo.id/">AKARINDO.ID</a>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-image">
            {{-- <div class="l-image">
            </div> --}}
            <img src="{{asset('image/Login.jpg')}}" alt="" srcset="" height="100%">
        </div>
    </div>
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('asset/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('asset/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('asset/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('asset/assets/js/authentication/form-1.js')}}"></script>

</body>

</html>