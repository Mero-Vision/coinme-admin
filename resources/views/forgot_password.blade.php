<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('assets/img/fav.png') }}">
    <title>My Crypto</title>
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/adminbootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/style.css') }}">

</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <form class="form-signin" action="#">
                        <div class="account-logo">
                            <a href="index-2.html"><img src="{{url('assets/img/logo_transparent.png')}}" alt=""></a>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Enter Your Email</label>
                            <input type="text" class="form-control" autofocus>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" type="submit">Reset Password</button>
                        </div>
                        <div class="text-center register-link">
                            <a href="{{url('/login')}}">Back to Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ url('assets/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/js/adminbootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/adminapp.js') }}"></script>
</body>

</html>
