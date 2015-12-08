<div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Zona Privada del Administrador/a
                        <strong><?=$monitor[0]['nombre_monitor']?> <?=$monitor[0]['apellidos']?></strong>
                        
                    </h2>
                    <hr>
                   
					<table align="center">
					<tr>
					<td align="center">
                    
   					
   							<img class="img-responsive img-thumbnail imagen" src="<?= base_url('/Assets/img/'.$monitor[0]['foto'])?>" />
   						
   					
   					</td>
   					</tr>
   					</table>
				</div>
				
				
				
      							
   							
			
			
			</div>
	</div>
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
                        <a href="<?=site_url("controlador_monitor/ver_monitor");?>">
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
                        	<a href="<?=site_url("controlador_monitor/datos_acceso_monitor");?>">
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
                                    <div>Añadir Jugador</div>
                                </div>
                            </div>
                        </div>
                		<a href="<?=site_url("controlador_monitor/anadir_jugador");?>">
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
                                    <div>Añadir Monitor</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?=site_url("controlador_monitor/anadir_monitor");?>">
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
            <div class="row">
             <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <span class="glyphicon glyphicon-plus-sign"></span>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Añadir Eventos</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?=site_url("controlador_eventos/anadir_evento");?>">
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
                                    <span class="glyphicon glyphicon-zoom-in"></span>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Consultar Eventos</div>
                                </div>
                            </div>
                        </div>
                        	<a href="<?=site_url("controlador_eventos/pantalla_buscador");?>">
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
                                    <div>Crear Mensaje Privado</div>
                                </div>
                            </div>
                        </div>
                		<a href="<?=site_url("controlador_mensajes/inicial_mensaje");?>">
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
                                    <div>Consultar Plantillas</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?=site_url("controlador_monitor/mostrar_plantillas");?>">
                             <div class="panel-footer">
                                <span class="pull-left">Acceder</span> 
                           		<span class="pull-right"><span class="glyphicon glyphicon-circle-arrow-right"></span></span>
                           		<div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
              <div class="row">
             <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <span class="glyphicon glyphicon-plus-sign"></span>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Operar con Monitores</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?=site_url("controlador_monitor/listar_monitores_admin");?>">
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
                                    <span class="glyphicon glyphicon-zoom-in"></span>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Consultar Eventos</div>
                                </div>
                            </div>
                        </div>
                        	<a href="<?=site_url("controlador_eventos/consultar_eventos");?>">
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
                                    <div>Crear Mensaje Privado</div>
                                </div>
                            </div>
                        </div>
                		<a href="<?=site_url("controlador_mensajes/inicial_mensaje");?>">
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
                                    <div>Consultar Plantillas</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                             <div class="panel-footer">
                                <span class="pull-left">Acceder</span> 
                           		<span class="pull-right"><span class="glyphicon glyphicon-circle-arrow-right"></span></span>
                           		<div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->



