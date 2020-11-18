@extends('auth-theme.index')
@section('content')
<!-- Sing in  Form -->
<section style="margin-top: 20px" class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="{{ asset('login/images/signin-image.jpg') }}" alt="sing up image"></figure>
                <a href="{{ url('/dang-ky') }}" class="signup-image-link">Create an account</a>
            </div>

            <div class="signin-form">
                <h2 class="form-title">Sign up</h2>
                @if(Session::has('flash_message_error'))
                    <div class="alert alert-danger">
                        {{ Session::get('flash_message_error') }}
                    </div>
                @endif
                @if(Session::has('flash_message_success'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message_success') }}
                    </div>
                @endif
                <form method="POST" class="register-form" id="login-form" action="{{ url('/dang-nhap') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="email" id="email" placeholder="Email"/>
                        @if ($errors->has('email'))
                            <span style="color: red;">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="password" placeholder="Password"/>
                        @if ($errors->has('password'))
                            <span style="color: red;">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
