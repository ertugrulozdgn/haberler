<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="cms/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="cms/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="cms/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="cms/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="cms/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href=""><b>Admin Paneli</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Kullanıcı Email ve Şifrenizi Giriniz.</p>


        @if(Session::has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div id="response-status"></div>

        {{ Form::open([
            'url' => action('Cms\Auth\LoginController@login'),
            'method' => 'POST',
            'onsubmit' => "return SendForm.init(this, '". $form_referrer . "');"
            ])
        }}

        <div class="form-group has-feedback">
            {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail'])}}
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Şifre'] )}}
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck"> 
                    {{ Form::checkbox('remember') }}
                    Beni Hatırla
                </div>
            </div>
            <div class="col-xs-4">
                {{ Form::submit('Giriş', ['class' => 'btn btn-primary btn-block btn-flat'])}}
            </div>
        </div>
        {{ Form::close()}}
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="cms/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="cms/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="cms/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>

