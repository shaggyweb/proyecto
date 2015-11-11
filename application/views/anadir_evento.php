<div class="container">
	<div class="row">
    	<div class="box">
        	<div class="col-lg-12">
            	<hr>
                	<h2 class="intro-text text-center">Añadir
                        <strong>Evento</strong>
                        
                    </h2>
                 <hr>
             
			</div>	
			<div name="formulario">
            	<form method="post" action="<?=base_url('index.php/controlador_eventos/anadir_evento')?>">
                	<table class="table table-striped">
                   		<tr>
							<td align="center">Tipo Evento: </td><td><?=form_dropdown('select_evento', $tipo_evento, set_value('select_evento'));?></td>
						</tr>
                    	<tr>
							<td align="center">Equipo: </td><td><?=form_dropdown('select_equipo', $nombre_equipo, set_value('select_equipo'));?></td>
						</tr>		
   						<tr>
                    		<td align="center">Descripción:</td>
   							<td align="center"><input type="text" class ="form-control" name="descripcion" value="<?=set_value('descripcion')?>"/></td>
   							<td><?php echo form_error('descripcion'); ?></td>
   						</tr>
   						<tr>
   							<td align="center">Fecha:</td>
   							<td align="center"><input type="text" id="fecha" class ="form-control" name="fecha" value="<?=set_value('fecha'); ?>"/></td>
   							<td><?php echo form_error('fecha'); ?></td>
   						</tr>				
   						<tr>
   							<td align="center">Hora:</td>
   							<td align="center"><input type="text" class ="form-control" name="hora" value="<?=set_value('hora'); ?>"/></td>
   							<td><?php echo form_error('hora'); ?></td>	
   						</tr>
   							<tr><td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="enviar" value="Añadir Evento"/></td></tr>
   					</table>
   				</form>  
   			</div>   				     														
		</div>
	</div>
</div>
    <!-- /.container -->
