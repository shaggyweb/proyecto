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
                  	<?php foreach ($equipos as $eq) : ?>
                  
                  			<tr>
                  				<td><a href="#<?=$eq['idequipo']?>" class="enlace_info" id="<?=$eq['idequipo']?>" name="<?=$eq['idequipo']?>"><?=$eq['nombre_eq']?></a></td>
                  				
                  				
                  			</tr>
                  		
                  				
                  			
                  		<?php endforeach;?>
                  		</table>
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
                <?php foreach ($equipos as $eq) : ?>
                	<div id="capa<?=$eq['idequipo']?>" class="well oculto">
                		<table>
                		<tr>
                  				<td><?=$eq['nombre_eq']?></td>
                  				
                  				
                  			</tr>
                  		</table>
                  	</div>
                  		
                  				
                  			
                  		<?php endforeach;?>
            </div>
        </div>

    </div>
    <!-- /.container -->