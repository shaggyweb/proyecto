<div class="container">
	<div class="row">
    	<div class="box">
        	<div class="col-lg-12">
            	<hr>
                <h2 class="intro-text text-center">Lista de los
                    <strong>Monitores</strong>
                </h2>
                <hr>
                
                <hr class="visible-xs">
               
                	<table class="table table-striped">
                		<tr>
   							<th>NOMBRE</th>
   							<th>APELLIDOS</th>
   							<th>DNI</th>
   							<th>TELÉFONO</th>
   							<th>E-MAIL</th>
 						</tr>
                  		<?php foreach ($monitores as $moni) : ?>
                  			<tr>
                  				<td><?=$moni['nombre_monitor']?></td>
                  				
                  				<td><?=$moni['apellidos']?></td>
                  			
                  				<td><?=$moni['dni']?></td>
                  			
                  				<td><?=$moni['telefono']?></td>
                  				
                  				<td><?=$moni['email']?></td>
                  			</tr>
                  		
                  				
                  			
                  		<?php endforeach;?>
                  	</table>
              
  			</div>
  		</div>
  </div>

</div>
    <!-- /.container -->
