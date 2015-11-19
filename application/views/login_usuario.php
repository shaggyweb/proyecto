<div class="container">
	<div class="row">
    	<div class="box">
        	<div class="col-lg-12">
            	<hr>
                    <h2 class="intro-text text-center">Login
                        <strong>Usuario</strong>
                    </h2>
                    <hr>
                    	<img class="img-responsive img-border img-left" src="img/intro-pic.jpg" alt="">
                    		<hr class="visible-xs">
              <div class="formulario">
              
              	<form method="post" action="<?=base_url('index.php/controlador_usuarios/login_usuario')?>">
					<table align="center">
						<tr>
							<td>Usuario: </td><td><input type="text"  class ="form-control" name="usuario" value="<?php echo set_value('usuario'); ?>"/>
							</td><td><?php echo form_error('usuario'); ?></td>
						</tr>
						<tr>
							<td>Contraseña: </td><td><input type="text" class ="form-control" name="clave" value="<?php echo set_value('clave'); ?>"/>
							</td><td><?php echo form_error('clave'); ?></td>
						</tr>
						<tr><td><br></td></tr>
						<tr><td align="center" colspan="2"><a href="#">¿Has olvidado tu contraseña?</a></td></tr>
						<tr><td><br></td></tr>
						<tr><td align="center" colspan="2"><input type="submit" class="btn btn-success btn-lg btn-block" name="enviar" value="Ingresar"></td></tr>
					</table>
				</form>
              
              
              
              
              </div>
                    		
    
  </div>
  </div>
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Beautiful boxes
                        <strong>to showcase your content</strong>
                    </h2>
                    <hr>
                    <p>Use as many boxes as you like, and put anything you want in them! They are great for just about anything, the sky's the limit!</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc placerat diam quis nisl vestibulum dignissim. In hac habitasse platea dictumst. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->