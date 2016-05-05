@extends('admin.template.main')

@section('title', 'Listado de imagenes')

@section('content')
	<div class="row">
		@foreach($images as $item)
			<div class="col-md-4">
				<div class="panel panel-default">
				  	<div class="panel-body">
				    	<img src="/images/articles/{{ $item->name }}" class="img-responsive">
				  	</div>
				  	<div class="panel-footer">{{ $item->article->title }}</div>
				</div>
			</div>
		@endforeach
	</div>
	<div class="text-center">
		{!! $images->render() !!}
	</div>
@endsection