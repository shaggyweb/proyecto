<div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Consulta
                        <strong>Plantillas</strong>
                    </h2>
                    <hr>
                    <hr class="visible-xs">
                    <form action="<?=base_url('index.php/controlador_monitor/mostrar_plantillas');?>" method="post"> 
                   		<div class="panel panel-default">
  							<div class="panel-body">
  								<table class="table table-striped">
  									<tr>
    								<td align="center">Categoría:</td>
							
										<td><select id="categoria" class="form-control" name="categoria">
										<option value="0">Seleccione Categoría</option>
										<?php foreach ($categorias as $cat) : ?>
									
										<option value="<?=$cat['idtipo']?>"><?=$cat['nombre_categoria']?></option>
								
										<?php endforeach; ?>
										</select>
									</td>
						
									<td aling="center">Equipo:</td>
										<td><select id="equipos" class="form-control" name="equipos">
    										<option value="0">Selecciona Equipo</option>
    									</select>
    								</td>
    								<td align="center"><input type="submit" class="btn btn-primary" name="enviar" value="Mostrar Plantilla" /></td> 
    								<tr><td><?php echo form_error('equipos'); ?></td></tr>
    									
								</table>
  							</div>
						</div> 
					</form>				
                  				
                  		
                 </div>       				
                  
             		
              </div>
               
            </div>
        </div>

        


    <!-- /.container -->
    

