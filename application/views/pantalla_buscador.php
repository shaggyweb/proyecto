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
                    <form action="<?=base_url('index.php/controlador_eventos/pantalla_buscador');?>" class="formulario" method="post"> 
                    
                  			
              

							
  									<table>
  										<tr>
  											<td><select id="idequipo" name="idequipo"><option value="0">Seleccione Equipo</option>
												<?php foreach ($equipos as $eq) : ?>
									
													<option value="<?=$eq['idequipo']?>"><?=$eq['nombre_eq']?></option>
								
													<?php endforeach; ?>
											</select></td>
											
											<td><select id="tipo_evento" name="tipo_evento"><option value="0">Seleccione Tipo Evento</option>
												<?php foreach ($tipo_eventos as $ev) : ?>
									
													<option value="<?=$ev['idtipo_evento']?>"><?=$ev['nombre']?></option>
								
													<?php endforeach; ?>
											</select></td>
											<td><input type="text" class ="form-control" id="fecha" name="fecha"></td>
											<td><input type="text" class ="form-control" id="fecha1" name="fecha1"></td>
											
  										</tr>
                    					<tr>
    										<!--este es nuestro autocompletado-->
											<td><input type="text" autocomplete="off" onpaste="return false" name="poblacion" 
											id="poblacion" class="poblacion" placeholder="Buscar por descripción" /></td>
											
										</tr>
										<tr><td align="center"><input type="submit" class="btn btn-primary" name="buscar" value="Buscar" /></td> </tr>                               			
            						</table>
  									
						
                  				
                  				
                  			
                           				
                  			
                 
     
                  	
                  	</form>
                  		
                </div>
                <div class="muestra_poblaciones"></div>
                <div name="contenedor" id="contenedor">
                
                
                </div>
               
            </div>
        </div>

        

    </div>
    <!-- /.container -->