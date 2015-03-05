@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Panel de control</div>

				<div class="panel-body">
                                    <ul>
                                        <li><a href="gestionavisos">- Gestión de avisos activos</a></li>
                                        <li><a href="gestionavisos/list">- Lista histórica de todos los avisos</a></li>
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
