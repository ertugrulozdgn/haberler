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

    
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="{{ asset('cms/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/dist/css/skins/skin-blue.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/custom/css/custom.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/cms/css/build.css') }}">




</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      @widget('cms.header')

      @widget('cms.sidebar')

      @yield('content')

      @widget('cms.footer')

    </div>


    <script src="https://cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>
    <script src="{{ mix("assets/cms/js/build.js") }}"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="{{ asset('cms/dist/js/adminlte.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    @yield('js')


    @if(session()->has('success'))
        <script>alertify.success('{{ session('success') }}')</script>
    @endif
    @if(session()->has('error'))
        <script>alertify.error('{{ session('success') }}')</script>
    @endif
    @foreach($errors->all() as $error)
        <script>alertify.error('{{ $error }}')</script>
    @endforeach
</body>
</html>
