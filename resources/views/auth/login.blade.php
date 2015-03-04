@extends('app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                
                <div class="panel-heading">Acceso identificado</div>
                
                <div class="panel-body">
                    
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Error</strong> Hay algunos problemas con sus datos.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="/auth/login">
                        
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Correo electrónico</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Clave</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Recuérdeme
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                                    Login
                                </button>

                                <a href="/password/email">¿Olvidó su password?</a>
                            </div>
                        </div>
                    </form>
                    
                </div> <!-- Panel body -->
                
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<p align="center">Teleasistenci@TIC+</p>
@endsection
