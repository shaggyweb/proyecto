<div class="container">
	<div class="row">
    	<div class="box">
        	<div class="col-lg-12">
            	<hr>
           		<h2 class="intro-text text-center">Listado de Notificaciones del jugador 
            		<strong><?=$mensajes[0]['nombre_jugador']." ". $mensajes[0]['apellidos_jugador']?></strong>
            		
            	</h2>
            	<h2 class="intro-text text-center">Mensajes Nuevos
            		<span class="badge"><?=$nuevos[0]['total_nuevos']?></span>
            		
            	</h2>
            	<hr>
            	<hr class="visible-xs">
            			
            			<div class="table-responsive">
                			<table class="table table-striped">
                				<tr><th>NOTIFICACIÓN ENVIADA POR</th>
                					<th>ASUNTO</th>
                					<th>FECHA</th>
                					<th>ESTADO</th>
                					<th>DETALLES</th>
            					</tr>
            					
									<?php foreach ($mensajes as $men) : ?>
										<tr>
  											<td><?=$men['nombre_monitor']." ".$men['apellidos']?></td>
  											<td><?=$men['nombre_notificacion']?></td>
  											<td><?=date("d-m-Y",strtotime($men['fecha']))?></td>
  											<td><?php if ($men['estado']=="N")
  											{
  												?>Nuevo<?php 
  											}
  											if ($men['estado']=="L")
  											{
  												?>Leído<?php
  											}
  											?>
											</td>
  											<td><a href="<?= site_url('controlador_mensajes/detalles_mensaje/'. $men['idnotificacion'])?>"><span class="glyphicon glyphicon-search"></span></a></td>
  										</tr>
  									<?php endforeach; ?>
  					
  							</table>	
  						</div>
  						
  				
  				<div id="paginador" name="paginador"></div>
  					<?=$paginador?>
  				</div>
  			</div>
  		</div>
  	</div>
</div>
    <!-- /.container -->
