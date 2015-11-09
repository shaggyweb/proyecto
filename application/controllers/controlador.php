<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controlador genérico
 * Contiene la funcionalidad del cargar la plantilla y de la paginación
 * @author Mario Vilches Nieves
 */
class controlador extends CI_Controller {
	
	/**
	 * Carga la plantilla con la apariencia (cabecera, cuerpo y pie).
	 * @param string $cuerpo Contiene el contendi del cuerpo de la web
	 */
	function Plantilla($cuerpo)
	{
		//Seleccion de todas las categorías para mostrarlas como enlace en la cabecera
		$categoria['categoria'] = $this->mod_productos->listar_tipo_equipo();
		//$categoria['equipos']=$this->mod_productos->listar_equipos();
		
		//print_r($categoria['categoria'][0]['idtipo']);
		
		//Comprobacion de si el usuario está dentro o no, cargará una cabecera distinta
		
		if(!$this->session->userdata('user') and !$this->session->userdata('rol') )
		{
			$cabecera= $this->load->view("cabecerac",$categoria, true); //Carga de cabecera por defecto
		}
		else if ($this->session->userdata('rol')=='usuario')
		{ 
			$cabecera= $this->load->view("cabecera_usuario",0, true); //Carga de cabecera que muestra las opciones del usuario
			//$cuerpo=$this->load->view("portada_usuario",0, true);
		}
		else if ($this->session->userdata('rol')=='monitor')
		{
			//print_r('monitor');
			$cabecera= $this->load->view("cabecera_monitor",0, true); //Carga de cabecera que muestra las opciones del usuario
			//$cuerpo=$this->load->view("portada_monitor",0, true);
		}
	
		
	
		$pie= $this->load->view("pie", 0, true);
	
		//Creo la plantilla las distintas partes a mostrar
		$this->load->view('plantillac', array(
				'cabecera' => $cabecera,
				'cuerpo' => $cuerpo,
				'pie' => $pie
		));
	}
	
	/**
	 * Funcion para paginar los productos
	 * @param type $url  url del paginador que se corresponde con el controlador donde nos encontramos
	 * @param type $total_pagina numero de elementos por página
	 * @param type $total_filas numero total de filas
	 * @return type devuelve el paginador
	 */
	function paginador($url,$total_pagina,$total_filas,$segm=4){
	
		$config['uri_segment'] = $segm;
		$config['base_url']= $url;
		$config['total_rows']= $total_filas;
		$config['per_page'] = $total_pagina;
		$config['num_links'] = 2;
		$config['first_link'] = 'Primero';
		$config['last_link'] = 'Último';
		$config['full_tag_open'] = '<div id="paginacion">';
		$config['full_tag_close'] = '</div>';
	
		$this->pagination->initialize($config);
		 
		 
		return $this->pagination->create_links();
	
	}
}