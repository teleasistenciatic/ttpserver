@extends('app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Gestión de beneficiarios/as</div>

                <div class="panel-body">
                    <hr>
                    <ul>
                        <li>Nombre: <b>{{ $beneficiario['name'] }}</b></li>
                        <li>Teléfono: <b>{{ $beneficiario['number'] }}</b></li>                                            
                    </ul>
                </div>
                
                <div class="panel-body">
                    Operaciones sobre el/la beneficiario/a:<hr>
                    <ul>
                        <li><a href="/gestionbeneficiarios/delete/{{ $beneficiario['number'] }}">Borrar el beneficiario/a (se borrarán los avisos relacionados)</a></li>                                       
                    </ul>
                </div>    
                <div class="panel-heading">
                    <a href="/gestionbeneficiarios"><b>Volver</b></a>
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection