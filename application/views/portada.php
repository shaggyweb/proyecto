 <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Últimos
                        <strong>Eventos</strong>
                    </h2>
                    <hr>
                    <hr class="visible-xs">
                  	<div class="panel-group" id="accordion">
						<?php foreach ($noticias as $not) : ?>
  							<div class="panel panel-default">
    							<div class="panel-heading">
      								<h4 class="panel-title">
        								<a data-toggle="collapse" data-parent="#accordion" href="#<?=$not['idevento']?>">
        									<?=$not['nombre']?>-<?=$not['nombre_eq']?>-<?=$not['fecha']?></a>
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
      

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Beautiful boxes
                        <strong>to showcase your content</strong>
                    </h2>
                    <hr>
                    <p>Use as many boxes as you like, and put anything you want in them! They are great for just about anything, the sky's the limit!</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc placerat diam quis nisl vestibulum dignissim. In hac habitasse platea dictumst. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->