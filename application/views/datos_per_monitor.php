<div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Datos Personales del Monitor/a
                        <strong><?=$monitor[0]['nombre_monitor']?> <?=$monitor[0]['apellidos']?></strong>
                        
                    </h2>
                    <hr>
                   
					<table align="center">
					<tr>
					<td align="center">
                    
   					
   							<img class="img-responsive img-thumbnail imagen" src="<?= base_url('/Assets/img/'.$monitor[0]['foto'])?>" />
   						
   					
   					</td>
   					</tr>
   					</table>
				</div>	
								     														
			</div>
	</div>
       <hr class="visible-xs">

       <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    	<div name="formulario"></div>
                    		<form method="post" action="<?=base_url('index.php/controlador_monitor/login_monitor')?>">
                    			<table class="table table-striped">
									<tr>
										
                    
   					
   										<td align="center">Nombre:</td>
   										<td align="center"><input type="text" class ="form-control" name="usuario" size="10" disabled value="<?=set_value('nombre', $monitor[0]['nombre_monitor']); ?>"/></td>
   						
   					
   										
   									</tr>
   									<tr>
										
                    
   					
   										<td align="center">Apellidos:</td>
   										<td align="center"><input type="text" class ="form-control" name="usuario" size="5" disabled/></td>
   						
   					
   										
   									</tr>
   									<tr>
										
                    
   					
   										<td align="center">DNI:</td>
   										<td align="center"><input type="text" class ="form-control" name="usuario" size="5" disabled/></td>
   						
   					
   										
   									</tr>
   									<tr><td><input type="submit" class="btn btn-primary" name="enviar" value="Enviar Modificaciones" disabled/></td></tr>
   									<tr><td><input type="button" id="habilitar" class="btn btn-primary" name="habilitar" value="Modificar Datos"/></td></tr>
   								</table>
   							</form>  
   						</div>                 
   					<hr>
                   
					
				</div>	
								     														
			</div>
	</div>

    </div>
    <!-- /.container -->