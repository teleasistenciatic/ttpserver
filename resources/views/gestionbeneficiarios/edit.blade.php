@extends('app')

@section('content')

<ul>
    @foreach($errors->all() as $error)
    <li></li>
    @endforeach
</ul>

<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">Editar beneficiario/a</div>

        <div class="panel-body">
            {!! Form::open(array('route' => 'gestionbeneficiarios/editstore', 'class' => 'form')) !!}
            
            <div class="form-group">
                {!! Form::label('Nombre y apellidos') !!}

                {!! Form::text('name', $beneficiario['name'],
                array('class'=>'form-control', 'required' )) 
                !!}
            </div>     
            
            <div class="form-group">
                {!! Form::hidden('number', $beneficiario['number'],
                array('class'=>'form-control' )) 
                !!}
            </div>             
            
            <div class="form-group">
                {!! Form::submit('Crear nuevo aviso', 
                array('class'=>'btn btn-primary')) !!}
            </div>            

            {!! Form::close() !!}
        </div> 
        
        <div class="panel-heading">
            <a href="/home"><b>Volver</b></a>
        </div>   
        
    </div>


    @endsection