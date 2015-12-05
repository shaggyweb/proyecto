<div class="container">
	<div class="row">
    	<div class="box">
        	<div class="col-lg-12">
            	<hr>
                	<h2 class="intro-text text-center">Añadir
                        <strong>Mensaje Privado</strong>
                        
                    </h2>
                 <hr>
             
			</div>	
		</div>
		<div class="box">
        	<div class="col-lg-12">
				<div name="formulario">
					<div class="panel panel-primary">
						<div class="panel-heading">MENSAJE PARA: <?=$jugador[0]['nombre_jugador']?> <?=$jugador[0]['apellidos_jugador']?></div>
            				<form method="post" action="<?=base_url('index.php/controlador_mensajes/anadir_mensaje/'.$jugador[0]['idjugador'])?>">
            					<input type="hidden" name="idjugador" value="<?=$jugador[0]['idjugador']?>"/>
                				<table class="table table-striped">
                   				<tr>
                    				<td align="center">Nombre Notificación:</td>
   									<td align="center"><input type="text" class ="form-control" name="nombre" value="<?=set_value('nombre')?>"/></td>
   									<td><?php echo form_error('nombre'); ?></td>
   								</tr>
   								<tr>
   									<td align="center">Descripción:</td>
   									<td align="center"><textarea class ="form-control" name="descripcion" value="<?=set_value('descripcion'); ?>"></textarea></td>
   									<td><?php echo form_error('descripcion'); ?></td>
   								</tr>				
   								<tr><td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="enviar" value="Enviar Notificación"/></td></tr>
   						</table>
   					</form>  
   				</div>
   			</div>
   		</div>
   			   				     														
		</div>
	</div>
</div>
    <!-- /.container -->

