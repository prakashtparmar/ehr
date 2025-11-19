<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Login Page - Ace Admin</title>
    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="assets/css/ace.min.css" />

    <style>
        /* Center login vertically */
        body,
        html {
            height: 100%;
            background: #f0f2f5;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .login-container h4 {
            text-align: center;
            margin-bottom: 25px;
        }

        .input-icon-right i {
            right: 10px;
        }

        .toolbar {
            text-align: center;
            margin-top: 15px;
        }

        .toolbar a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>

<body class="login-layout">
    <div class="main-container">
        <div class="login-container">

            <!-- Header -->
            <h4 class="blue" id="id-company-text">&copy; Company Name</h4>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <fieldset>
                    <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="Email" />
                            <i class="ace-icon fa fa-user"></i>
                        </span>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>

                    <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                required autocomplete="current-password" placeholder="Password" />
                            <i class="ace-icon fa fa-lock"></i>
                        </span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>

                    <div class="clearfix mb-3">
                        <label class="inline">
                            <input class="ace" type="checkbox" name="remember"
                                {{ old('remember') ? 'checked' : '' }} />
                            <span class="lbl"> Remember Me</span>
                        </label>

                        <button type="submit" class="btn btn-primary pull-right">
                            <i class="ace-icon fa fa-key"></i> Login
                        </button>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="toolbar">
                            <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                        </div>
                    @endif
                </fieldset>
            </form>

            <!-- Theme Switcher -->
            <div class="toolbar">
                <a id="btn-login-dark" href="#">Dark</a> |
                <a id="btn-login-blur" href="#">Blur</a> |
                <a id="btn-login-light" href="#">Light</a>
            </div>

        </div>
    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'><\/script>");

        jQuery(function ($) {
            // Theme switcher
            $('#btn-login-dark').on('click', function (e) {
                $('body').attr('class', 'login-layout');
                $('#id-company-text').attr('class', 'blue');
                e.preventDefault();
            });
            $('#btn-login-light').on('click', function (e) {
                $('body').attr('class', 'login-layout light-login');
                $('#id-company-text').attr('class', 'blue');
                e.preventDefault();
            });
            $('#btn-login-blur').on('click', function (e) {
                $('body').attr('class', 'login-layout blur-login');
                $('#id-company-text').attr('class', 'light-blue');
                e.preventDefault();
            });
        });
    </script>
</body>

</html>
