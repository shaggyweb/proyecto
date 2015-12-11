<div name="cabecera">
	<div class="brand">Escuela de Fútbol Onuba</div>
		<div class="address-bar">Polideportivo Municipal | Corrales | Tlfno 959345678</div>

		<!-- Navigation -->
			<nav class="navbar navbar-default" role="navigation">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    			<span class="sr-only">Toggle navigation</span>
                    			<span class="icon-bar"></span>
                    			<span class="icon-bar"></span>
                    			<span class="icon-bar"></span>
                    		</button>
                    			<!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                    				<a class="navbar-brand" href="index.html">Escuela de Fútbol Onuba</a>
                    	</div>
                    	<!-- Collect the nav links, forms, and other content for toggling -->
                    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    			<ul class="nav navbar-nav">
                    				<li>
										<a href="<?=site_url("controlador_monitor/portada_administrador");?>"><span class="glyphicon glyphicon-home"></span> Inicio</a>
</li>
<li>
<li>

                		<li class="dropdown">
                  			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-tasks"></span> Datos<span class="caret"></span></a>
                  				<ul class="dropdown-menu">
                  	
				
									
									<li><a href="<?=site_url("controlador_monitor/ver_monitor");?>"><span class="glyphicon glyphicon-list-alt"></span> Datos Personales</a></li>
									<li><a href="<?=site_url("controlador_monitor/datos_acceso_monitor");?>"><span class="glyphicon glyphicon-user"></span> Datos Acceso</a></li>
								
									
           
                  		</ul>
</li>
<li>

                		<li class="dropdown">
                  			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-briefcase"></span> Monitores<span class="caret"></span></a>
                  				<ul class="dropdown-menu">
                  	
				
									
									<li><a href="<?=site_url("controlador_monitor/anadir_monitor");?>"><span class="glyphicon glyphicon-plus-sign"></span> Añadir Monitor</a></li>
									<li><a href="<?=site_url("controlador_monitor/listar_monitores_admin");?>"><span class="glyphicon glyphicon-trash"></span> Borrar Monitor</a></li>
								
									
           
                  		</ul>
</li>
<li>
<a href="<?=site_url("controlador_mensajes/inicial_mensaje");?>"><span class="glyphicon glyphicon-envelope"></span> Mensajes Privados</a>
</li>
<li>

                		<li class="dropdown">
                  			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-calendar"></span> Eventos<span class="caret"></span></a>
                  				<ul class="dropdown-menu">
                  	
				
									
									<li><a href="<?=site_url("controlador_eventos/anadir_evento");?>"><span class="glyphicon glyphicon-plus-sign"></span> Añadir Evento</a></li>
									<li><a href="<?=site_url("controlador_eventos/pantalla_buscador");?>"><span class="glyphicon glyphicon-zoom-in"></span> Consultar Eventos</a></li>
								
									
           
                  		</ul>
</li>
<li>

                		<li class="dropdown">
                  			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Jugadores<span class="caret"></span></a>
                  				<ul class="dropdown-menu">
                  	
				
									
									<li><a href="<?=site_url("controlador_monitor/anadir_jugador");?>"><span class="glyphicon glyphicon-plus-sign"></span> Añadir Jugador</a></li>
									<li><a href="<?=site_url("controlador_monitor/mostrar_plantillas");?>"><span class="glyphicon glyphicon-th-list"></span> Consultar Plantillas</a></li>
									<li><a href="<?=site_url("controlador_monitor/mostrar_plantillas");?>"><span class="glyphicon glyphicon-book"></span> Historial Jugadores</a></li>
								
									
           
                  		</ul>
</li>
<li>
<a href="<?=site_url("controlador_monitor/logout_monitor");?>"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</a>
</li>
</ul>
</div>
<!-- /.navbar-collapse -->
</div>
<!-- /.container -->
</nav>
</div>


