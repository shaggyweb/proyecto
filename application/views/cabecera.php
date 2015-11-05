<div>
	<div class="jumbotron" style="background-image: url(<?= base_url('/Assets/img/fondo4.jpg')?>); background-size: 100%; color: white">

   			<h1>ESCUELA DE FÚTBOL ONUBA</h1>
        
    </div>
	<div name="categorias">
		<nav class="navbar navbar-inverse" role="navigation">
			 <ul class="nav navbar-nav">
			 	<li><a href="<?=site_url()?>">INICIO</a></li>
			 	<li class="dropdown">
			 	<?php foreach ($categoria as $categ) : ?>
                		<li class="dropdown">
                  			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$categ['nombre']?> <span class="caret"></span></a>
                  				<ul class="dropdown-menu">
                  	
				
									<?php foreach ($equipos as $eq) : ?>
									<li><?=$eq['nombre']?></li>
					
									<?php endforeach; ?>
           
                  				</ul>
                  
                		</li>
                <?php endforeach; ?>
                	
				<li><a href="<?=base_url('index.php/controlador_carrito/ver_carrito')?>"><img src="<?= base_url('/Assets/img/carrito2.png')?>"/></a></li>
				<li><a href="<?=site_url("controlador_usuarios/alta");?>">Nuevo Usuario</a></li>
			</ul>
		</nav>
	<div name="form_ingreso">
		<nav class="navbar navbar-default" role="navigation">
			<form  class="navbar-form navbar-left" method="post" action="<?=base_url('index.php/controlador_usuarios/login')?>">
				<table>
					<tr>
						<td>Usuario: </td><td><input type="text" class ="form-control" name="usu" value="<?php echo set_value('usu'); ?>"/>
							<?php echo form_error('usu'); ?></td>
						<td>Clave: </td><td><input type="password" class ="form-control" name="clave" value="<?php echo set_value('clave'); ?>"/>
							<?php echo form_error('clave'); ?></td>
						<td><input type="submit" class="btn btn-primary" name="enviar" value="Ingresar"/></td>
						<td><a href="<?=site_url("controlador_usuarios/reestablecer_pass");?>">Reestablecer Password</a></td>
					</tr>
				</table>
			</form>
		</nav>
	</div>
</div>
