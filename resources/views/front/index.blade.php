@extends('front.template.main')

@section('content')
	<h3 class="title-front left">Ultimos Articulos</h3>
	<div class="row">
		<div class="col-md-8">
			<div class="row">
				
				@foreach($articles as $item)

				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-body">
							<a class="thumbnail">
								@foreach($item->images as $image)
									<img class="img-responsive img-article" src="{{ asset('images/articles/' . $image->name) }}" alt="{{ $image->name }}">
								@endforeach
							</a>
							<h3 class="text-center">{{ $item->title }}</h3>
							<hr>
							<i class="fa fa-folder-open-o"></i> <a href="">{{ $item->category->name }}</a>
							<div class="pull-right">
								<i class="fa fa-clock-o"></i> Hace 3 minutos
							</div>
						</div>
					</div>
				</div>
				@endforeach

			</div>
			<div class="text-center">
				{!! $articles->render() !!}
			</div>
		</div>
		<div class="col-md-4 aside">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Categorias</h3>
				</div>
				<div class="panel-body">
					<ul class="list-group">
						<li class="list-group-item">
							<span class="badge">14</span>
							Noticias
						</li>
						<li class="list-group-item">
							<span class="badge">2</span>
							Programación		
						</li>
						<li class="list-group-item">
							<span class="badge">1</span>
							Tips
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="col-md-4 aside">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Tags</h3>
				</div>
				<ul class="list-group">
					<li class="list-group-item">
						<span class="label label-default">Default</span>
					</li>
					<li class="list-group-item">
						<span class="label label-default">Default</span>
					</li>
					<li class="list-group-item">
						<span class="label label-default">Default</span>
					</li>
					<li class="list-group-item">
						<span class="label label-default">Default</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
@endsection