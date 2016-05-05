<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title', 'Home') | Blog Joserph</title>
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/journal/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('css/general.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/font-awesome-4.5.0/css/font-awesome.min.css') }}">
</head>
<body>
	<header>
		@include('front.template.partials.header')
	</header>
	<div class="container">
		@yield('content')
		<footer>
			<hr>
			Todos los derechos reservados &copy {{ date('Y') }}
			<div class="pull-right">José Pérez</div>
		</footer>
	</div>

	<script src="{{ asset('plugins/jquery/jquery-2.2.0.js') }}"></script>
</body>
</html>