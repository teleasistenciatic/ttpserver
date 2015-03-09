@extends('app')

@section('content')

<ul>
    @foreach($errors->all() as $error)
    <li></li>
    @endforeach
</ul>

<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">Crear nuevo aviso</div>

        <div class="panel-body">
            {!! Form::open(array('route' => 'gestionavisos/panelcreatestore', 'class' => 'form')) !!}

            <div class="form-group">

                <select name="number">

                    <option value="-1" selected>(seleccionar un beneficiario:)</option>

                    @foreach ($ben as $d)
                    <option value="{{ $d['number'] }}">{{ $d['name'] }}</option>
                    @endforeach

                </select>

            </div>

            <div class="form-group">
                {!! Form::label('Fecha y Hora') !!}

                {!! Form::text('time', $timedate ,
                array('class'=>'form-control', 
                'placeholder'=> $timedate )) !!}
            </div>

            <div class="form-group">

                <select name="status">

                    <option value="-1" selected>(seleccionar un estado:)</option>

                    @foreach ($status as $d)
                    <option value="{{ $d['id'] }}">{{ $d['name'] }}</option>
                    @endforeach

                </select>

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