<div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Plantilla del Equipo
                        <strong><?=$equipo['nombre_eq']?></strong>
                    </h2>
                    <hr>
                    <div class="panel panel-primary">
                    	<div class="panel-heading">
                    	
                    		PLANTILLA
                    	</div>
                    	<div class="panel-body">
                    		<div class="table-responsive">
                				<table class="table table-striped">
                    		
                    				<tr>
                    					<th>NOMBRE</th>
                    					<th>APELLIDOS</th>
                    					<th>DNI</th>
                    					<th>SEXO</th>
                    					<th>FECHA NACIMIENTO</th>
                    					<th>TUTOR</th>
                    					<th>TELÉFONO</th>
                    					<th>E-MAIL</th>
                    					<th>CAMBIAR EQUIPO</th>
                    					<th>ELIMINAR</th>
                    				</tr>
                    					<?php foreach($jugadores as $jug):?>
                    				
                    					<tr>
                    						<td><?=$jug['nombre_jugador']?></td>
                    						<td><?=$jug['apellidos_jugador']?></td>
                    						<td><?=$jug['dni']?></td>
                    						<td><?=$jug['sexo']?></td>
                    						<td><?=$jug['fecha_nac']?></td>
                    						<td><?=$jug['tutor']?></td>
                    						<td><?=$jug['telefono']?></td>
                    						<td><?=$jug['email']?></td>
                    						<td><span class="glyphicon glyphicon-refresh"></span></td>
                    						<td><a href="<?= site_url('controlador_usuarios/borrar_jugador/'. $jug['idjugador'])?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                    					</tr>
                    					<?php endforeach;?>
                    		
                    			</table>
                    		</div>
                    	</div>
                    
                    </div>
                 
						                                 			
                  				
                  				
                  			
                           				
                  		
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
    

