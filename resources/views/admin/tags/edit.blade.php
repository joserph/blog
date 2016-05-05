@extends('admin.template.main')

@section('title', 'Editar tag')

@section('content')
	{!! Form::open(['route' => ['admin.tags.update', $tag], 'method' => 'PUT']) !!}
		<div class="form-group">
			{!! Form::label('name', 'Nombre') !!}
			{!! Form::text('name', $tag->name, ['class' => 'form-control', 'placeholder' => 'Nombre del tag', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Editar', ['class' => 'btn btn-warning']) !!}
		</div>
	{!! Form::close() !!}
@endsection