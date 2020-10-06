<!doctype html>
<html lang="tr">
	<head>
		<title>{{ config('haberler.app.title') }}</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
			
		<link rel="stylesheet" href="{{ mix('assets/web/css/build.css') }}">


	</head>
	<body>
		@widget('Web\Header')
		@yield('content')
		@widget('Web\Footer')
		
	<script src="{{ mix("assets/web/js/build.js") }}"></script>
	@yield('js')
	</body>
</html>
