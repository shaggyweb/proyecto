<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require(__DIR__.'/controlador.php');

class controlador_eventos extends controlador {
	function __construct() {
		parent::__construct();
	}

	
	function ver_eventos($inicio=0)
	{
		//parametros para el paginador
		$url = site_url('controlador_eventos/ver_eventos');
		$total_pagina = 2;
		$total_filas = $this->mod_noticias->total_eventos();
		$segm = 3;
		//llamada al paginador
		$datos['paginador'] = $this->paginador($url, $total_pagina, $total_filas, $segm);
		
		
		$datos['titulo']="Eventos de la Escuela";
		$datos['eventos']=$this->mod_noticias->listar_noticias($inicio, $total_pagina);
		
		$cuerpo = $this->load->view('lista_eventos_pag', $datos , TRUE);
		
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
		$usuario=$this->session->userdata('user');
		$datos_jugador=$this->mod_usuarios->buscar_usuario($usuario);
		
		//print_r($datos_jugador);
		
		$idjugador=$datos_jugador[0]['idjugador'];
		
		$datos['eventos']=$this->mod_noticias->eventos_jugador($idjugador);
		
		//print_r($datos);
		
		$cuerpo = $this->load->view('eventos_jugador', $datos, TRUE);
		
		$this->Plantilla($cuerpo);
	}
	
	public function pantalla_buscador()
	{
		
		
		//limpiamos los campos del formulario, no necesitamos validar
		$this->form_validation->set_rules('idequipo', 'idequipo', 'trim|max_length[40]|xss_clean');
		$this->form_validation->set_rules('tipo_evento', 'tipo_evento', 'trim|xss_clean');
		$this->form_validation->set_rules('fecha', 'fecha', 'trim|xss_clean');
		
		if ($this->form_validation->run() == TRUE)
		{
			$todos_campos_vacios=True;
			
			if($this->input->post('idequipo')!="0")
			{
				$campos['idequipo']=$this->input->post('idequipo');
				$todos_campos_vacios=false;
			}
			if($this->input->post('tipo_evento')!="0")
			{
				$campos['tipo_evento']=$this->input->post('tipo_evento');
				$todos_campos_vacios=false;
			}
			
			if ($this->input->post('fecha')!="")
			{
				$fecha=$this->input->post('fecha');
			
				//print_r($fecha);
				$fecha=DateTime::createFromFormat('d/m/Y', $fecha);
			
				//print_r($fecha);
				//$fecha_2=date("Y-m-d", $fecha);
				$fecha_nueva=$fecha->format('Y-m-d');
				$campos['fecha']=$fecha_nueva;
			
				$todos_campos_vacios=false;
			}
			//$data['resultados']=$this->busqueda();
			
			//print_r($campos);
			if($todos_campos_vacios==false)
			{
				$datos=$this->mod_noticias->nueva_busqueda($campos);
			
				print_r($datos);
			}
		}
		else
		{
			/*$data = array('titulo' => 'Buscador con múltiples criterios',
				'resultados' => $this->busqueda());*/
			
		
			$data['equipos']=$this->mod_equipos->listar_equipos();
		
			$data['tipo_eventos']=$this->mod_noticias->tipos_eventos();
			
			$cuerpo=$this->load->view('pantalla_buscador',$data,true);
		
			$this->Plantilla($cuerpo);
		}
	}
	

	//aquí es donde hacemos toda la búsqueda del buscador
	/*public function busqueda()
	{
		
			
			//limpiamos los campos del formulario, no necesitamos validar
			$this->form_validation->set_rules('idequipo', 'idequipo', 'trim|max_length[40]|xss_clean');		 
	        $this->form_validation->set_rules('tipo_evento', 'tipo_evento', 'trim|xss_clean');
	 		$this->form_validation->set_rules('fecha', 'fecha', 'trim|xss_clean');
				
	 		
	 		$campos['descripcion_evento'] = $this->input->post('descripcion');
			//los campos del formulario deben tener el mismo nombre
			//que los de la base de datos a buscar, esto luego lo 
			//recorremos para comprobar como vienen				
			$campos = array('idequipo', 'tipo_evento', 'fecha','fecha1');
			
			print_r($campos);
			
			//envíamos los datos al modelo para hacer la búsqueda
			//$resultados = $this->mod_noticias->nueva_busqueda($campos);
			
			//if($resultados !== FALSE)
			//{
				
			//	return $resultados;
			//	
			//}
			
			
			
		
	}*/

	//a través de jquery llenamos el autocompletado
	public function poblaciones()
    {
        //si es una petición ajax y existe una variable post
        //llamada info dejamos pasar
        if($this->input->is_ajax_request() && $this->input->post('info'))
        {
 
            $abuscar = $this->security->xss_clean($this->input->post('info'));
 
            $search = $this->mod_noticias->buscador_poblacion($abuscar);
            
            //print_r($search);
 
            //si search es distinto de false significa que hay resultados
            //y los mostramos con un loop foreach
            if($search !== FALSE)
            {
 
                foreach($search as $fila)
                {
                	//print_r($search);
                ?>
 
                    <p><a href="<?=site_url("controlador_eventos/resultado_busqueda/".$fila['idevento']);?>">
                    	<?php echo $fila['descripcion_evento'] ?>
                    </a></p>
 
                <?php
                }
 
            //en otro caso decimos que no hay resultados
            }else{
            ?>
 
                <p><?php echo 'No hay resultados' ?></p>
 
            <?php
            }
 
        }
 
    }
    
    public function resultado_busqueda($id)
    {
    	$datos['evento']=$this->mod_noticias->buscar_evento_id($id);
    	
    	//print_r($datos);
    	
    	$cuerpo=$this->load->view('resultado_busqueda',$datos,true);
    	
    	$this->Plantilla($cuerpo);
    }

}
