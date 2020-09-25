<!doctype html>
<html lang="tr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="stylesheet" href="{{ mix('assets/web/css/build.css') }}">

		<title>Vox</title>

	</head>
	<body>
		@widget('Web\Header')
		@yield('content')
		@widget('Web\Footer')
		
	<script src="{{ mix("assets/web/js/build.js") }}"></script>
	@yield('js')
	</body>
</html>
