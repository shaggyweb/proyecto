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
                    <table>
                    	<tr>
                  			
                  			

						<td><div class="panel panel-default">
  							<div class="panel-body">
    							<select id="equipos" name="equipos">
									<option value="0">Seleccione Equipo</option>
									<?php foreach ($equipos as $eq) : ?>
									
									<option value="<?=$eq['idequipo']?>"><?=$eq['nombre_eq']?></option>
								
									<?php endforeach; ?>
								</select>
  							</div>
						</div> </td> 
						<td align="center"><input type="submit" class="btn btn-primary" name="enviar" value="Añadir" /></td>                                			
                  				
                  				
                  			
                           				
                  			
                 
                  	</tr>
                  	</table>
                  	</form>
                  		
                </div>
                <div name="contenedor" id="contenedor">
                
                
                </div>
               
            </div>
        </div>

        

    </div>
    <!-- /.container -->
    

