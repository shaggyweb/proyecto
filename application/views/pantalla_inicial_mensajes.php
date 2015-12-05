<div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Seleccione
                        <strong>Jugador</strong>
                    </h2>
                    <hr>
                    <hr class="visible-xs">
                    <form action="<?=base_url('index.php/controlador_mensajes/inicial_mensaje');?>" method="post"> 
                    <table>
                    	<tr>
                  			
                  			

						<td><div class="panel panel-default">
  							<div class="panel-body">
    							<select id="categoria" class="form-control" name="categoria">
									<option value="0">Seleccione Categoría</option>
									<?php foreach ($categorias as $cat) : ?>
									
									<option value="<?=$cat['idtipo']?>"><?=$cat['nombre_categoria']?></option>
								
									<?php endforeach; ?>
								</select>
						
								<select id="equipos" class="form-control" name="equipos">
    								<option value="0">Selecciona Equipo</option>
    							</select>
    							<select id="jugadores" class="form-control" name="jugadores">
    								<option value="0">Selecciona Jugador</option>
    							</select>
    							
  							</div>
  							<td><?php echo form_error('jugadores'); ?></td>
						</div> </td> 
						<td align="center"><input type="submit" class="btn btn-primary" name="enviar" value="Añadir" /></td>                                			
                  				
                  				
                  			
                           				
                  			
                 
                  	</tr>
                  	</table>
                  	</form>
                  		
                </div>
                <div name="contenedor" id="contenedor">
                
                
                </div>
               
            </div>
        </div>

        

    </div>
    <!-- /.container -->
