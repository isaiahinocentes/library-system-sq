<!DOCTYPE html>
<html lang="en">
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" href="{{ URL::asset('css/LoginStyle.css') }}">
</head>
<body class="main">
<div class="login-screen"></div>
<div class="login-center">
    <div class="container min-height" style="margin-top: 20px;">
        <div class="row">
            <div class="col-xs-4 col-md-offset-8">
                <div class="login" id="card">
                    <div class="front signin_form">
                        <p>Login Your Account</p>

                        {{--Form Field--}}
                        <form class="login-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            {{--email Field--}}
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                    <span class="input-group-addon">
                                          <i class="glyphicon glyphicon-user"></i>
                                    </span>


                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                            {{--Password Field--}}
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    <span class="input-group-addon">
                                          <i class="glyphicon glyphicon-lock"></i>
                                    </span>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>

                            {{--Remember Me--}}
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                </label>
                            </div>

                            <div class="form-group sign-btn">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                {{--Forgot Passwird--}}
                                {{--<p><a href="#" class="forgot">Can't access your account?</a></p>--}}

                                {{--Sign up--}}
                                <p>
                                    <strong>New to TimeInfo?</strong>
                                    <br>
                                    <a href="#" id="flip-btn" class="signup signup_link">
                                        Sign up for a new account</a>
                                </p>
                            </div>
                        </form>
                    </div>

                    {{--Sign up view--}}
                    <div class="back signup_form" style="opacity: 0;">
                        <p>Sign Up for Your New Account</p>

                        {{--Sign up form--}}
                        <form class="login-form">
                            @csrf
                            {{--username field - change to --}}
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Username">
                                    <span class="input-group-addon">
                                          <i class="glyphicon glyphicon-user"></i>
                                      </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Password">
                                    <span class="input-group-addon">
                                          <i class="glyphicon glyphicon-lock"></i>
                                      </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="confirm password" class="form-control" placeholder="Confirm Password">
                                    <span class="input-group-addon">
                                          <i class="glyphicon glyphicon-lock"></i>
                                      </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Email">
                                    <span class="input-group-addon">
                                          <i class="glyphicon glyphicon-envelope"></i>
                                      </span>
                                </div>
                            </div>

                            <div class="form-group sign-btn">
                                <input type="submit" class="btn" value="Sign up">
                                <br><br>
                                <p>You have already Account So <a href="#" id="unflip-btn" class="signup">Log in</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Flip/1.0.18/jquery.flip.js"></script>

</body>
</html>

<script>

    $().ready(function() {
        $("#card").flip({
            trigger: 'manual'
        });
    });


    $(".signup_link").click(function() {

        $(".signin_form").css('opacity', '0');
        $(".signup_form").css('opacity', '100');


        $("#card").flip(true);

        return false;
    });

    $("#unflip-btn").click(function(){

        $(".signin_form").css('opacity', '100');
        $(".signup_form").css('opacity', '0');

        $("#card").flip(false);

        return false;

    });
</script>
