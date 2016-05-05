@extends('admin.template.main')

@section('title', 'Login')

@section('content')
	
	{!! Form::open(['route' => 'admin.auth.login', 'method' => 'POST']) !!}
		<div class="from-group">
			{!! Form::label('email', 'Correo Electronico') !!}
			{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com']) !!}
		</div>	
		<div class="from-group">
			{!! Form::label('password', 'Password') !!}
			{!! Form::password('password', ['class' => 'form-control', 'placeholder' => '*************']) !!}
		</div>
		<br>
		<div class="from-group">
			{!! Form::submit('Acceder', ['class' => 'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
	
@endsection

