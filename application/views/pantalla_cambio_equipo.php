<div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Cambiar
                        <strong>Equipo</strong>
                    </h2>
                    <hr>
                    <span class="glyphicon glyphicon-info-sign"></span>Actualmente el jugador <?=$jugador[0]['nombre_jugador']." ".$jugador[0]['apellidos_jugador']." pertenece al equipo ".$equipo[0]['nombre_eq']?>
                    <hr class="visible-xs">
                    <form action="<?=base_url('index.php/controlador_usuarios/pantalla_cambio_equipo/'.$jugador[0]['idjugador']);?>" method="post">
                    	<input type="hidden" name="idjugador" value="<?=$jugador[0]['idjugador']?>"> 
                   		<div class="panel panel-default">
  							<div class="panel-body">
  								
  								
  								<table class="table table-striped">
  									<tr>
  									
    								<td align="center">Categoría:</td>
							
										<td><select id="categoria" class="form-control" name="categoria">
										<option value="0">Seleccione Categoría</option>
										<?php foreach ($categorias as $cat) : ?>
									
										<option value="<?=$cat['idtipo']?>"><?=$cat['nombre_categoria']?></option>
								
										<?php endforeach; ?>
										</select>
									</td>
						
									<td aling="center">Equipo:</td>
										<td><select id="equipos" class="form-control" name="equipos">
    										<option value="0">Selecciona Equipo</option>
    									</select>
    								</td>
    								<td align="center"><input type="submit" class="btn btn-primary" name="enviar" value="Cambiar" /></td> 
    								<tr><td><?php echo form_error('equipos'); ?></td></tr>
    									
								</table>
  							</div>
						</div> 
					</form>				
                  				
                  		
                 </div>       				
                  
             		
              </div>
               
            </div>
        </div>

        


    <!-- /.container -->
    
