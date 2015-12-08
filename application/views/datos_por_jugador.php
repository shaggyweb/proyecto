<div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Datos Personales del Jugador/a
                        <strong><?=$usuario[0]['nombre_jugador']?> <?=$usuario[0]['apellidos_jugador']?></strong>
                        
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
                    		<form method="post" action="<?=base_url('index.php/controlador_usuarios/ver_usuario')?>">
                    			<input type="hidden" name="idusuario" value="<?=$usuario[0]['idjugador']?>"/>
                    			<table class="table table-striped">
                    				
									<tr>
										
                    
   					
   										<td align="center">Nombre:</td>
   										<td align="center"><input type="text" class ="form-control" name="nombre" disabled value="<?=set_value('nombre', $usuario[0]['nombre_jugador']); ?>"/></td>
   										<td><?php echo form_error('nombre'); ?></td>
   						
   					
   										
   									</tr>
   									<tr>
										
                    
   					
   										<td align="center">Apellidos:</td>
   										<td align="center"><input type="text" class ="form-control" name="apellidos" disabled value="<?=set_value('apellidos', $usuario[0]['apellidos_jugador']); ?>"/></td>
   										<td><?php echo form_error('apellidos'); ?></td>
   						
   					
   										
   									</tr>
   									
   									<tr>
   										<td align="center">Fecha Nacimiento:</td>
   										<td align="center"><input type="text" id="fecha" class ="form-control" name="fecha" disabled value="<?=set_value('fecha',date("d/m/Y",strtotime($usuario[0]['fecha_nac']))); ?>"/></td>
   										<td><?php echo form_error('fecha'); ?></td>
   									</tr>	
   									
   									<tr>
   										<td align="center">Sexo:</td>
   										<td align="center"><input type="radio" class ="form-control" name="sexo" disabled value="h" <?php echo set_radio('sexo', 'h');if ($usuario[0]['sexo']=="h")
						{
							?> checked <?php
						}?>/>Hombre
   										<input type="radio" class ="form-control" name="sexo" disabled value="m" <?php echo set_radio('sexo', 'm'); if ($usuario[0]['sexo']=="m")
						{
							?> checked <?php
						}?>/>Mujer</td>
   										
   										<td><?php echo form_error('sexo'); ?></td>
   									
   									</tr>
   									
   									
   									<tr>
										
                    
   					
   										<td align="center">DNI:</td>
   										<td align="center"><input type="text" class ="form-control" name="dni" disabled value="<?=set_value('dni', $usuario[0]['dni']); ?>"/></td>
   										<td><?php echo form_error('dni'); ?></td>
   						
   					
   										
   									</tr>
   									
   									<tr>
										
                    
   					
   										<td align="center">Tutor:</td>
   										<td align="center"><input type="text" class ="form-control" name="tutor" disabled value="<?=set_value('tutor', $usuario[0]['tutor']); ?>"/></td>
   										<td><?php echo form_error('tutor'); ?></td>
   						
   					
   										
   									</tr>
   									
   									<tr>
										
                    
   					
   										<td align="center">Teléfono:</td>
   										<td align="center"><input type="text" class ="form-control" name="telefono" disabled value="<?=set_value('telefono', $usuario[0]['telefono']); ?>"/></td>
   										<td><?php echo form_error('telefono'); ?></td>
   						
   					
   										
   									</tr>
   									
   									<tr>
										
                    
   					
   										<td align="center">E-Mail:</td>
   										<td align="center"><input type="text" class ="form-control" name="email" disabled value="<?=set_value('email', $usuario[0]['email']); ?>"/></td>
   										<td><?php echo form_error('email'); ?></td>
   						
   					
   										
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
