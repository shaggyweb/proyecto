<div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Reestablecer
                        <strong>Password</strong>
                    </h2>
                    <hr>
                    <hr class="visible-xs">
                    <div name="form">
                    		<form method="post" action="<?=base_url('index.php/controlador_usuarios/reestablecer_pass_usuario')?>">
								<table align="center">
									<tr>
										<td>Introduzca su e-mail: </td><td><input type="text"  class ="form-control" name="email" value="<?php echo set_value('email'); ?>"/>
											</td><td><?php echo form_error('email'); ?></td>
									</tr>
						
									<tr>
									<tr><td><br></td></tr>
									<td align="center" colspan="2"><input type="submit" class="btn btn-success btn-lg btn-block" name="enviar" value="Enviar"/></td></tr>
								</table>
							</form>
                    </div>
                </div>
             </div>
           </div>
                  
</div>
<!-- /.container -->

