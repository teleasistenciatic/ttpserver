<html>
    <head>
        <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

        <style>
            body {
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: top;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
                margin-bottom: 40px;
            }

            .quote {
                font-size: 24px;
            }

            .toplogin {
                text-align: right;
                margin-right: 50px;
            }
        </style>
    </head>

    <body>                
        <div class="container">

            @if (Auth::guest())
                <div class="toplogin"><a href="auth/login" ><b>Acceso identificado</b> </a></div>  
            @else

            <div class="toplogin"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a></div>

            @endif

            <div class="content">
                <div><img src="img\logo_teleasistencia.jpg" width ="300"></div>                       
                <div class="title">Teleasistenci@TIC+</div>
                <div class="quote">Tecnología para personas</div>
                <div><a href="http://www.magtel.es/fundacion-magtel.php?mn=6" target="new"><img src="img\logo_fundacion_magtel.png" width ="250"></a></div>                                                                                              
                <div>Departamento salud y bienestar social</div>
                <!-- <div class="quote">{{ Inspiring::quote() }}</div> -->
            </div>
        </div>
    </body>
</html>
