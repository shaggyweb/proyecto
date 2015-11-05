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
										<a href="<?=base_url()?>">Inicio</a>
</li>
<li>

                		<li class="dropdown">
                  			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categorías<span class="caret"></span></a>
                  				<ul class="dropdown-menu">
                  	
				
									<?php foreach ($categoria as $cat) : ?>
									<li><a href="<?= site_url('/controlador_equipos/ver_equipos_cat/'.$cat['idtipo'])?>"><?=$cat['nombre_categoria']?></a></li>
								
									<?php endforeach; ?>
           
                  		</ul>
</li>
<li>
<a href="<?=site_url("controlador_eventos/ver_eventos");?>">Eventos</a>
</li>
<li>
<a href="<?=site_url("controlador_usuarios/pagina_login");?>">Ingresar</a>
</li>
<li>
<a href="<?=site_url("controlador_monitor/pagina_login_monitor");?>">Zona Privada</a>
</li>
</ul>
</div>
<!-- /.navbar-collapse -->
</div>
<!-- /.container -->
</nav>
</div>
