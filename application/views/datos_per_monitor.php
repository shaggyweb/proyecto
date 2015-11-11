<div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Datos Personales del Monitor/a
                        <strong><?=$monitor[0]['nombre_monitor']?> <?=$monitor[0]['apellidos']?></strong>
                        
                    </h2>
                    <hr>
                   
					<table align="center">
					<tr>
					<td align="center">
                    
   					
   							<img class="img-responsive img-thumbnail imagen" src="<?= base_url('/Assets/img/'.$monitor[0]['foto'])?>" />
   						
   					
   					</td>
   					</tr>
   					</table>
				</div>	
								     														
			</div>
	</div>
       <hr class="visible-xs">

       <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    	<div name="formulario">
                    		<form method="post" action="<?=base_url('index.php/controlador_monitor/ver_monitor')?>">
                    			<table class="table table-striped">
									<tr>
										
                    
   					
   										<td align="center">Nombre:</td>
   										<td align="center"><input type="text" class ="form-control" name="nombre" disabled value="<?=set_value('nombre', $monitor[0]['nombre_monitor']); ?>"/></td>
   										<td><?php echo form_error('nombre'); ?></td>
   						
   					
   										
   									</tr>
   									<tr>
										
                    
   					
   										<td align="center">Apellidos:</td>
   										<td align="center"><input type="text" class ="form-control" name="apellidos" disabled value="<?=set_value('apellidos', $monitor[0]['apellidos']); ?>"/></td>
   										<td><?php echo form_error('apellidos'); ?></td>
   						
   					
   										
   									</tr>
   									<tr>
										
                    
   					
   										<td align="center">DNI:</td>
   										<td align="center"><input type="text" class ="form-control" name="dni" disabled value="<?=set_value('dni', $monitor[0]['dni']); ?>"/></td>
   										<td><?php echo form_error('dni'); ?></td>
   						
   					
   										
   									</tr>
   									<tr>
										
                    
   					
   										<td align="center">Teléfono:</td>
   										<td align="center"><input type="text" class ="form-control" name="telefono" disabled value="<?=set_value('telefono', $monitor[0]['telefono']); ?>"/></td>
   										<td><?php echo form_error('telefono'); ?></td>
   						
   					
   										
   									</tr>
   									
   									<tr>
										
                    
   					
   										<td align="center">E-Mail:</td>
   										<td align="center"><input type="text" class ="form-control" name="email" disabled value="<?=set_value('email', $monitor[0]['email']); ?>"/></td>
   										<td><?php echo form_error('email'); ?></td>
   						
   					
   										
   									</tr>
   									
   									<tr>
   										<td align="center">Foto:</td>
   										<td align="center"><input type="text" class ="form-control" name="foto" disabled value="<?=set_value('foto', $monitor[0]['foto']); ?>"/></td>
   										<td><?php echo form_error('foto'); ?></td>
   									
   									</tr>
   									<tr>
   										<td><input type="text" id="fecha" class ="form-control" name="fecha" disabled/></td>
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