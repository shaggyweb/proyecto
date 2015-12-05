<div class="container">
	<div class="row">
    	<div class="box">
        	<div class="col-lg-12">
            	<hr>
                	<h2 class="intro-text text-center">Detalles
                        <strong>Mensaje Privado</strong>
                        
                    </h2>
                 <hr>
             
			</div>	
		</div>
		<div class="box">
        	<div class="col-lg-12">
				<div name="formulario">
					<div class="panel panel-primary">
						<div class="panel-heading">MENSAJE ENVIADO POR: <?=$mensaje[0]['nombre_monitor']." ".$mensaje[0]['apellidos']?></div>
            				<form method="post" action="<?=base_url('index.php/controlador_mensajes/cambiar_estado_mensaje/'.$mensaje[0]['idnotificacion'])?>">
            					<input type="hidden" name="idnotificacion" value="<?=$mensaje[0]['idnotificacion']?>"/>
                				<table class="table table-striped">
                   				<tr>
                    				<td align="center">Nombre Notificación:</td>
   									<td align="center"><input type="text" class ="form-control" name="nombre" disabled value="<?=$mensaje[0]['nombre_notificacion']?>"/></td>
   					
   								</tr>
   								<tr>
   									<td align="center">Descripción:</td>
   									<td align="center"><textarea class ="form-control" name="descripcion" disabled ><?=$mensaje[0]['descripcion']; ?></textarea></td>
   									
   								</tr>	
   								<tr>
   									<td align="center">Fecha Notificación:</td>
   									<td align="center"><input type="text" class ="form-control" name="fecha" disabled value="<?=date("d-m-Y",strtotime($mensaje[0]['fecha']))?>"/></td>
   									
   								</tr>				
   								<tr><td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="enviar" value="Marcar Como Leído"/></td></tr>
   						</table>
   					</form>  
   				</div>
   			</div>
   		</div>
   			   				     														
		</div>
	</div>
</div>
    <!-- /.container -->
