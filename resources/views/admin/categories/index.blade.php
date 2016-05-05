@extends('admin.template.main')

@section('title', 'Categorias')

@section('content')
	<a href="{{ route('admin.categories.create') }}" class="btn btn-info">Registrar nueva categoria</a>
	<hr>
	<h1>Lista de Categorias</h1>
	<div class="table-responsive">
  		<table class="table">
   			<thead>
   				<th>ID</th>
   				<th>Nombre</th>
   				<th>Acción</th>
   			</thead>
   			<tbody>
   				@foreach($categories as $item)
   					<tr>
   						<td>{{ $item->id }}</td>
	   					<td>{{ $item->name }}</td>
	   					<td>
	   						<a href="{{ route('admin.categories.edit', $item->id) }}" class="btn btn-warning"><i class="glyphicon glyphicon-wrench"></i></a>
	   						<a href="{{ route('admin.categories.destroy', $item->id) }}" onclick="return confirm('¿Seguro que deseas borrar la categoria?')" class="btn btn-danger"><i class="glyphicon glyphicon-remove-circle"></i></a>
	   					</td>
   					</tr>   					
   				@endforeach
   			</tbody>
  		</table>
	</div>
	<div class="text-center">
		{!! $categories->render() !!}
	</div>
	
@endsection