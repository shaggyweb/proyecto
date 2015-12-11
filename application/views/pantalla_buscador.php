<div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Consulta
                        <strong>Eventos</strong>
                    </h2>
                    <hr>
                    <hr class="visible-xs">
                    <form action="<?=base_url('index.php/controlador_eventos/pantalla_buscador');?>" class="formulario" method="post"> 
                    
                  			
              

								<div class="table-responsive">
  									<table class="table table-striped">
  										<tr>
  											<td>Equipo:<select id="idequipo" name="idequipo" class ="form-control"><option value="0">Seleccione Equipo</option>
												<?php foreach ($equipos as $eq) : ?>
									
													<option value="<?=$eq['idequipo']?>"><?=$eq['nombre_eq']?></option>
								
													<?php endforeach; ?>
											</select></td>
											
											<td>Tipo Evento:<select id="tipo_evento" name="tipo_evento" class ="form-control"><option value="0">Seleccione Tipo Evento</option>
												<?php foreach ($tipo_eventos as $ev) : ?>
									
													<option value="<?=$ev['idtipo_evento']?>"><?=$ev['nombre']?></option>
								
													<?php endforeach; ?>
											</select></td>
											<td>Fecha:<input type="text" class ="form-control" id="fecha" name="fecha"></td>
											
											<td align="center"><input type="submit" class="btn btn-primary" name="buscar" value="Buscar" /></td> </tr>                         			
  										
                    					<tr>
                    						<td>Consulta por Descripción:
    										<!--este es nuestro autocompletado-->
											<input type="text" autocomplete="off" onpaste="return false" name="descripcion_busca" 
											id="descripcion_busca" class="descripcion_busca" placeholder="Buscar por descripción" /></td>
											
										</tr>
								
            						</table>
            						<span class="text-danger"><?php if (isset($error)) echo $error; ?></span>
  									
						</div>
                  				
                  				
                  			
                           				
                  			
                 
     
                  	
                  	</form>
                  		
                </div>
                <div class="muestra_descripciones"></div>
                <div name="contenedor" id="contenedor">
                
                
                </div>
               
            </div>
        </div>

        

    </div>
    <!-- /.container -->