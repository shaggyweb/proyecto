<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require(__DIR__.'/controlador.php');

class controlador_eventos extends controlador {
	function __construct() {
		parent::__construct();
	}
	
	function ver_eventos()
	{
		$datos['titulo']="Eventos de la Escuela";
		$datos['eventos']=$this->mod_noticias->listar_noticias();
		
		$cuerpo = $this->load->view('lista_eventos', $datos , TRUE);
		
		$this->Plantilla($cuerpo);
	}
}
