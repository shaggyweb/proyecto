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
      			 
                  <div class="panel-group" id="accordion">
						<?php foreach ($eventos as $not) : ?>
  							<div class="panel panel-default">
    							<div class="panel-heading">
      								<h4 class="panel-title">
        								<a data-toggle="collapse" data-parent="#accordion" href="#<?=$not['idevento']?>">
        			 						<?=$not['nombre']?>-<?=$not['nombre_eq']?>-<?=date("d-m-Y",strtotime($not['fecha']))?></a>
      								</h4>
    							</div>
    							<div id="<?=$not['idevento']?>" class="panel-collapse collapse">
      									<div class="panel-body"><?=$not['descripcion_evento']?></div>
    							</div>
  							</div>
  						<?php endforeach; ?>
  				</div>
  			</div>
  		</div>
	</div>
</div>
    <!-- /.container -->
