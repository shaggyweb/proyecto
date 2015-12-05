<div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Confirmar
                        <strong>Borrado Monitor</strong>
                    </h2>
                    <hr>
                    <div class="panel panel-primary">
                    	<div class="panel-heading">
                    	
                    		<span class="glyphicon glyphicon-warning-sign"></span> Va a eliminar al monitor <?=$monitor[0]['nombre_monitor']." ".$monitor[0]['apellidos']?>
                    	</div>
                    	<div class="panel-body">
                    		<div class="table-responsive">
                				<table class="table table-striped">
                    		
                    				<tr><td><a href="<?= site_url('controlador_monitor/borrado_monitor/'.$monitor[0]['idmonitor'])?>"><button type="button" class="btn btn-success">CONFIRMAR</button></a>
                    					<a href="<?= site_url('controlador_monitor/listar_monitores_admin')?>"><button type="button" class="btn btn-danger">CANCELAR</button></a></td>
                    				</tr>
                    		
                    			</table>
                    		</div>
                    	</div>
                    
                    </div>
                 
						                                 			
                  				
                  				
                  			
                           				
                  		
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
