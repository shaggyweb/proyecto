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
                  		
                  			<tr>
                  			
                  			
                  				
                  				<td><?=$evento[0]['nombre_eq']?></td>
                  				
                  				<td><?=$evento[0]['nombre']?></td>
                  				
                  				<td><?=$evento[0]['descripcion_evento']?></td>
                  			
                  				<td><?=date("d-m-Y",strtotime($evento[0]['fecha']))?></td>
                  			
                  				<td><?=$evento[0]['hora']?></td>
                  				
                  			</tr>
                  		
                  				
                  
                  	</table>
                 </div>
              
  			</div>
  		</div>
  </div>

</div>
    <!-- /.container -->
