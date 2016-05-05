@extends('admin.template.main')

@section('title', 'Lista de Articulos')

@section('content')
	<a href="{{ route('admin.articles.create') }}" class="btn btn-info">Registrar nuevao articulo</a>
	<!-- BUSCADOR DE ARTICULOS -->
      	{!! Form::open(['route' => 'admin.articles.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
         	<div class="input-group">
	            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Buscar articulo...', 'aria-describedby' => 'search', 'autofocus'=>'autofocus']) !!}
	            <span class="input-group-btn">
	               	<button class="btn btn-addon" id="search" type="submit"><i class="glyphicon glyphicon-search" aria-hidden="true"></i></button>
	            </span>
         	</div>
      	{!! Form::close() !!}
   	<!-- FIN DE BUSCADOR -->
   	<hr>
	<div class="table-responsive">
  		<table class="table">
    		<thead>
    			<th>ID</th>
    			<th>Título</th>
    			<th>Categoria</th>
    			<th>User</th>
    			<th>Acción</th>
    		</thead>
    		<tbody>
    			@foreach($articles as $item)
					<tr>
						<td>{{ $item->id }}</td>
						<td>{{ $item->title }}</td>
						<td>{{ $item->category->name }}</td>
						<td>{{ $item->user->name }}</td>
						<td>
							<a href="{{ route('admin.articles.edit', $item->id) }}" class="btn btn-warning"><i class="glyphicon glyphicon-wrench"></i></a>
	   						<a href="{{ route('admin.articles.destroy', $item->id) }}" onclick="return confirm('¿Seguro que deseas borrar el articulo?')" class="btn btn-danger"><i class="glyphicon glyphicon-remove-circle"></i></a>
						</td>
					</tr>
    			@endforeach
    		</tbody>
  		</table>
	</div>
	<div class="text-center">
		{!! $articles->render() !!}
	</div>
@endsection