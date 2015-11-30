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
		$categoria['categoria'] = $this->mod_equipos->listar_tipo_equipo();
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
		else if ($this->session->userdata('rol')=='m')
		{
			//print_r('monitor');
			$cabecera= $this->load->view("cabecera_monitor",0, true); //Carga de cabecera que muestra las opciones del usuario
			//$cuerpo=$this->load->view("portada_monitor",0, true);
		}
		else if ($this->session->userdata('rol')=='a') 
		{
			$cabecera= $this->load->view("cabecera_admin",0, true); //Carga de cabecera que muestra las opciones del usuario
		}
	
		
	
		$pie= $this->load->view("pie", 0, true);
	
		//Creo la plantilla las distintas partes a mostrar
		$this->load->view('plantilla', array(
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
	function paginador($url,$total_pagina,$total_filas,$segm=3){
	
		$config['uri_segment'] = $segm;
		$config['base_url']= $url;
		$config['total_rows']= $total_filas;
		$config['per_page'] = $total_pagina;
		$config['num_links'] = 2;
		  $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
	
		$this->pagination->initialize($config);
		 
		 
		return $this->pagination->create_links();
	
	}
	
	/**
	 * Método para generar una cadena de caracteres aleatoria para el nuevo password
	 * La cadena será de cuatro caracteres
	 * @return string
	 */
	public function generar_clave($numerodeletras)
	{
		$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
		//$numerodeletras=6; //numero de letras para generar el texto
		$cadena = ""; //variable para almacenar la cadena generada
		for($i=0;$i<$numerodeletras;$i++)
		{
		$cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres
		entre el rango 0 a Numero de letras que tiene la cadena */
		}
		return $cadena;
	}
}