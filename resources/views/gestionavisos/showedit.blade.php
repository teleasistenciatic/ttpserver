@extends('app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Gestión de avisos</div>

                <div class="panel-body">
                    Información de un aviso:<hr>
                    <ul>
                        <li>Hora del aviso: <b>{{ $aviso['time'] }}</b></li>
                        <li>Teléfono: <b>{{ $aviso['number'] }}</b></li>                        
                        <li>Beneficiario: <b>{{ $aviso['name'] }}</b></li>
                        <li>Estado: <b>{{ $aviso['statusname'] }}</b></li>                        
                    </ul>
                </div>
                
                <div class="panel-body">
                    Operaciones sobre el aviso:<hr>
                    <ul>
                        <li><a href="/gestionavisos/delete/{{ $aviso['id'] }}">Borrar el aviso</a></li>
                        <li><a href="/gestionavisos/setstatus/{{ $aviso['id'] }}/0">Marcar el aviso como <b>pendiente</b></a></li>                        
                        <li><a href="/gestionavisos/setstatus/{{ $aviso['id'] }}/1">Marcar el aviso como <b>atendido</b></a></li>   
                        <li><a href="/gestionavisos/setstatus/{{ $aviso['id'] }}/3">Marcar el aviso como <b>falsa alarma</b></a></li>                            
                                         
                    </ul>
                </div>    
                <div class="panel-heading">
                    <a href="{{ URL::previous() }}"><b>Volver</b></a>
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection
