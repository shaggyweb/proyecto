<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(__DIR__.'/controlador.php');

/**
 * Controlador Usuarios
 * Contiene toda la funcionalidad sobre los usuarios
 * @author Mario Vilches Nieves
 */
class controlador_monitor extends controlador 
{

	public function login_monitor()
	{
		//$cuerpo=$this->load->view('login_monitor',0,true);
			
		//$this->Plantilla($cuerpo);
		
		
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
			
			if($this->mod_monitor->login_monitor($usuario,$clave)==true)
			{
				$this->session->set_userdata('user',$usuario);
				//$this->session->set_userdata('rol','monitor');
				$datos['monitor']=$this->mod_monitor->buscar_monitor($usuario);
				$this->session->set_userdata('rol',$datos['monitor'][0]['rol']);
				if ($this->session->userdata('rol')=='m')
				{
					$cuerpo=$this->load->view('portada_monitor',$datos,true);
					//$this->Plantilla($cuerpo);
				}
				else if ($this->session->userdata('rol')=='a')
				{
					$cuerpo=$this->load->view('portada_admin',$datos,true);
					//$this->Plantilla($cuerpo);
				}
				
				$this->Plantilla($cuerpo);
				//redirect(base_url());
				//print_r($datos['monitor'][0]['rol']);
			}
			else
			{
				//print_r ("No crrecto");
				$data['error'] = "<h4><span class='glyphicon glyphicon-warning-sign'></span> Usuario incorrecto</h4>";
				$cuerpo=$this->load->view('login_monitor',$data,true);
				$this->Plantilla($cuerpo);
			}
		
		}
		else
		{
		
			$cuerpo=$this->load->view('login_monitor',0,true);
		
			$this->Plantilla($cuerpo);
		}
	}
	
	public function portada_monitor()
	{
		$usuario=$this->session->userdata('user');
		$datos['monitor']=$this->mod_monitor->buscar_monitor($usuario);
		$cuerpo=$this->load->view('portada_monitor',$datos,true);
		
		$this->Plantilla($cuerpo);
	}
	
	public function portada_administrador()
	{
		$usuario=$this->session->userdata('user');
		$datos['monitor']=$this->mod_monitor->buscar_monitor($usuario);
		$cuerpo=$this->load->view('portada_admin',$datos,true);
	
		$this->Plantilla($cuerpo);
	}
	
	public function ver_monitor()
	{
		//Establecimiento de las reglas de validación
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required');
		$this->form_validation->set_rules('apellidos', 'apellidos', 'trim|required');
		$this->form_validation->set_rules('dni', 'dni', 'trim|required'|'exact_length[9]|callback_DNI_valido');
		$this->form_validation->set_rules('telefono', 'telefono', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		//$this->form_validation->set_rules('foto', 'foto', 'trim|required');
		
		//Edición de los mensajes de error
		$this->form_validation->set_message('required', 'Error. Campo %s Requerido');
		$this->form_validation->set_message('valid_email', 'Error. Campo %s no válido');
		$this->form_validation->set_message('DNI_valido', 'Error. Campo %s no válido');
		
		//da formato a los errores
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		
		if ($this->form_validation->run() == TRUE)
		{
			$id_monitor=$this->input->post('idmonitor');
			$data['nombre_monitor'] = $this->input->post('nombre');
			$data['apellidos'] = $this->input->post('apellidos');
			$data['dni'] = $this->input->post('dni');
			$data['telefono'] = $this->input->post('telefono');
			$data['email'] = $this->input->post('email');
			//$data['foto'] = $this->input->post('foto');
			
			//$config['upload_path'] = realpath(APPPATH.'/../Assets/img/');
			//$config['allowed_types'] = 'gif|jpg|png';
			//$this->load->library('upload', $config);
				
			//print_r($this->upload->data());
				
			/*if (!$this->upload->do_upload('foto'))
			{
				//$error = array('error' => $this->upload->display_errors());
					
				//$this->load->view('formulario_carga', $error);
				//print_r($this->upload->display_errors());
				//print_r('Error Imagen');
				//print_r($this->input->post('foto'));
				$this->session->set_flashdata('error', 'Error al Subir el fichero');
				redirect('controlador_monitor/ver_monitor');
			}
			else
			{
				$file_info = $this->upload->data();
				$foto = $file_info['file_name'];
				
				$data['foto'] = $foto;
				//print_r($foto);
			
				*/if($this->mod_monitor->modificar_monitor($id_monitor,$data))
				{
					//$cuerpo=$this->load->view('mod_exito',0,true);
					
					//$this->Plantilla($cuerpo);
				
					//print_r("Modificacion exitosa");
					$data['mensaje']="<h4><span class='glyphicon glyphicon-ok-sign'></span> Se han modificado correctamente los datos.</h4>";
					if ($this->session->userdata('rol')=='a')
					{
						$data['enlace']=base_url("index.php/controlador_monitor/portada_administrador");
					}
					else if ($this->session->userdata('rol')=='m')
					{
						$data['enlace']=base_url("index.php/controlador_monitor/portada_monitor");
					}
					
					$cuerpo=$this->load->view('mensajes_info',$data,true);
					
					$this->Plantilla($cuerpo);
				}
				else
				{
					$data['mensaje']="<h4><span class='glyphicon glyphicon-ok-sign'></span> Error al modificar los datos.</h4>";
						
					$data['enlace']=base_url("index.php/controlador_monitor/ver_monitor");
						
					$cuerpo=$this->load->view('mensajes_info',$data,true);
						
					$this->Plantilla($cuerpo);
				}
			
		}
		else
		{
			$usuario=$this->session->userdata('user');
			$datos['monitor']=$this->mod_monitor->buscar_monitor($usuario);
			$cuerpo=$this->load->view('datos_per_monitor',$datos,true);
			
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
	
	
	public function datos_acceso_monitor()
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
			$id_monitor=$this->input->post('idmonitor');
			$data['usuario']=$this->input->post('usuario');
			$data['clave']=$this->input->post('clave');
			
			if($this->mod_monitor->modificar_monitor($id_monitor,$data))
			{
				//$cuerpo=$this->load->view('mod_exito',0,true);
					
				//$this->Plantilla($cuerpo);
			
				//print_r("Modificacion exitosa");
				$data['mensaje']="<h4><span class='glyphicon glyphicon-ok-sign'></span> Se han modificado correctamente los datos de acceso.</h4>";
					
				$data['enlace']=base_url("index.php/controlador_monitor/portada_monitor");
					
				$cuerpo=$this->load->view('mensajes_info',$data,true);
					
				$this->Plantilla($cuerpo);
			}
			else
			{
				$data['mensaje']="<h4><span class='glyphicon glyphicon-ok-sign'></span> Error al modificar los datos de acceso.</h4>";
				
				$data['enlace']=base_url("index.php/controlador_monitor/ver_monitor");
				
				$cuerpo=$this->load->view('mensajes_info',$data,true);
				
				$this->Plantilla($cuerpo);
			}
		}
		else
		{
			$usuario=$this->session->userdata('user');
			$datos['monitor']=$this->mod_monitor->buscar_monitor($usuario);
			$cuerpo=$this->load->view('datos_acceso_monitor',$datos,true);
				
			$this->Plantilla($cuerpo);
		}
		
		
		
	}
	
	public function logout_monitor()
	{
		$this->session->unset_userdata('user'); //cierre de sesión
		$this->session->unset_userdata('rol'); //cierre de sesión
		$this->session->unset_userdata('idjugador');
		//$this->session->set_userdata('logueado',false); //cierre de sesión
		redirect(site_url());
	}
	
	public function anadir_jugador()
	{
		//Establecimiento de las reglas de validación
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required');
		$this->form_validation->set_rules('apellidos', 'apellidos', 'trim|required');
		$this->form_validation->set_rules('dni', 'dni', 'trim|required'|'exact_length[9]|callback_DNI_valido');
		$this->form_validation->set_rules('telefono', 'telefono', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('fecha', 'fecha', 'trim|required');
		$this->form_validation->set_rules('tutor', 'tutor', 'trim|required');
		$this->form_validation->set_rules('equipos', 'equipos', 'required|callback_control_select');
		$this->form_validation->set_rules('sexo', 'sexo', 'trim|required');
		//$this->form_validation->set_rules('foto', 'foto', 'trim|required');
		
		//Edición de los mensajes de error
		$this->form_validation->set_message('required', 'Error. Campo %s Requerido');
		$this->form_validation->set_message('valid_email', 'Error. Campo %s no válido');
		$this->form_validation->set_message('DNI_valido', 'Error. Campo %s no válido');
		$this->form_validation->set_message('control_select', 'Error. Campo %s no válido');
		
		//da formato a los errores
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		
		if ($this->form_validation->run() == TRUE)
		{
			//$equip=$this->input->post('equipos');
			//print_r($equip);
			
			$data['nombre_jugador'] = $this->input->post('nombre');
			$data['apellidos_jugador'] = $this->input->post('apellidos');
			$data['dni'] = $this->input->post('dni');
			$data['telefono'] = $this->input->post('telefono');
			$data['email'] = $this->input->post('email');
			$data['tutor'] = $this->input->post('tutor');
			$fecha=$this->input->post('fecha');
				
			//print_r($fecha);
			$fecha=DateTime::createFromFormat('d/m/Y', $fecha);
				
			//print_r($fecha);
			//$fecha_2=date("Y-m-d", $fecha);
			$fecha_nueva=$fecha->format('Y-m-d');
				
			$data['fecha_nac']=$fecha_nueva;
			$data['sexo']=$this->input->post('sexo');
			$data['idequipo']=$this->input->post('equipos');
			
			
			$num_letras=8;
			$data['usuario']=$this->crear_nombre_usuario($data['nombre_jugador'],$data['dni']);
			$data['clave']=$this->generar_clave($num_letras);
			$this->mod_usuarios->alta_usuario($data);
				
			$this->enviar_datos_acceso($data['usuario'],$data['clave'],$data['email']);
			//print_r($data);
			
			$data['mensaje']="<h4><span class='glyphicon glyphicon-ok-sign'></span> Se ha añadido correctamente el jugador.</h4>";
			if ($this->session->userdata('rol')=='a')
			{
				$data['enlace']=base_url("index.php/controlador_monitor/portada_administrador");
			}
			else if ($this->session->userdata('rol')=='m')
			{
				$data['enlace']=base_url("index.php/controlador_monitor/portada_monitor");
			}
				
			$cuerpo=$this->load->view('mensajes_info',$data,true);
				
			$this->Plantilla($cuerpo);
			
			
		}
		else
		{
			$categorias['categorias'] = $this->mod_equipos->listar_categorias();
			
			//array_unshift($categorias['categorias'], 'Selecciones Categoria');
			
			$cuerpo=$this->load->view('anadir_jugador',$categorias,true);
				
			$this->Plantilla($cuerpo);
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
	
	public function anadir_monitor()
	{
		//Establecimiento de las reglas de validación
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required');
		$this->form_validation->set_rules('apellidos', 'apellidos', 'trim|required');
		$this->form_validation->set_rules('dni', 'dni', 'trim|required'|'exact_length[9]|callback_DNI_valido');
		$this->form_validation->set_rules('telefono', 'telefono', 'numeric|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('rol', 'rol', 'trim|required');
		//$this->form_validation->set_rules('foto', 'foto', 'trim|required');
	
		//Edición de los mensajes de error
		$this->form_validation->set_message('required', 'Error. Campo %s Requerido');
		$this->form_validation->set_message('numeric', 'Error. El campo %s debe ser numérico');
		$this->form_validation->set_message('valid_email', 'Error. Campo %s no válido');
		$this->form_validation->set_message('DNI_valido', 'Error. Campo %s no válido');
	
		//da formato a los errores
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
	
		if ($this->form_validation->run() == TRUE)
		{
			/*$id_monitor=$this->input->post('idmonitor');
			$data['nombre_monitor'] = $this->input->post('nombre');
			$data['apellidos'] = $this->input->post('apellidos');
			$data['dni'] = $this->input->post('dni');
			$data['telefono'] = $this->input->post('telefono');
			$data['email'] = $this->input->post('email');
			$data['foto'] = $this->input->post('foto');*/
				
			/*if($this->mod_monitor->modificar_monitor($id_monitor,$data))
			{
				$cuerpo=$this->load->view('mod_exito',0,true);
					
				$this->Plantilla($cuerpo);
	
				print_r("Modificacion exitosa");
				
			}*/
			
			//print_r($this->input->post('foto'));
			
			$config['upload_path'] = realpath(APPPATH.'/../Assets/img/');
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);
			
			//print_r($this->upload->data());
			
			if (!$this->upload->do_upload('foto'))
			{
				//$error = array('error' => $this->upload->display_errors());
			
				//$this->load->view('formulario_carga', $error);
				//print_r($this->upload->display_errors());
				//print_r('Error Imagen');
				//print_r($this->input->post('foto'));
				$this->session->set_flashdata('error', 'Error al Subir el fichero');
				redirect('controlador_monitor/anadir_monitor');
			}	
			else
			{
				$file_info = $this->upload->data();
				$foto = $file_info['file_name'];
				
				//print_r($foto);
				//print_r($data);
			
				/*$this->load->view('upload_success', $data);*/
				
				$dato['nombre_monitor'] = $this->input->post('nombre');
				$dato['apellidos'] = $this->input->post('apellidos');
				$dato['dni'] = $this->input->post('dni');
				$dato['telefono'] = $this->input->post('telefono');
				$dato['email'] = $this->input->post('email');
				$dato['rol'] = $this->input->post('rol');
				$dato['foto'] = $foto;
				$dato['activo'] = '1';
					
				//print_r($data);
				$num_letras=8;
				$dato['usuario']=$this->crear_nombre_usuario($dato['nombre_monitor'],$dato['dni']);
				$dato['clave']=$this->generar_clave($num_letras);
				$this->mod_monitor->alta_monitor($dato);
					
				$this->enviar_datos_acceso($dato['usuario'],$dato['clave'],$dato['email']);
				
				$data['mensaje']="<h4><span class='glyphicon glyphicon-ok-sign'></span> Se ha añadido correctamente el monitor.</h4>";
				
				$data['enlace']=base_url("index.php/controlador_monitor/portada_administrador");
				
				$cuerpo=$this->load->view('mensajes_info',$data,true);
				
				$this->Plantilla($cuerpo);
			}
		
				
		}
			else
			{
				//$usuario=$this->session->userdata('user');
				//$datos['monitor']=$this->mod_monitor->buscar_monitor($usuario);
				$cuerpo=$this->load->view('anadir_monitor',0,true);
			
				$this->Plantilla($cuerpo);
			}		
			
			
			
			//print_r($data);
			
		
	
	
	}
	
	public function crear_nombre_usuario($cadena_nombre,$cadena_dni)
	{
		$nombre_usuario=substr($cadena_nombre,0,4);
		$nombre_usuario=$nombre_usuario.(substr($cadena_dni,0,4));
		$num_letras=3;
		$nombre_usuario=$nombre_usuario.($this->generar_clave($num_letras));
		return $nombre_usuario;
	}
	
	/**
	 * Método para generar una cadena de caracteres aleatoria para el nuevo password
	 * La cadena será de cuatro caracteres
	 * @return string
	 */
	/*public function generar_clave()
	{
		$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
		$numerodeletras=6; //numero de letras para generar el texto
		$cadena = ""; //variable para almacenar la cadena generada
		for($i=0;$i<$numerodeletras;$i++)
		{
		$cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres
		entre el rango 0 a Numero de letras que tiene la cadena 
		}
		return $cadena;
	}*/
	
	/**
	 * Método que envía el nuevo password al usuario
	 * @param string $nuevo_pass Nuevo password del usuario
	 * @param array $user Array que contiene los datos del usuario
	 */
	public function enviar_datos_acceso($usu,$cla,$email)
	{
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'mail.iessansebastian.com';
		$config['smtp_user'] = 'aula4@iessansebastian.com';
		$config['smtp_pass'] = 'daw2alumno';
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from('aula4@iessansebastian.com', 'Escuela de Futbol Onuba');
		$this->email->to($email);
		$this->email->subject('Datos de Acceso');
		$this->email->message("<html><body><h2>Su nombre de usuario es: ".$usu."</h2>
				<h2>Su clave de acceso es: ".$cla."</h2>
				<h2>Puede cambiar su usuario y clave de acceso en su panel de control.</h2></body></html>");
			
		$this->email->send();
			
	}
	
	public function reestablecer_pass_monitor()
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
			$query = $this->mod_monitor->comprobar_mail_monitor($email);
			
			if($query)
			{
			
				$monitor=$query['nombre_monitor']." ".$query['apellidos'];
			
				$usuario=$query['usuario'];
			
				$num_letras_aleatorias=8;
			
				$nuevo_pass=$this->generar_clave($num_letras_aleatorias);
			
				$cod_monitor=$query['idmonitor'];
			
				$this->mod_monitor->nuevo_password($cod_monitor,$nuevo_pass);
			
				$this->email_reestablecer_pass($usuario,$nuevo_pass,$monitor,$email);
				
				$data['mensaje']="<h4><span class='glyphicon glyphicon-ok-sign'></span> Se ha enviado a su e-mail su nuevo password de acceso.</h4>";
				
				$data['enlace']=base_url();
				
				$cuerpo=$this->load->view('mensajes_info',$data,true);
				
				$this->Plantilla($cuerpo);
				
			}
			else
			{
				$data['error'] = "<h4><span class='glyphicon glyphicon-warning-sign'></span> E-Mail incorrecto</h4>";
				
				$cuerpo=$this->load->view('reestablecer_pass_monitor',$data,true);
				
				$this->Plantilla($cuerpo);
			}
			
			
			
			
		
		}
		else
		{
			$cuerpo=$this->load->view('reestablecer_pass_monitor',0,true);
				
			$this->Plantilla($cuerpo);
		}
	}
	
	/*public function Email_No_Valido($email)
	{
		$query = $this->mod_monitor->comprobar_mail_monitor($email);
		if($query)
		{
			return true;
		}
		else
		{
			return false;
		}
	}*/
	
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
	
	
	
	public function prueba_paneles()
	{
		$cuerpo=$this->load->view('prueba_paneles',0,true);
			
		$this->Plantilla($cuerpo);
	}
	
	public function listar_monitores()
	{
		$datos['monitores']=$this->mod_monitor->listar_monitores();
		
		$cuerpo=$this->load->view('lista_monitores',$datos,true);
			
		$this->Plantilla($cuerpo);
	}
	
	
	public function mostrar_plantillas()
	{
		$this->form_validation->set_rules('equipos', 'equipos', 'required|callback_control_select');
		
		$this->form_validation->set_message('control_select', 'Error. Campo %s no válido');
		
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		
		if ($this->form_validation->run() == TRUE)
		{
			$id_equipo=$this->input->post('equipos');
			
			$datos['equipo']=$this->mod_equipos->equipo_id($id_equipo);
			
			$datos['jugadores']=$this->mod_equipos->jugadores_equipo($id_equipo);
			
			$cuerpo=$this->load->view('jugadores_equipo',$datos,true);
			
			$this->Plantilla($cuerpo);
			
			//print_r($datos);
		}
		else
		{
			$categorias['categorias'] = $this->mod_equipos->listar_categorias();
				
			//array_unshift($categorias['categorias'], 'Selecciones Categoria');
				
			//$cuerpo=$this->load->view('anadir_jugador',$categorias,true);
			
			
			//$data['equipos']=$this->mod_equipos->todos_equipos();
		
			$cuerpo=$this->load->view('mostrar_plantillas',$categorias,true);
			
			$this->Plantilla($cuerpo);
		}
	}
	
	public function listar_monitores_admin()
	{
		$datos['monitores']=$this->mod_monitor->listar_monitores();
		
		$cuerpo=$this->load->view('lista_monitores_admin',$datos,true);
			
		$this->Plantilla($cuerpo);
	}
	
	public function borrar_monitor($idmonitor)
	{
		$datos['monitor']=$this->mod_monitor->buscar_monitor_id($idmonitor);
		
		//print_r($datos);
		$cuerpo=$this->load->view('confirmar_borrado_monitor',$datos,true);
		
		$this->Plantilla($cuerpo);
		
	}
	
	public function borrado_monitor($idmonitor)
	{
		$this->mod_monitor->borrado_monitor($idmonitor);
		
		$datos['monitores']=$this->mod_monitor->listar_monitores();
	
		//print_r($datos);
		$cuerpo=$this->load->view('lista_monitores_admin',$datos,true);
	
		$this->Plantilla($cuerpo);
	
	}
	
	/*public function mostrar_plantillas()
	{
		$datos['equipos']=$this->mod_equipos->todos_equipos();
		
		$cuerpo=$this->load->view('ver_plantillas',$datos,true);
			
		$this->Plantilla($cuerpo);
		
		
	}*/
	
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
		/*public function DNI_valido($str) 
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
		}*/
		
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
					$data['error'] = "<h4><span class='glyphicon glyphicon-warning-sign'></span> Usuario incorrecto</h4>";
					$cuerpo=$this->load->view('login_monitor',$data,true);
					$this->Plantilla($cuerpo);
					
				}
					
			}
			else
			{
			
				$cuerpo=$this->load->view('login_monitor',0,true);
			
				$this->Plantilla($cuerpo);
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
