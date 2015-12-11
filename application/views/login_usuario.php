<div class="container">
	<div class="row">
    	<div class="box">
        	<div class="col-lg-12">
            	<hr>
                    <h2 class="intro-text text-center">Login
                        <strong>Usuario</strong>
                    </h2>
                    <hr>
                    
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
						<tr><td colspan="2"><br><span class="text-danger"><?php if (isset($error)) echo $error; ?></span></td></tr>
						<tr><td align="center" colspan="2"><a href="<?=site_url("controlador_usuarios/reestablecer_pass_usuario");?>">¿Has olvidado tu contraseña?</a></td></tr>
						<tr><td><br></td></tr>
						<tr><td align="center" colspan="2"><input type="submit" class="btn btn-success btn-lg btn-block" name="enviar" value="Ingresar"></td></tr>
					</table>
				</form>
              
              
              
              
              </div>
                    		
    
  </div>
  </div>
       

    </div>
    <!-- /.container -->