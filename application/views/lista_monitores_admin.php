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
               	<div class="table-responsive">
                	<table class="table table-striped">
                		<tr>
                			<th>FOTO</th>
   							<th>NOMBRE</th>
   							<th>APELLIDOS</th>
   							<th>DNI</th>
   							<th>TELÉFONO</th>
   							<th>E-MAIL</th>
   							<th>EN LA ESCUELA DESDE</th>
   							<th>ELIMINAR</th>
 						</tr>
                  		<?php foreach ($monitores as $moni) : ?>
                  			<tr>
                  			
                  				<td><img class="img-responsive img-thumbnail imagen" src="<?= base_url('/Assets/img/'.$moni['foto'])?>" /></td>
                  				
                  				<td><?=$moni['nombre_monitor']?></td>
                  				
                  				<td><?=$moni['apellidos']?></td>
                  				
                  				<td><?=$moni['dni']?></td>
                  				
                  				<td><?=$moni['telefono']?></td>
                  				
                  				<td><?=$moni['email']?></td>
                  			
                  				<td><?=date("d-m-Y",strtotime($moni['fecha_creacion']))?></td>
                  			
                  				<td><a href="<?= site_url('controlador_monitor/borrar_monitor/'. $moni['idmonitor'])?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                  				
                  				
                  			</tr>
                  		
                  				
                  			
                  		<?php endforeach;?>
                  	</table>
                 </div>
              
  			</div>
  		</div>
  </div>

</div>
    <!-- /.container -->
