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
			$data['idequipo'] = $this->input->post('select_equipo');
			$data['tipo_evento'] = $this->input->post('select_evento');
			$data['descripcion_evento'] = $this->input->post('descripcion');
			
			//$datos['fecha'] = $this->input->post('fecha');
			
			//print_r($datos['fecha']);
			
			$fecha=$this->input->post('fecha');
			$fecha=DateTime::createFromFormat('d/m/Y', $fecha);
			//$fecha_2=date("Y-m-d", $fecha);
			$fecha_nueva=$fecha->format('Y-m-d');
			
			$data['fecha']=$fecha_nueva;
			$data['hora']=$this->input->post('hora');
			//print_r($data);
			$data['hora'] = $this->input->post('hora');
			$this->mod_noticias->nuevo_evento($data);
			
		}
		else
		{
			$cuerpo = $this->load->view('anadir_evento', $datos, TRUE);
		
			$this->Plantilla($cuerpo);
				
		}
		
		
	}
	
	public function eventos_jugador()
	{
		$datos['eventos']=$this->mod_noticias->eventos_jugador();
		
		//print_r($datos);
		
		$cuerpo = $this->load->view('eventos_jugador', $datos, TRUE);
		
		$this->Plantilla($cuerpo);
	}
}
