<div name="cabecera">
	<div class="brand">Escuela de Fútbol Onuba</div>
		<div class="address-bar">3481 Melrose Place | Beverly Hills, CA 90210 | 123.456.7890</div>

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
									<li><a href="#"><span class="glyphicon glyphicon-user"></span> Datos Acceso</a></li>
								
									
           
                  		</ul>
</li>
<li>
<a href="<?=site_url("controlador_monitor/pagina_login_monitor");?>"><span class="glyphicon glyphicon-envelope"></span> Admin</a>
</li>
<li>
<a href="<?=site_url("controlador_monitor/pagina_login_monitor");?>"><span class="glyphicon glyphicon-envelope"></span> Mensajes Privados</a>
</li>
<li>
<a href="<?=site_url("controlador_monitor/pagina_login_monitor");?>"><span class="glyphicon glyphicon-calendar"></span> Eventos</a>
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


