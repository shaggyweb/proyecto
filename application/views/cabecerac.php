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
										<a href="<?=base_url()?>"> <span class="glyphicon glyphicon-home"></span> Inicio</a>
</li>
<li>

                		<li class="dropdown">
                  			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-tasks"></span> Categorías<span class="caret"></span></a>
                  				<ul class="dropdown-menu">
                  	
				
									<?php foreach ($categoria as $cat) : ?>
									<li><a href="<?= site_url('/controlador_equipos/ver_equipos_cat/'.$cat['idtipo'])?>"><?=$cat['nombre_categoria']?></a></li>
								
									<?php endforeach; ?>
           
                  		</ul>
</li>
<li>
<a href="<?=site_url("controlador_eventos/ver_eventos");?>"><span class="glyphicon glyphicon-calendar"></span> Eventos</a>
</li>
<li>
<a href="<?=site_url("controlador_monitor/listar_monitores");?>"><span class="glyphicon glyphicon-lock"></span> Monitores</a>
</li>
<li>
<a href="<?=site_url("controlador_usuarios/pagina_login");?>"><span class="glyphicon glyphicon-log-in"></span> Login</a>
</li>
<li>
<a href="<?=site_url("controlador_monitor/login_monitor");?>"><span class="glyphicon glyphicon-warning-sign"></span> A.Privada</a>
</li>

</ul>
</div>
<!-- /.navbar-collapse -->
</div>
<!-- /.container -->
</nav>
</div>
