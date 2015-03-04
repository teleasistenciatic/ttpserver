@extends('app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Gestión de avisos</div>

                <div class="panel-body">
                    Listado de todos los avisos <b>activos</b>:<hr>
                    
                    <div class="tabla" >
                        <table>
                            <tr>
                                <td>Hora y fecha</td>
                                <td>Número de teléfono</td>
                                <td>Beneficiario</td>  
                            </tr>                      

                            @foreach ($listaAvisos as $aviso)

                            <tr class='clickable-row' data-href='gestionavisos/showedit/{{ $aviso['id'] }}'>
                                <td>{{ $aviso['time'] }}</td>
                                <td>{{ $aviso['number'] }}</td>
                                <td>{{ $aviso['name'] }}</td>
                            </tr>

                            @endforeach
                        </table>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
