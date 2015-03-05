@extends('app')

@section('content')

<ul>
    @foreach($errors->all() as $error)
        <li></li>
    @endforeach
</ul>

{!! Form::open(array('route' => 'gestionavisos/panelcreatestore', 'class' => 'form')) !!}

<div class="form-group">
    {!! Form::label('Teléfono beneficiario') !!}
    {!! Form::text('number', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'')) !!}
</div>

<div class="form-group">
    {!! Form::label('Fecha y Hora') !!}
    {!! Form::text('time', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'YYYY-MM-DD HH:MM:SS')) !!}
</div>

<div class="form-group">
    {!! Form::label('Estado') !!}
    {!! Form::text('status', null, 
        array('required',
              'class'=>'form-control', 
              'placeholder'=>'0')) !!}
</div>

<div>Estados posibles: 0 - Pendiente, 1 - Atendido, 3 - Falso aviso</div><br>

<div class="form-group">
    {!! Form::submit('Crear nuevo aviso', 
      array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}

@endsection