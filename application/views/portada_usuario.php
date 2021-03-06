<div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Zona Privada del Alumno/a
                        <strong><?=$usuario[0]['nombre_jugador']." ".$usuario[0]['apellidos_jugador']?></strong>
                    </h2>
                    <hr>
                    
                    <hr class="visible-xs">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Opciones
                        <strong>Permitidas</strong>
                    </h2>
                    <hr>
             <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <span class="glyphicon glyphicon-list-alt"></span>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Datos Personales</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?=site_url("controlador_usuarios/ver_usuario");?>">
                        <div class="panel-footer">
                           <span class="pull-left">Acceder</span> 
                           <span class="pull-right"><span class="glyphicon glyphicon-circle-arrow-right"></span></span>
                           <div class="clearfix"></div>
                        </div> 
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <span class="glyphicon glyphicon-user"></span>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Datos de Acceso</div>
                                </div>
                            </div>
                        </div>
                        	<a href="<?=site_url("controlador_usuarios/datos_acceso_usuario");?>">
                            <div class="panel-footer">
                                <span class="pull-left">Acceder</span> 
                           		<span class="pull-right"><span class="glyphicon glyphicon-circle-arrow-right"></span></span>
                           		<div class="clearfix"></div>
                            </div>
                           </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <span class="glyphicon glyphicon-envelope"></span>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Mensajes Privados</div>
                                </div>
                            </div>
                        </div>
                		<a href="<?=site_url("controlador_usuarios/lista_mensajes");?>">
                            <div class="panel-footer">
                                <span class="pull-left">Acceder</span> 
                           		<span class="pull-right"><span class="glyphicon glyphicon-circle-arrow-right"></span></span>
                           		<div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Consultar Eventos</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?=site_url("controlador_eventos/eventos_jugador");?>">
                             <div class="panel-footer">
                                <span class="pull-left">Acceder</span> 
                           		<span class="pull-right"><span class="glyphicon glyphicon-circle-arrow-right"></span></span>
                           		<div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

