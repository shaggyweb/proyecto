<div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Añadir
                        <strong>Monitor/a</strong>
                        
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
                    		<form action="<?=base_url('index.php/controlador_monitor/anadir_monitor');?>" method="post" enctype="multipart/form-data">
                    			<table class="table table-striped">
                    				
									<tr>
										
                    
   					
   										<td align="center">Nombre:</td>
   										<td align="center"><input type="text" class ="form-control" name="nombre" value="<?php echo set_value('nombre'); ?>"/></td>
   										<td><?php echo form_error('nombre'); ?></td>
   						
   					
   										
   									</tr>
   									<tr>
										
                    
   					
   										<td align="center">Apellidos:</td>
   										<td align="center"><input type="text" class ="form-control" name="apellidos" value="<?php echo set_value('apellidos'); ?>"/></td>
   										<td><?php echo form_error('apellidos'); ?></td>
   						
   					
   										
   									</tr>
   									<tr>
										
                    
   					
   										<td align="center">DNI:</td>
   										<td align="center"><input type="text" class ="form-control" name="dni" value="<?php echo set_value('dni'); ?>"/></td>
   										<td><?php echo form_error('dni'); ?></td>
   						
   					
   										
   									</tr>
   									<tr>
										
                    
   					
   										<td align="center">Teléfono:</td>
   										<td align="center"><input type="text" class ="form-control" name="telefono" value="<?php echo set_value('telefono'); ?>"/></td>
   										<td><?php echo form_error('telefono'); ?></td>
   						
   					
   										
   									</tr>
   									
   									<tr>
										
                    
   					
   										<td align="center">E-Mail:</td>
   										<td align="center"><input type="text" class ="form-control" name="email" value="<?php echo set_value('email'); ?>"/></td>
   										<td><?php echo form_error('email'); ?></td>
   						
   					
   										
   									</tr>
   									
   									<tr>
   										<td align="center">Foto:</td>
   										<td align="center"><input type="file" name="foto" id="foto"></td>
   										<td></td>
   									
   									</tr>
   									
   									<tr>
   										<td align="center">Rol:</td>
   										<td align="center"><input type="radio" class ="form-control" name="rol" value="m" <?php echo set_radio('rol', 'm'); ?>/>Monitor</td>
   										<td align="center"><input type="radio" class ="form-control" name="rol" value="a" <?php echo set_radio('rol', 'a'); ?>/>Administrador/Monitor</td>
   										<td><?php echo form_error('rol'); ?></td>
   									
   									</tr>
   									
   									<tr><td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="enviar" value="Añadir" /></td></tr>
   							
   								</table>
   							</form>  
   						</div>                 
   					<hr>
                   
					
				</div>	
								     														
			</div>
	</div>

    </div>
    <!-- /.container -->