<div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Añadir
                        <strong>Monitor/a</strong>
                        
                    </h2>
                    <hr>
                   
				
	
       		<hr class="visible-xs">

      
                    	<div name="formulario">
                    		<form class="form-horizontal" role="form" action="<?=base_url('index.php/controlador_monitor/anadir_monitor');?>" method="post" enctype="multipart/form-data">
                    			<!-- Text input-->
									<div class="form-group">
  										<label class="col-md-4 control-label" for="nombre">Nombre:</label>  
 	 									<div class="col-md-4">
  											<input class="form-control input-md" type="text" name="nombre" value="<?php echo set_value('nombre'); ?>">
    
  										</div>
									</div>
									<?php echo form_error('nombre'); ?>
									<div class="form-group">
  										<label class="col-md-4 control-label" for="apellidos">Apellidos:</label>  
 	 									<div class="col-md-4">
  											<input class="form-control input-md" type="text" name="apellidos" value="<?php echo set_value('apellidos'); ?>">
    
  										</div>
									</div>
									<?php echo form_error('apellidos'); ?>
									<div class="form-group">
  										<label class="col-md-4 control-label" for="dni">DNI:</label>  
 	 									<div class="col-md-2">
  											<input class="form-control input-md" type="text" maxlength="9" name="dni" value="<?php echo set_value('dni'); ?>">
    
  										</div>
									</div>
									<?php echo form_error('dni'); ?>
									<div class="form-group">
  										<label class="col-md-4 control-label" for="telefono">Teléfono:</label>  
 	 									<div class="col-md-2">
  											<input class="form-control input-md" type="text" maxlength="9" name="telefono" value="<?php echo set_value('telefono'); ?>">
    
  										</div>
									</div>
									<?php echo form_error('telefono'); ?>
									<div class="form-group">
  										<label class="col-md-4 control-label" for="email">E-Mail:</label>  
 	 									<div class="col-md-2">
  											<input class="form-control input-md" type="text" name="email" value="<?php echo set_value('email'); ?>">
    
  										</div>
									</div>
									<?php echo form_error('email'); ?>
									<div class="form-group">
  										<label class="col-md-4 control-label" for="email">Foto:</label>  
 	 									<div class="col-md-2">
  											<input type="file" name="foto" id="foto">
    
  										</div>
									</div>
									<!-- Multiple Radios (inline) -->
									<div class="form-group">
  										<label class="col-md-4 control-label" for="radios">Rol:</label>
  										<div class="col-md-4"> 
    										<label class="radio-inline" for="rolm">
      										<input name="rol" value="m" type="radio" <?php echo set_radio('rol', 'm');?>>
      										Monitor
    										</label> 
    										<label class="radio-inline" for="rola">
      										<input name="rol" value="a" type="radio" <?php echo set_radio('rol', 'a');?>>
      										Administrador/Monitor
    										</label> 
   
 										 </div>
									</div>
									<?php echo form_error('rol'); ?>
                    			
   									
   									<span class="text-danger"><?php if (isset($error)) echo $error; ?></span>
   									
   									<!-- Button -->
					

									<table align="center">
										<tr><td>
  											<div class="col-md-4 center-block">
    											<input type="submit" class="btn btn-primary" name="enviar" value="Añadir">
  											</div></td></tr>
  									</table>
   							</form>  
   						</div>                 
   					
                   
					
				</div>	
			</div>	
								     														
			</div>					     														
			
	

    </div>
    <!-- /.container -->