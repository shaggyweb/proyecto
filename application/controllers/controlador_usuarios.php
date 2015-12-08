<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(__DIR__.'/controlador.php');

/**
 * Controlador Usuarios
 * Contiene toda la funcionalidad sobre los usuarios
 * @author Mario Vilches Nieves
 */
class controlador_usuarios extends controlador 
{

	public function pagina_login()
	{
		$cuerpo=$this->load->view('login_usuario',0,true);
			
		$this->Plantilla($cuerpo);
	}
	
	
	public function login_usuario()
	{
		//Establecimiento de las reglas de validación
		$this->form_validation->set_rules('usuario', 'usuario', 'trim|required');
		$this->form_validation->set_rules('clave', 'clave', 'trim|required');
		
		//Edición de los mensajes de error
		$this->form_validation->set_message('required', 'Error. Campo %s Requerido');
		
		//da formato a los errores
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		
		if ($this->form_validation->run() == TRUE)
		{
			$usuario = $this->input->post('usuario');
			$clave = $this->input->post('clave');
				
			if($this->mod_usuarios->login_usuario($usuario,$clave)==true)
			{
				$this->session->set_userdata('user',$usuario);
				$this->session->set_userdata('rol','usuario');
			
				$datos['usuario']=$this->mod_usuarios->buscar_usuario($usuario);
			
				$cuerpo=$this->load->view('portada_usuario',$datos,true);
				$this->Plantilla($cuerpo);
			}
			else
			{
				$data['error'] = "<h4><span class='glyphicon glyphicon-warning-sign'></span> Usuario incorrecto</h4>";
				$cuerpo=$this->load->view('login_usuario',$data,true);
				$this->Plantilla($cuerpo);
			}
				
		}
		else
		{
		
			$cuerpo=$this->load->view('login_usuario',0,true);
		
			$this->Plantilla($cuerpo);
		}
	}
	
