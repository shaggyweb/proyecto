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
                    		<table>
                    			<tr><th>NOMBRE</th></tr>
                    				<?php foreach($jugadores as $jug):?>
                    				
                    				<tr><td><td><?=$jug['nombre_jugador']?></td></td></tr>
                    				<?php endforeach;?>
                    		
                    		</table>
                    	</div>
                    
                    </div>
                 
						                                 			
                  				
                  				
                  			
                           				
                  		
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
    

