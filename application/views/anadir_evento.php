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
				<form class="form-horizontal" role="form" method="post" action="<?=base_url('index.php/controlador_eventos/anadir_evento')?>">
					<!-- Select Basic -->
						<div class="form-group">
  							<label class="col-md-4 control-label" for="select_evento">Tipo Evento:</label>
  							<div class="col-md-4">
    							<?=form_dropdown('select_evento', $tipo_evento, set_value('select_evento'));?>
   
  							</div>
						</div>

					<!-- Select Basic -->
						<div class="form-group">
  							<label class="col-md-4 control-label" for="select_equipo">Equipo:</label>
  							<div class="col-md-4">
    							<?=form_dropdown('select_equipo', $nombre_equipo, set_value('select_equipo'));?>
  							</div>
						</div>

					<!-- Text input-->
						<div class="form-group">
  							<label class="col-md-4 control-label" for="descripcion">Descripción:</label>  
  							<div class="col-md-8">
  								<input class="form-control input-md" type="text" name="descripcion" value="<?=set_value('descripcion')?>"/>
  								
 	 						</div>
 	 						
						</div>
						<?php echo form_error('descripcion'); ?>
					<!-- Text input-->
						<div class="form-group">
  							<label class="col-md-4 control-label" for="fechal">Fecha:</label>  
  							<div class="col-md-2">
  								<input id="fecha" name="fecha" class="form-control input-md" type="text" value="<?=set_value('fecha'); ?>">
    							
  							</div>
  							
						</div>
						<?php echo form_error('fecha'); ?>
					<!-- Text input-->
						<div class="form-group">
  							<label class="col-md-4 control-label" for="hora">Hora:</label>  
  							<div class="col-md-1">
  								<input name="hora" class="form-control input-md" type="text" value="<?=set_value('hora'); ?>">
    							
  							</div>
  							
						</div>
						<?php echo form_error('hora'); ?>
					<!-- Button -->
					

					<table align="center">
					<tr><td>
  					<div class="col-md-4 center-block">
    					<input type="submit" class="btn btn-primary" name="enviar" value="Añadir Evento">
  					</div></td></tr>
  					</table>
  					


  
   				</form>  
   			</div>   				     														
		</div>
	</div>
</div>
    <!-- /.container -->
