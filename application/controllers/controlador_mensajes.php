<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require(__DIR__.'/controlador.php');

class controlador_mensajes extends controlador {
	function __construct() {
		parent::__construct();
	}
	
	public function inicial_mensaje()
	{
		//Establecimiento de las reglas de validación
		
		$this->form_validation->set_rules('jugadores', 'jugadores', 'required|callback_control_select');
		
		//Edición de los mensajes de error
		
		$this->form_validation->set_message('control_select', 'Error. Campo %s no válido');
		
		//da formato a los errores
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		
		if ($this->form_validation->run() == TRUE)
		{
			//$equip=$this->input->post('equipos');
			//print_r($equip);
				
			$idjugador = $this->input->post('jugadores');
			
			$this->session->set_userdata('idjugador', $idjugador);
			
			$data['jugador']=$this->mod_usuarios->buscar_usuario_id($idjugador);
			
			$cuerpo=$this->load->view('anadir_mensaje',$data,true);
				
			$this->Plantilla($cuerpo);
		}
		else
		{
			$categorias['categorias'] = $this->mod_equipos->listar_categorias();
				
			//array_unshift($categorias['categorias'], 'Selecciones Categoria');
				
			$cuerpo=$this->load->view('pantalla_inicial_mensajes',$categorias,true);
			
			$this->Plantilla($cuerpo);
		}
		
		
	}
	
	
	public function anadir_mensaje($idjug)
	{
		
		
		//$idjugador = $this->session->userdata('idjugador');
		
		$data['jugador']=$this->mod_usuarios->buscar_usuario_id($idjug);
		
		
		//Establecimiento de las reglas de validación
		
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required');
		$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|required');
	
		//Edición de los mensajes de error
	
		$this->form_validation->set_message('required', 'Error. Campo %s Requerido');
	
		//da formato a los errores
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
	
		if ($this->form_validation->run() == TRUE)
		{
			//$equip=$this->input->post('equipos');
			//print_r($equip);
	
			//$idjugador = $this->input->post('idjugador');
			
			$usuario=$this->session->userdata('user');
			$monitor=$this->mod_monitor->buscar_monitor($usuario);
			$datos['idmonitor']=$monitor[0]['idmonitor'];
			$datos['idjugador']=$this->input->post('idjugador');
			$datos['nombre_notificacion']=$this->input->post('nombre');
			$datos['descripcion']=$this->input->post('descripcion');
			$datos['fecha']=date('Y-m-d');
			$datos['estado']='N';
			
			$this->mod_mensajes->anadir_mensaje($datos);
			
			//print_r($datos);
			
				
			/*$data['jugador']=$this->mod_usuarios->buscar_usuario_id($idjugador);
				
			$cuerpo=$this->load->view('anadir_mensaje',$data,true);
	
			$this->Plantilla($cuerpo);*/
		}
		else
		{
			
			//$categorias['categorias'] = $this->mod_equipos->listar_categorias();
	
			//array_unshift($categorias['categorias'], 'Selecciones Categoria');
	
			$cuerpo=$this->load->view('anadir_mensaje',$data,true);
				
			$this->Plantilla($cuerpo);
		}
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
	
	public function llena_jugadores()
	{
		$options = "";
		if($this->input->post('equipos'))
		{
			$equipo = $this->input->post('equipos');
			$equipo = $this->mod_equipos->jugadores_equipo($equipo);
			
			foreach($equipo as $fila)
			{
				?>
							<option value="<?=$fila['idjugador'] ?>"><?=$fila['nombre_jugador']." ".$fila['apellidos_jugador'] ?></option>
						<?php
				}
			}
		}

		
		public function control_select($valor_select)
		{
			if (($valor_select==0)||($valor_select==""))
			{
				return false;
			}
			else
			{
				return true;
			}
		}
		
		public function detalles_mensaje($idmensaje)
		{
			$datos['mensaje']=$this->mod_mensajes->detalle_mensaje($idmensaje);
			
			//print_r($datos);
			
			$cuerpo=$this->load->view('detalle_mensaje',$datos,true);
			
			$this->Plantilla($cuerpo);
		
		}
		
		public function cambiar_estado_mensaje($idmensaje)
		{
			//$datos['mensaje']=$this->mod_mensajes->detalle_mensaje($idmensaje);
			
			if($this->mod_mensajes->cambiar_estado_mensaje($idmensaje))
			{
				print_r('hecho');
			}
			
				
			//print_r($datos);
				
			//$cuerpo=$this->load->view('detalle_mensaje',$datos,true);
				
			//$this->Plantilla($cuerpo);
			
			redirect('controlador_usuarios/lista_mensajes');
		
		}
	
	
}	