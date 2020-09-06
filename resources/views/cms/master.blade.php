<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <title>ADMİN LTE</title>

  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="{{ asset('cms/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('cms/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('cms/bower_components/Ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('cms/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('cms/dist/css/skins/skin-blue.min.css') }}">
  <link href="{{ asset('cms/bower_components/select2/dist/css/select2.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link href="{{ asset('cms/bower_components/select2/dist/css/select2.css') }}" rel="stylesheet" />
    <link href="{{ asset('cms/bower_components/multiselect/dist/css/multi-select.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('cms/custom/css/custom.css') }}">







    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>


</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      @widget('cms.header')

      @widget('cms.sidebar')

      @yield('content')

      @widget('cms.footer')

    </div>

    @if(session()->has('success'))
        <script>alertify.success('{{ session('success') }}')</script>
    @endif
    @if(session()->has('error'))
        <script>alertify.error('{{ session('success') }}')</script>
    @endif
    @foreach($errors->all() as $error)
        <script>alertify.error('{{ $error }}')</script>
    @endforeach

    <script src="{{ mix("assets/cms/js/build.js") }}"></script>

    <!-- Bower_components -->
    <script src="{{ asset('cms/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('cms/bower_components/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('cms/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('cms/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('cms/bower_components/select2/dist/js/select2.js') }}"></script>
    <script src="{{ asset('cms/bower_components/multiselect/dist/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('cms/bower_components/ckeditor/ckeditor.js') }}"></script>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    @yield('js')
</body>
</html>
