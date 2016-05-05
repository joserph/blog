@extends('admin.template.main')

@section('title', 'Editar usuario ' . $user->name)

@section('content')
	<h3><i class="glyphicon glyphicon-wrench"></i> Editar usuario {{ $user->name }}</h3>
	{!! Form::open(['route' => ['admin.users.update', $user], 'method' => 'PUT']) !!}
		<div class="form-group">
			{!! Form::label('name', 'Nombre') !!}
			{!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('email', 'Correo electronico') !!}
			{!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('type', 'Tipo') !!}
			{!! Form::select('type', ['' => 'Selecione en nivel', 'member' => 'Miembro', 'admin' => 'Administrador'], $user->type, ['class' => 'form-control', 'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Editar', ['class' => 'btn btn-warning']) !!}
		</div>
	{!! Form::close() !!}
@endsection