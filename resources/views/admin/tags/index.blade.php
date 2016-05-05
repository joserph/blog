@extends('admin.template.main')

@section('title', 'Listado de tags')

@section('content')
	<a href="{{ route('admin.tags.create') }}" class="btn btn-info">Crear nuevo tag</a>
   <!-- BUSCADOR DE TAGS -->
      {!! Form::open(['route' => 'admin.tags.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
         <div class="input-group">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar tag...', 'aria-describedby' => 'search', 'autofocus'=>'autofocus']) !!}
            <span class="input-group-btn">
               <button class="btn btn-addon" id="search" type="submit"><i class="glyphicon glyphicon-search" aria-hidden="true"></i></button>
            </span>
         </div>
      {!! Form::close() !!}
   <!-- FIN DE BUSCADOR -->
   <hr>
	<h1>Lista de Tags</h1>
	<div class="table-responsive">
  		<table class="table">
   			<thead>
   				<th>ID</th>
   				<th>Nombre</th>
   				<th>Acción</th>
   			</thead>
   			<tbody>
   				@foreach($tags as $item)
   					<tr>
   						<td>{{ $item->id }}</td>
	   					<td>{{ $item->name }}</td>
	   					<td>
	   						<a href="{{ route('admin.tags.edit', $item->id) }}" class="btn btn-warning"><i class="glyphicon glyphicon-wrench"></i></a>
	   						<a href="{{ route('admin.tags.destroy', $item->id) }}" onclick="return confirm('¿Seguro que deseas borrar el tag?')" class="btn btn-danger"><i class="glyphicon glyphicon-remove-circle"></i></a>
	   					</td>
   					</tr>   					
   				@endforeach
   			</tbody>
  		</table>
	</div>
	<div class="text-center">
		{!! $tags->render() !!}
	</div>
@endsection