@extends('app')

@section('content')

<ul>
    @foreach($errors->all() as $error)
    <li></li>
    @endforeach
</ul>

<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">Crear nuevo beneficiario/a</div>

        <div class="panel-body">
            {!! Form::open(array('route' => 'gestionbeneficiarios/panelcreatestore', 'class' => 'form')) !!}

            <div class="form-group">
                {!! Form::label('Número de teléfono') !!}

                {!! Form::text('number', null ,
                array('class'=>'form-control', 'required') ) 
                !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('Nombre y apellidos') !!}

                {!! Form::text('name', null ,
                array('class'=>'form-control', 'required' )) 
                !!}
            </div>            

            <div class="form-group">
                {!! Form::submit('Crear nuevo beneficiario/a', 
                array('class'=>'btn btn-primary')) !!}
            </div>
            {!! Form::close() !!}
        </div> 
        
        <div class="panel-heading">
            <a href="/home"><b>Volver</b></a>
        </div>   
        
    </div>


    @endsection