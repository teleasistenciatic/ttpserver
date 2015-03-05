@extends('app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{$titulo}}</div>

                <!-- <div class="panel-body">
                    
                </div>-->
                
                <div class="panel-body">
                    {{$contenido}}
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection
