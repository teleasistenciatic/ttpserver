@extends('app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Gestión de beneficiarios/as</div>

                <div class="panel-body">
                    Listado de todos los beneficiarios/as :<hr>
                    
                    <div class="tabla" >
                        <table>
                            <tr>
                                <td>Nombre</td>
                                <td>Número de teléfono</td>                              
                            </tr>                      

                            @foreach ($listaBeneficiarios as $beneficiario)

                            <tr class='clickable-row' data-href='/gestionbeneficiarios/showedit/{{ $beneficiario['number'] }}'>
                                <td>{{ $beneficiario['name'] }}</td>
                                <td>{{ $beneficiario['number'] }}</td>                            
                            </tr>

                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="panel-heading">
                    <a href="/home"><b>Volver</b></a>
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection
