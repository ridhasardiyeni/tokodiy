
<style>
        body,
        html {
            margin: 0;
            padding: 5%;
            height: 10%;
            background: #de0620!important;
        }
        .user_card {
            height: 450px;
            width: 350px;
            margin-top: auto;
            margin-bottom: auto;
            background: white;
            position: relative;
            display: flex;
            justify-content: center;
            flex-direction: column;
            padding: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 40px;

        }
        .brand_logo_container {
            position: absolute;
            height: 170px;
            width: 170px;
            top: -80px;
            border-radius: 50%;
            background: #de0620;
            padding: 10px;
            text-align: center;
        }
        .brand_logo {
            height: 145px;
            width: 145px;
            border-radius: 100%;
            border: 0px solid white;
        }
        .form_container {
            margin-top: 100px;
            
        }
        .login_btn {
            width: 100%;
            background:#de0620 !important;
            color: white !important;

        }
        
        .login_container {
            padding: 0 2rem;
        }
        .input-group-text {
            background: #de0620 !important;
            color: white !important;
            border: none !important;
            border-radius: 20rem 0rem 0rem 20rem !important;
        }
        .input_user,
        .input_pass:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }
        .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
            background-color: #c0392b !important;
        }
        input[type=email] {
        border: 1px solid red;
        border-radius: 50px;
        }
        input[type=password] {
        border: 1px solid red;
        border-radius: 50px;
        }
        button[type=submit]{
            border-radius: 30px;
        }

</style>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
    
<head>
    <title>Login | TOKO DIY</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/images/logo.png')}}">
</head>
<!--Coded with love by Mutiullah Samim-->
<body>
    @csrf
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="{{asset('admin/images/logo.png')}}" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form action="#" id="loginForm" method="post">
                         @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                               </div>
                                <input type="email" id="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="username">
                           </div>
                            <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="password" required="">
                            @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                           </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="remember"{{ old('remember') ? 'checked' : '' }} name="remember">
                                    <label class="custom-control-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                </div>
                           </div>
                           <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" class="btn login_btn">{{ __('Login')}}</button>
                          </div>
                            
                        </form>
                </div>
                
                <div class="mt-4">
                    <div class="d-flex justify-content-center links">
                        @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                        @endif
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
