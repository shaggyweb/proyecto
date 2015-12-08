<div class="container">
	<div class="row">
    	<div class="box">
        	<div class="col-lg-12">
            	<hr>
                <h2 class="intro-text text-center">Resultados
                    <strong>Búsqueda</strong>
                </h2>
                <hr>
                
                <hr class="visible-xs">
               	<div class="table-responsive">
                	<table class="table table-striped">
                		<tr>
                			<th>EQUIPO</th>
   							<th>TIPO EVENTO</th>
   							<th>DESCRIPCIÓN</th>
   							<th>FECHA</th>
   							<th>HORA</th>
 						</tr>
                  			<?php foreach ($resultado as $resul) : ?>
                  			<tr>
                  			
                  			
                  				
                  				<td><?=$resul['nombre_eq']?></td>
                  				
                  				<td><?=$resul['nombre']?></td>
                  				
                  				<td><?=$resul['descripcion_evento']?></td>
                  			
                  				<td><?=date("d-m-Y",strtotime($resul['fecha']))?></td>
                  			
                  				<td><?=$resul['hora']?></td>
                  				
                  			</tr>
                  			<?php endforeach;?>
                  				
                  
                  	</table>
                 </div>
              
  			</div>
  		</div>
  </div>

</div>
    <!-- /.container -->

