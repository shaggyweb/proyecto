<div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Historial
                        <strong>Jugadores</strong>
                    </h2>
                    <hr>
                    <div class="panel panel-primary">
                 
                    	<div class="panel-body">
                    		<div class="table-responsive">
                				<table class="table table-striped">
                    		
                    				<tr>
                    					<th>NOMBRE</th>
                    					<th>APELLIDOS</th>
                    					<th>DNI</th>
                    					
                    				</tr>
                    					<?php foreach($jugadores as $jug):?>
                    				
                    					<tr>
                    						<td><?=$jug['nombre_jugador']?></td>
                    						<td><?=$jug['apellidos_jugador']?></td>
                    						<td><?=$jug['dni']?></td>
                    						
                    						
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
