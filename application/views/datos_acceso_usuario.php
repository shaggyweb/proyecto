<div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Datos De Acceso del Monitor/a
                        <strong><?=$usuario[0]['nombre_jugador']?> <?=$usuario[0]['apellidos']?></strong>
                        
                    </h2>
                    <hr>
                   
				</div>	
								     														
			</div>
	</div>
       <hr class="visible-xs">

       <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    	<div name="formulario">
                    		<form method="post" action="<?=base_url('index.php/controlador_usuarios/datos_acceso_usuario')?>">
                    			<input type="hidden" name="idusuario" value="<?=$usuario[0]['idjugador']?>"/>
                    			<table class="table table-striped">
									<tr>
										
                    
   					
   										<td align="center">Usuario:</td>
   										<td align="center"><input type="text" class ="form-control" name="usuario" disabled value="<?=set_value('usuario', $usuario[0]['usuario']); ?>"/></td>
   										<td><?php echo form_error('usuario'); ?></td>
   						
   					
   										
   									</tr>
   									<tr>
										
                    
   					
   										<td align="center">Contraseña:</td>
   										<td align="center"><input type="text" class ="form-control" name="clave" disabled value="<?=set_value('clave', $usuario[0]['clave']); ?>"/></td>
   										<td><?php echo form_error('clave'); ?></td>
   						
   									</tr>
   										
   									
 
   									<tr><td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="enviar" value="Enviar Modificaciones" disabled/></td></tr>
   									<tr><td colspan="2" align="center"><input type="button" id="habilitar" class="btn btn-primary" name="habilitar" value="Modificar Datos"/></td></tr>
   								</table>
   							</form>  
   						</div>                 
   					<hr>
                   
					
				</div>	
								     														
			</div>
	</div>

    </div>
    <!-- /.container -->
