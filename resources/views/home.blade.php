@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Atención de avisos</div>

				<div class="panel-body">
                                    <ul>
                                        <li><a href="gestionavisos">- Lista de avisos activos</a></li>
                                        <li><a href="gestionavisos/list">- Lista histórica de todos los avisos</a></li>
                                        <li><a href="gestionavisos/panelcreate">- Crear nuevo aviso</a></li>                                                                            
                                    </ul>
				</div>   
                                
                                <div class="panel-heading">Registro de beneficiarios</div>
                                
				<div class="panel-body">
                                    <ul>
                                        <li><a href="gestionbeneficiarios">- Lista de beneficiarios</a></li>
                                        <li><a href="gestionavisos/create">- Dar de alta nuevo beneficiario</a></li>
                                    </ul>
				</div>         
                                
                                <div class="panel-heading">Funciones administrativas</div>
                                
				<div class="panel-body">
                                    <ul>
                                       <li><a href="gestionavisos/clearlist">- Borrar lista completa de avisos</a></li>    
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
