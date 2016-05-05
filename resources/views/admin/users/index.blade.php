@extends('admin.template.main')

@section('title', 'Lista de usuarios')

@section('content')
	<a href="{{ route('admin.users.create') }}" class="btn btn-info">Registrar nuevo usuario</a>
	<hr>
	<h1>Lista de Usuarios</h1>
	<div class="table-responsive">
  		<table class="table">
   			<thead>
   				<th>ID</th>
   				<th>Nombre</th>
   				<th>Correo</th>
   				<th>Nivel</th>
   				<th>Acción</th>
   			</thead>
   			<tbody>
   				@foreach($users as $item)
   					<tr>
   						<td>{{ $item->id }}</td>
	   					<td>{{ $item->name }}</td>
	   					<td>{{ $item->email }}</td>
	   					<td>
							@if($item->type == "admin")
	   							<span class="label label-danger">{{ $item->type }}</span>
	   						@else
								<span class="label label-primary">{{ $item->type }}</span>
	   						@endif
	   					</td>
	   					<td>
	   						<a href="{{ route('admin.users.edit', $item->id) }}" class="btn btn-warning"><i class="glyphicon glyphicon-wrench"></i></a>
	   						<a href="{{ route('admin.users.destroy', $item->id) }}" onclick="return confirm('¿Seguro que deseas borrar el usuario?')" class="btn btn-danger"><i class="glyphicon glyphicon-remove-circle"></i> </a>
	   					</td>
   					</tr>   					
   				@endforeach
   			</tbody>
  		</table>
	</div>
	<div class="text-center">
		{!! $users->render() !!}
	</div>	
@endsection