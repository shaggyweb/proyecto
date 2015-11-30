<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require(__DIR__.'/controlador.php');

class controlador_equipos extends controlador {
	function __construct() {
		parent::__construct();
	}
	
	function ver_equipos_cat($cat)
	{

		$datos['equipos']=$this->mod_equipos->listar_equipos_cat($cat);
		
		//print_r($datos['equipos']);
		
		$datos['jugadores']=$this->mod_equipos->listar_jugadores_cat($cat);
		
		$cuerpo = $this->load->view('lista_equipos', $datos , TRUE);
		
		$this->Plantilla($cuerpo);
		
		//print_r($datos['equipos']);
	}
	
	public function llena_equipos()
	{
		$options = "";
		if($this->input->post('categoria'))
		{
			$categoria = $this->input->post('categoria');
			$equipos = $this->mod_equipos->llena_equipos($categoria);
			foreach($equipos as $fila)
			{
				?>
					<option value="<?=$fila['idequipo'] ?>"><?=$fila['nombre_eq'] ?></option>
				<?php
				}
			}
		}
}
