<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title', 'Default') | Panel de Administración</title>
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/trumbowyg/ui/trumbowyg.css') }}">
</head>
<body>
	<div class="container">
		@include('admin.template.partials.nav')
		<section>
			@include('flash::message')
			@include('admin.template.partials.errors')
			@yield('content')
		</section>

		<footer>
			<div id="footer">
     			<div class="container">
        			<p class="text-muted credit">Todos los derechos reservados @ {{ $anio = date('Y') }}</p>
      			</div>
    		</div>
		</footer>
		<script src="{{ asset('plugins/jquery/jquery-2.2.0.js') }}"></script>
		<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
		<script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
		<script src="{{ asset('plugins/trumbowyg/trumbowyg.js') }}"></script>
	</div>
	@yield('js')
</body>
</html>