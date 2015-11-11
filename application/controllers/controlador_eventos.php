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
	
	public function anadir_evento()
	{
		
		
		$datos['tipo_evento']=$this->mod_noticias->select_eventos();
		
		$datos['nombre_equipo']=$this->mod_equipos->select_equipos();
		
		//Establecimiento de las reglas de validación
		//$this->form_validation->set_rules('nombre', 'nombre', 'trim|required');
		//$this->form_validation->set_rules('apellidos', 'apellidos', 'trim|required');
		$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|required');
		$this->form_validation->set_rules('fecha', 'fecha', 'trim|required');
		$this->form_validation->set_rules('hora', 'hora', 'trim|required');
		//$this->form_validation->set_rules('foto', 'foto', 'trim|required');
		
		//Edición de los mensajes de error
		$this->form_validation->set_message('required', 'Error. Campo %s Requerido');
		//$this->form_validation->set_message('valid_email', 'Error. Campo %s no válido');
		
		//da formato a los errores
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		
		if ($this->form_validation->run() == TRUE)
		{
			$datos['idequipo'] = $this->input->post('select_equipo');
			$datos['tipo_evento'] = $this->input->post('select_evento');
			$datos['descripcion'] = $this->input->post('descripcion');//
			
			$datos['fecha'] = $this->input->post('fecha');
			
			//print_r($datos['fecha']);
			
			$fecha=$this->input->post('fecha');
			$fecha=DateTime::createFromFormat('d/m/Y', $fecha);
			//$fecha_2=date("Y-m-d", $fecha);
			$fecha_nueva=$fecha->format('Y-m-d');
			print_r($fecha_nueva);
			/*$datos['hora'] = $this->input->post('hora');*/
			
		}
		else
		{
			$cuerpo = $this->load->view('anadir_evento', $datos, TRUE);
		
			$this->Plantilla($cuerpo);
				
		}
		
		
	}
}
