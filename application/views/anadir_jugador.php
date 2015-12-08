<div class="container">
	<div class="row">
    	<div class="box">
        	<div class="col-lg-12">
            	<hr>
                    <h2 class="intro-text text-center">Nuevo
                        <strong>Jugador</strong>
                    </h2>
                    <hr>
             
                   <hr class="visible-xs">
              		<div class="formulario">
              
              			<form method="post" action="<?=base_url('index.php/controlador_monitor/anadir_jugador')?>">
							<table align="center">
								<tr>
									<td>Nombre: </td><td><input type="text"  class ="form-control" name="nombre" value="<?php echo set_value('nombre'); ?>"/>
									</td><td><?php echo form_error('nombre'); ?></td>
								</tr>
								<tr>
									<td>Apellidos: </td><td><input type="text" class ="form-control" name="apellidos" value="<?php echo set_value('apellidos'); ?>"/>
									</td><td><?php echo form_error('apellidos'); ?></td>
								</tr>
								<tr>
									<td>DNI: </td><td><input type="text" class ="form-control" name="dni" value="<?php echo set_value('dni'); ?>"/>
									</td><td><?php echo form_error('dni'); ?></td>
								</tr>
								<tr>
   									<td align="center">Fecha Nacimiento:</td>
   									<td align="center"><input type="text" id="fecha" class ="form-control" name="fecha" value="<?=set_value('fecha'); ?>"/></td>
   									<td><?php echo form_error('fecha'); ?></td>
   								</tr>	
   									
   								<tr>
   									<td align="center">Sexo:</td>
   										<td><input type="radio" class ="form-control" name="sexo" value="h" <?php echo set_radio('sexo', 'h'); ?>/>Hombre
   											<input type="radio" class ="form-control" name="sexo" value="m" <?php echo set_radio('sexo', 'm'); ?>/>Mujer</td>
   										<td><?php echo form_error('sexo'); ?>
   									</td>
   									
   						</tr>
   						<tr>
   							<td align="center">Tutor/a:</td>
   							<td align="center"><input type="text" id="tutor" class ="form-control" name="tutor" value="<?=set_value('tutor'); ?>"/></td>
   							<td><?php echo form_error('tutor'); ?></td>
   						</tr>
   						<tr>
   							<td align="center">Teléfono:</td>
   							<td align="center"><input type="text" id="telefono" name="telefono" class ="form-control" name="tutor" value="<?=set_value('telefono'); ?>"/></td>
   							<td><?php echo form_error('telefono'); ?></td>
   						</tr>
   						<tr>
   							<td align="center">E-Mail:</td>
   							<td align="center"><input type="text" id="email" class ="form-control" name="email" value="<?=set_value('email'); ?>"/></td>
   							<td><?php echo form_error('email'); ?></td>
   						</tr>	
						<tr>
						<td align="center">Equipo:</td>
							
								<td align="center"> <select id="categoria" class="form-control" name="categoria">
									<option value="0">Seleccione Categoría</option>
									<?php foreach ($categorias as $cat) : ?>
									
									<option value="<?=$cat['idtipo']?>"><?=$cat['nombre_categoria']?></option>
								
									<?php endforeach; ?>
								</select>
						
								<select id="equipos" class="form-control" name="equipos">
    								<option value="0">Selecciona Equipo</option>
    							</select></td>
    							<td><?php echo form_error('equipos'); ?></td>
								
						</tr>
						<tr><td><br></td></tr>
						<tr><td align="center" colspan="2"><input type="submit" class="btn btn-success btn-lg btn-block" name="enviar" value="Enviar"></td></tr>
					</table>
				</form>
              
              
              
              
              </div>
                    		
    
  </div>
  </div>
        
    </div>
    <!-- /.container -->