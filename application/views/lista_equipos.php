<div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Categoría
                        <strong><?=$equipos[0]['nombre_categoria']?></strong>
                    </h2>
                    <hr>
                    <hr class="visible-xs">
                    <table>
                    	<tr>
                  			<?php foreach ($equipos as $eq) : ?>
                  			

						<td><div class="panel panel-default">
  							<div class="panel-body">
    							<a href="#<?=$eq['idequipo']?>" class="enlace_info" id="<?=$eq['idequipo']?>" name="<?=$eq['idequipo']?>"><?=$eq['nombre_eq']?></a>
  							</div>
						</div> </td> 
						                                 			
                  				
                  				
                  			
                           				
                  			
                  	<?php endforeach;?>
                  	</tr>
                  	</table>
                  		
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Plantillas
                        <strong>Equipos</strong>
                    </h2>
                    <hr>
                  		<?php foreach ($equipos as $eq) : ?>
                			<div id="capa<?=$eq['idequipo']?>" class="well oculto">
                				<div class="panel panel-default">
                					<div class="panel-heading">
    									<h3 class="panel-title">Plantilla del Equipo <?=$eq['nombre_eq']?></h3>
  									</div>
  									<div class="panel-body">
                						<table class="table table-bordered">
                							<tr>
                								<th>NOMBRE</th>
                								<th>APELLIDOS</th>
                								<th>DNI</th>
                								<th>SEXO</th>
                								<th>EN LA ESCUELA DESDE EL</th>
                							</tr>
                							<?php foreach($jugadores as $jug):?>
                								<?php if($eq['nombre_eq']==$jug['nombre_eq']):?>
                		
                									<tr>
                  										<td><?=$jug['nombre_jugador']?></td>
                  										<td><?=$jug['apellidos']?></td>
                  										<td><?=$jug['dni']?></td>
                  										<td><?=$jug['sexo']?></td>
                  										<td><?=date("d-m-Y",strtotime($jug['fecha_crea']))?></td>
                  									</tr>
                  								<?php endif ?>
                  							<?php endforeach;?>
                  		
                  			
                  						</table>
                  					</div>
                  			
                  				</div>
                  				
                  			</div>	
            			<?php endforeach;?> 
            			
                </div>
                
            </div>
        </div>

    </div>
    <!-- /.container -->
    
  