<div class="container">
	<div class="row">
    	<div class="box">
        	<div class="col-lg-12">
            	<hr>
                    <h2 class="intro-text text-center">Listado de Eventos del Jugador/a
                        <strong><?=$eventos[0]['nombre_jugador']?></strong>
                    </h2>
                <hr>
      			<hr class="visible-xs"> 
      			 
                 <div class="table-responsive">
                			<table class="table table-striped">
                				<tr><th>TIPO EVENTO</th>
                					<th>DESCRIPCIÓN</th>
                					<th>EQUIPO</th>
                					<th>FECHA</th>
                					<th>HORA</th>
            					</tr>
            					
									<?php foreach ($eventos as $not) : ?>
										<tr>
  											<td><?=$not['nombre']?></td>
  											<td><?=$not['descripcion_evento']?></td>
  											<td><?=$not['nombre_eq']?></td>
  											<td><?=date("d-m-Y",strtotime($not['fecha']))?></td>
  											<td><?=$not['hora']?></td>
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
