<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Live Stock Wallpaper's | LSW's</title>
    {{-- Tell the browser to be responsive to screen width --}}
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{-- Bootstrap 3.3.7 --}}
    <link rel="stylesheet" href="{{ asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('admin/bower_components/font-awesome/css/font-awesome.min.css') }}">
    {{-- Ionicons --}}
    <link rel="stylesheet" href="{{ asset('admin/bower_components/Ionicons/css/ionicons.min.css') }}">
    {{-- Theme style --}}
    <link rel="stylesheet" href="{{ asset('admin/css/AdminLTE.min.css') }}">
    {{-- iCheck --}}
    <link rel="stylesheet" href="{{ asset('admin/plugins/iCheck/square/blue.css') }}">

    {{-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --}}
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo"><a href="."><b>Live</b>Stock Wallpaper's</a></div>
        <!-- /.login-logo -->
        <div class="register-box-body">
            <p class="login-box-msg">Register a new membership</p>
            {!! Form::open(['route' => 'login', 'method' => 'POST', 'files' => true]) !!}
                <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::text('name', old('name'), ['id' => 'name', 'class' => "form-control", 'placeholder' => "Name", 'autofocus' => 'true', 'required' => "required"]) !!}
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                    {!! Form::email('email', old('email'), ['id' => 'email', 'class' => "form-control", 'placeholder' => "Email", 'autofocus' => 'true', 'required' => "required"]) !!}
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                    {!! Form::text('phone', old('phone'), ['id' => 'phone', 'class' => "form-control", 'placeholder' => "phone", 'autofocus' => 'true', 'required' => "required"]) !!}
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                    {!! Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => "Password", 'required' => "required"]) !!}
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                {!! old('terms') ? Form::checkbox('terms', '1') : Form::checkbox('terms', '1', ['checked' => 'checked']) !!}  I agree to the <a href="#">terms
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        {!! Form::submit('Register', ['class' => "btn btn-primary btn-block btn-flat"]) !!}
                    </div>
                    <!-- /.col -->
                </div>
            {!! Form::close() !!}
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
    <!-- jQuery 3 -->
    <script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('admin/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>
