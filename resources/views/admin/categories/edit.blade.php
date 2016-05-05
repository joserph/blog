@extends('admin.template.main')

@section('title', 'Editar categoria ' . $category->name)

@section('content')
	<h3><i class="glyphicon glyphicon-wrench"></i> Editar categoria {{ $category->name }}</h3>
	{!! Form::open(['route' => ['admin.categories.update', $category], 'method' => 'PUT']) !!}
		<div class="form-group">
			{!! Form::label('name', 'Nombre') !!}
			{!! Form::text('name', $category->name, ['class' => 'form-control', 'placeholder' => 'Nombre de la categoria', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Editar', ['class' => 'btn btn-warning']) !!}
		</div>
	{!! Form::close() !!}
@endsection