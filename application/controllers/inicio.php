<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require(__DIR__.'/controlador.php');

class inicio extends controlador{

	function __construct() 
	{
		parent::__construct();
	}

	function index(){
		 
		//parametros para el paginador
		//$url= site_url('inicio/index');
		//$total_pagina=2;
		//$total_filas= $this->mod_productos->prod_destacados_total();
		//$segm=3;
		//llamada al paginador
		//$datos['paginador']= $this->paginador($url,$total_pagina,$total_filas,$segm);

		$datos['titulo']= "Productos Destacados";

		$datos['productos']= $this->mod_productos->listar_equipos();
		
		$datos['noticias']= $this->mod_noticias->listar_noticias();
		
		//print_r($datos);

		//$cuerpo = $this->load->view('lista_productos', $datos, TRUE);
		$cuerpo = $this->load->view('portada', $datos , TRUE);

		$this->Plantilla($cuerpo);

	}

}