	public function logout_usuario()
	{
		$this->session->unset_userdata('user'); //cierre de sesión
		$this->session->unset_userdata('rol'); //cierre de sesión
		//$this->session->set_userdata('logueado',false); //cierre de sesión
		redirect(site_url());
	}
	
	
	public function portada_usuario()
	{
		$usuario=$this->session->userdata('user');
		$datos['usuario']=$this->mod_usuarios->buscar_usuario($usuario);
		$cuerpo=$this->load->view('portada_usuario',$datos,true);
	
		$this->Plantilla($cuerpo);
	}
	
	
	public function ver_usuario()
	{
		//Establecimiento de las reglas de validación
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required');
		$this->form_validation->set_rules('apellidos', 'apellidos', 'trim|required');
		$this->form_validation->set_rules('dni', 'dni', 'trim|required'|'exact_length[9]|callback_DNI_valido');
		$this->form_validation->set_rules('telefono', 'telefono', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('tutor', 'tutor', 'trim|required');
		$this->form_validation->set_rules('fecha', 'fecha', 'trim|required');
		$this->form_validation->set_rules('sexo', 'sexo', 'trim|required');
		
	
		//Edición de los mensajes de error
		$this->form_validation->set_message('required', 'Error. Campo %s Requerido');
		$this->form_validation->set_message('valid_email', 'Error. Campo %s no válido');
		$this->form_validation->set_message('DNI_valido', 'Error. Campo %s no válido');
	
		//da formato a los errores
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
	
		if ($this->form_validation->run() == TRUE)
		{
			$id_jugador=$this->input->post('idusuario');
			$data['nombre_jugador'] = $this->input->post('nombre');
			$data['apellidos_jugador'] = $this->input->post('apellidos');
			$data['dni'] = $this->input->post('dni');
			$data['telefono'] = $this->input->post('telefono');
			$data['email'] = $this->input->post('email');
			$data['sexo'] = $this->input->post('sexo');
			$data['tutor'] = $this->input->post('tutor');
			//$fecha=$this->input->post('fecha');
			
			$fecha=$this->input->post('fecha');
			
			//print_r($fecha);
			$fecha=DateTime::createFromFormat('d/m/Y', $fecha);
			
			//print_r($fecha);
			//$fecha_2=date("Y-m-d", $fecha);
			$fecha_nueva=$fecha->format('Y-m-d');
			
			$data['fecha_nac']=$fecha_nueva;
			
			//print_r($data);
				
			if($this->mod_usuarios->modificar_usuario($id_jugador,$data))
			{
				$data['mensaje']="<h4><span class='glyphicon glyphicon-ok-sign'></span> Se han modificado los datos del usuario correctamente.</h4>";
				
				$data['enlace']=base_url();
				
				$cuerpo=$this->load->view('mensajes_info',$data,true);
				
				$this->Plantilla($cuerpo);
			}
		}
		else
		{
			$usuario=$this->session->userdata('user');
			$datos['usuario']=$this->mod_usuarios->buscar_usuario($usuario);
			$cuerpo=$this->load->view('datos_por_jugador',$datos,true);
				
			$this->Plantilla($cuerpo);
		}
	
	
	}
	
	public function datos_acceso_usuario()
	{
		//Establecimiento de las reglas de validación
		$this->form_validation->set_rules('usuario', 'usuario', 'trim|required');
		$this->form_validation->set_rules('clave', 'clave', 'trim|required');
	
	
		//Edición de los mensajes de error
		$this->form_validation->set_message('required', 'Error. Campo %s Requerido');
	
		//da formato a los errores
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
	
		if ($this->form_validation->run() == TRUE)
		{
			$id_jugador=$this->input->post('idusuario');
			$data['usuario']=$this->input->post('usuario');
			$data['clave']=$this->input->post('clave');
				
			if($this->mod_usuarios->modificar_usuario($id_jugador,$data))
			{
				$data['mensaje']="<h4><span class='glyphicon glyphicon-ok-sign'></span> Se han modificado los datos de acceso del usuario correctamente.</h4>";
				
				$data['enlace']=base_url();
				
				$cuerpo=$this->load->view('mensajes_info',$data,true);
				
				$this->Plantilla($cuerpo);
			}
		}
		else
		{
			$usuario=$this->session->userdata('user');
			$datos['usuario']=$this->mod_usuarios->buscar_usuario($usuario);
			$cuerpo=$this->load->view('datos_acceso_usuario',$datos,true);
	
			$this->Plantilla($cuerpo);
		}
	
	
	
	}
	
	
	public function reestablecer_pass_usuario()
	{
		//Establecimiento de las reglas de validación
	
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
	
	
	
		//Edición de los mensajes de error
		$this->form_validation->set_message('required', 'Error. Campo %s Requerido');
		$this->form_validation->set_message('valid_email', 'Error. Campo %s no válido');
		//$this->form_validation->set_message('Email_No_Valido', 'Error. Campo %s no válido');
	
		//da formato a los errores
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
	
		if ($this->form_validation->run() == TRUE)
		{
			$email=$this->input->post('email');
			$query = $this->mod_usuarios->comprobar_mail_usuario($email);
			
			if($query)
			{
				
				$jugador=$query['nombre_jugador']." ".$query['apellidos_jugador'];
				
				$usuario=$query['usuario'];
				
				$num_letras_aleatorias=8;
				
				$nuevo_pass=$this->generar_clave($num_letras_aleatorias);
				
				$cod_usuario=$query['idjugador'];
				
				$this->mod_usuarios->nuevo_password($cod_usuario,$nuevo_pass);
				
				$this->email_reestablecer_pass($usuario,$nuevo_pass,$jugador,$email);
				
				$data['mensaje']="<h4><span class='glyphicon glyphicon-ok-sign'></span> Se ha enviado a su e-mail su nuevo password de acceso.</h4>";
				
				$data['enlace']=base_url();
				
				$cuerpo=$this->load->view('mensajes_info',$data,true);
				
				$this->Plantilla($cuerpo);
			}
			else
			{
				$data['error'] = "<h4><span class='glyphicon glyphicon-warning-sign'></span> E-Mail incorrecto</h4>";
				
				$cuerpo=$this->load->view('reestablecer_pass_usuario',$data,true);
				
				$this->Plantilla($cuerpo);
			}
				
				
				
				
	
		}
		else
		{
			$cuerpo=$this->load->view('reestablecer_pass_usuario',0,true);
	
			$this->Plantilla($cuerpo);
		}
	}
	
	public function Email_No_Valido($email)
	{
		$query = $this->mod_usuarios->comprobar_mail_usuario($email);
		if($query)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function email_reestablecer_pass($usu,$pass,$nombre,$correo)
	{
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'mail.iessansebastian.com';
		$config['smtp_user'] = 'aula4@iessansebastian.com';
		$config['smtp_pass'] = 'daw2alumno';
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from('aula4@iessansebastian.com', 'Escuela de Futbol Onuba');
		$this->email->to($correo);
		$this->email->subject('Nuevo Password');
		$this->email->message("<html><body><h2>Nuevo Password</h2>
				<p>".$nombre."</p>
				<p>Se ha reestablecido la contraseña para el usuario: ".$usu."</p>
				<p>La nueva contraseña es: ".$pass."</p></body></html>");
			
		$this->email->send();
	}
	
	
	public function lista_mensajes($inicio=0)
	{
		$usuario=$this->session->userdata('user');
		$datos_jugador=$this->mod_usuarios->buscar_usuario($usuario);
		
		//print_r($datos_jugador);
		
		$idjugador=$datos_jugador[0]['idjugador'];
		//parametros para el paginador
		$url = site_url('controlador_usuarios/lista_mensajes');
		$total_pagina = 2;
		$total_filas = $this->mod_mensajes->total_mensajes($idjugador);
		$segm = 3;
		
		//print_r($total_filas);
		//llamada al paginador
		
		$datos['paginador'] = $this->paginador($url, $total_pagina, $total_filas, $segm);
		
		$datos['mensajes'] = $this->mod_usuarios->lista_mensajes($idjugador,$inicio, $total_pagina);
		
		$datos['nuevos']=$this->mod_usuarios->mensajes_nuevos($idjugador);
		
		$cuerpo=$this->load->view('lista_mensajes_jug',$datos,true);
		
		$this->Plantilla($cuerpo);
		
		//print_r($datos['paginador']);
		
		
	}
	
	public function borrar_jugador($idjugador)
	{
		$datos['jugador']=$this->mod_usuarios->buscar_usuario_id($idjugador);
		
		
		
		$cuerpo=$this->load->view('confirmar_borrado_jug',$datos,true);
		
		$this->Plantilla($cuerpo);
		
		//print_r('dsdsdsd');
	}
	
	
	
	
	
	
	
	/**
	 * Método que da de alta en la BD de un usuario
	 */
	public function alta()
	{
		//Obtencion de todas las provincias para crear el select
		$provincias['provincias'] = $this->mod_provincias->lista_provincias();
		
		//Establecimiento de las reglas de validación
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required');
		$this->form_validation->set_rules('apellidos', 'apellidos', 'trim|required');
		$this->form_validation->set_rules('dni', 'dni', 'trim|required|exact_length[9]|callback_DNI_valido');
		$this->form_validation->set_rules('direccion', 'direccion', 'trim|required');
		$this->form_validation->set_rules('postal', 'postal', 'trim|required|integer|exact_length[5]');
		$this->form_validation->set_rules('poblacion', 'poblacion', 'required|max_length[20]|xss_clean|alpha|trim');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('usuario', 'usuario', 'trim|required|callback_comprobar_nombre');
		$this->form_validation->set_rules('email', 'email', 'required|max_length[45]|valid_email|xss_clean|trim');
		
		//Edición de los mensajes de error
		$this->form_validation->set_message('required', 'Error. Campo Requerido');
		$this->form_validation->set_message('exact_length', 'Error. Número de dígitos incorrecto');
		$this->form_validation->set_message('valid_email', 'Error. Email no válido');
		$this->form_validation->set_message('max_length', 'Error. Campo demasiado largo');
		$this->form_validation->set_message('alpha', 'Error. El campo no puede contener números');
		$this->form_validation->set_message('integer', 'Error. El campo solo puede contener números');
		$this->form_validation->set_message('DNI_valido', 'Error. DNI no válido');
		$this->form_validation->set_message('comprobar_nombre', 'Error. Nombre de usuario ya usado');
		
		//da formato a los errores
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		
		if ($this->form_validation->run() == TRUE)
		{
			$datos['nombre'] = $this->input->post('nombre');
			$datos['apellidos'] = $this->input->post('apellidos');
			$datos['dni'] = $this->input->post('dni');
			$datos['direccion'] = $this->input->post('direccion');
			$datos['cod_postal'] = $this->input->post('postal');
			$datos['cod_provincia'] = $this->input->post('select_provincias');
			$datos['poblacion'] = $this->input->post('poblacion');
			$datos['usuario'] = $this->input->post('usuario');
			$datos['correo'] = $this->input->post('email');
			$datos['clave'] = do_hash($this->input->post('password'),'md5');
			
			$this->mod_usuarios->alta_usuario($datos);
			
			$cuerpo=$this->load->view('alta_exito',0,true);
			
			$this->Plantilla($cuerpo);
			
		}
		else
		{
		
			$cuerpo=$this->load->view('alta_usuario',$provincias,true);
	
			$this->Plantilla($cuerpo);
		}
	}
		
		
		/**
		 * Método que valida un DNI
		 * @param string $str Cadena a validar
		 * @return boolean true si el DNI introducido es correcto
		 */
		public function DNI_valido($str) 
		{
			$str = trim($str);
			$str = str_replace("-", "", $str);
			$str = str_ireplace(" ", "", $str);
			if (!preg_match("/^[0-9]{7,8}[a-zA-Z]{1}$/", $str)) 
			{
				return FALSE;
			} else 
			{
				$n = substr($str, 0, -1);
				$letter = substr($str, -1);
				$letter2 = substr("TRWAGMYFPDXBNJZSQVHLCKE", $n % 23, 1);
				if (strtolower($letter) != strtolower($letter2))
					return FALSE;
			}
			return TRUE;
		}
		
		/**
		 * Método para loguear al usuario
		 * Comprueba que el nombre de usuario y clave son correctos
		 */
		public function login()
		{
			//Establecimiento de las reglas de validación
			$this->form_validation->set_rules('clave', 'clave', 'trim|md5');
			$this->form_validation->set_rules('usu', 'usu', 'trim');
			
			if ($this->form_validation->run() == TRUE)
			{
				$usuario = $this->input->post('usu');
				$clave = $this->input->post('clave');
				
				if ($this->mod_usuarios->login($usuario, $clave) == true)
				{
					
					//Usuario logueado correctamente
					//Inicio de sesión
					$this->session->set_userdata('user',$usuario);
					$this->session->set_userdata('logueado',true);
					
					redirect(base_url());
				}
				else
				{
					redirect(base_url());
					
				}
					
			}
			
		}
		
		/**
		 * Método para modificar los datos de un usuario
		 */
		public function mod_usuario()
		{
			$usuario=$this->session->userdata('user');
			
			
			//Obtencion de todas las provincias para crear el select
			$datos['provincias'] = $this->mod_provincias->lista_provincias();
			
			$datos['user']=$this->mod_usuarios->buscar_usuario($usuario)[0];
			
			//Establecimiento de las reglas de validación
			$this->form_validation->set_rules('nombre', 'nombre', 'trim|required');
			$this->form_validation->set_rules('apellidos', 'apellidos', 'trim|required');
			$this->form_validation->set_rules('dni', 'dni', 'trim|required|exact_length[9]|callback_DNI_valido');
			$this->form_validation->set_rules('direccion', 'direccion', 'trim|required');
			$this->form_validation->set_rules('postal', 'postal', 'trim|required|integer|exact_length[5]');
			$this->form_validation->set_rules('poblacion', 'poblacion', 'required|max_length[20]|xss_clean|alpha|trim');
			$this->form_validation->set_rules('email', 'email', 'required|max_length[45]|valid_email|xss_clean|trim');
			
			//Edición de los mensajes de error
			$this->form_validation->set_message('required', 'Error. Campo Requerido');
			$this->form_validation->set_message('exact_length', 'Error. Número de dígitos incorrecto');
			$this->form_validation->set_message('valid_email', 'Error. Email no válido');
			$this->form_validation->set_message('max_length', 'Error. Campo demasiado largo');
			$this->form_validation->set_message('alpha', 'Error. El campo no puede contener números');
			$this->form_validation->set_message('integer', 'Error. El campo solo puede contener números');
			$this->form_validation->set_message('DNI_valido', 'Error. DNI no válido');
			
			//da formato a los errores
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
			
			if ($this->form_validation->run() == TRUE)
			{
				$cod_usuario=$this->input->post('cod_usuario');
				$user['nombre'] = $this->input->post('nombre');
				$user['apellidos'] = $this->input->post('apellidos');
				$user['dni'] = $this->input->post('dni');
				$user['direccion'] = $this->input->post('direccion');
				$user['cod_postal'] = $this->input->post('postal');
				$user['cod_provincia'] = $this->input->post('select_provincias');
				$user['poblacion'] = $this->input->post('poblacion');
				$user['correo'] = $this->input->post('email');
				
				if($this->mod_usuarios->modificar_usuario($cod_usuario,$user))
				{
					$cuerpo=$this->load->view('mod_exito',0,true);
					
					$this->Plantilla($cuerpo);
				} 
				
			}
			else
			{
			
				$cuerpo=$this->load->view('mod_usuario',$datos,true);
			
				$this->Plantilla($cuerpo);
			}
		}
		
		
		/**
		 * Método que comprueba el uso de un nombre de usuario
		 * Permitirá que no se repitan nombres de usuario
		 * @param unknown $nombre
		 * @return boolean
		 */
		public function comprobar_nombre($nombre)
		{
		
			$usuario = $this->mod_usuarios->existe_nombre_user($nombre);
		
			if ($usuario)
			{
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
		
		/**
		 * Método previo para dar de baja a un usuario
		 * Nos envía a una pantalla de confirmación
		 */
		public function dar_baja()
		{
			$usuario=$this->session->userdata('user');
			
			$datos['usuario']=$this->mod_usuarios->existe_nombre_user($usuario);
			
			$cuerpo=$this->load->view('dar_baja',$datos,true);
			
			$this->Plantilla($cuerpo);
			
		}
		
		/**
		 * Método que da de baja a un usuario
		 * No se borra de la BD sino que se le pone a false en el campo activo de dicha BD
		 * @param integer $cod Código del usuario a borrar
		 */
		public function baja_user($cod)
		{
			$this->mod_usuarios->baja_user($cod);
			
			//cerramos la sesión de dicho usuario
			$this->logout();
		}
		
		/**
		 * Método que cierra la sesión de un usuario
		 */
		public function logout()
		{
			$this->session->unset_userdata('user'); //cierre de sesión
			$this->session->set_userdata('logueado',false); //cierre de sesión
			redirect(site_url());
		}
		
		/**
		 * Método para que el usuario pueda recuperar una contraseña
		 */
		public function reestablecer_pass()
		{
			$this->form_validation->set_rules('email', 'email', 'required|max_length[45]|valid_email|xss_clean|trim');
			
			$this->form_validation->set_message('valid_email', 'Error. Email no válido');
			$this->form_validation->set_message('required', 'Error. Campo Requerido');
			
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
			
			if ($this->form_validation->run() == TRUE)
			{
				$email = $this->input->post('email');
				//comprobamos que existe el email en la BD
				$query = $this->mod_usuarios->comprobar_mail($email);
				if ($query) //la consulta devuelve algún registro por lo que el email esta en la BD
				{
					$usuario['nombre'] = $query['usuario'];
					$usuario['email'] = $query['correo'];
					$cod_user= $query['cod_usuario'];
					$cadena_aleatoria=$this->generar_cadena();
					$nuevo_pass=do_hash($cadena_aleatoria,'md5');
					
					$this->mod_usuarios->nuevo_password($cod_user,$nuevo_pass);
					$this->enviar_pass($cadena_aleatoria, $usuario);
					
					$cuerpo=$this->load->view('nuevo_pass_ok','',true);
					
					$this->Plantilla($cuerpo);
	
				}
				else
				{
					$cuerpo=$this->load->view('error_email','',true);
					$this->Plantilla($cuerpo);
				}
				
				
			}
			else
			{
			
				$cuerpo=$this->load->view('reestablecer_pass','',true);
				$this->Plantilla($cuerpo);
			}
			
		}
		
		//http://www.elcodigofuente.com/usando-rand-crear-cadena-aleatoria-806/
		/**
		 * Método para generar una cadena de caracteres aleatoria para el nuevo password
		 * La cadena será de cuatro caracteres
		 * @return string
		 */
		public function generar_cadena()
		{
			$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
			$numerodeletras=4; //numero de letras para generar el texto
			$cadena = ""; //variable para almacenar la cadena generada
			for($i=0;$i<$numerodeletras;$i++)
			{
    			$cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
				entre el rango 0 a Numero de letras que tiene la cadena */
			}
			return $cadena;
		}
		
		/**
		 * Método que envía el nuevo password al usuario
		 * @param string $nuevo_pass Nuevo password del usuario
		 * @param array $user Array que contiene los datos del usuario
		 */
		public function enviar_pass($nuevo_pass,$user)
		{
				$config['protocol'] = 'smtp';
				$config['smtp_host'] = 'mail.iessansebastian.com';
				$config['smtp_user'] = 'aula4@iessansebastian.com';
				$config['smtp_pass'] = 'daw2alumno';
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->from('aula4@iessansebastian.com', 'Tecnonuba');
				$this->email->to($user['email']);
				$this->email->subject('Nuevo Password');
				$this->email->message("<html><body><h2>Su nuevo password es: ".$nuevo_pass."</h2></body></html>");
			
				$this->email->send();
			
		}
}