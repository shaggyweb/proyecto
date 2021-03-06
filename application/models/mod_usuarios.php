<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Modelo Usuarios
 * Contiene toda la funcionalidad de los usuarios
 * @author Mario Vilches Nieves
 */
class mod_usuarios extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	
	/**
	 * Método para logueaar el usuario
	 * @param string $usuario Nombre del usuario
	 * @param string $clave Clave del usuario
	 * @return boolean true si los datos son correctos para el logueo
	 */
	function login_usuario($usuario,$clave)
	{
		$sql = "select * from jugador where usuario = '".$usuario."' AND clave = '".$clave."'";
	
		$query = $this->db->query($sql);
		//print_r($sql);
	
		if($query->num_rows() == 0)
		{
			return false;
		}
		else
		{
			return true;
		}
	
	}
	
	/**
	 * Método para insertar clientes
	 * @param array Array de datos del usuario
	 */
	function alta_usuario ($data){
		$this->db->insert('jugador',$data);
	}
	
	
	/**
	 * Método para buscar un usuario según su nombre de usuario
	 * @param string $usuario Nombre de usuario a buscar
	 */
	function buscar_usuario_id($id){
		$sql=$this->db->query("select * from jugador
				where idjugador = \"$id\"
				");
	
		return $sql->result_array();
	}
	
	/**
	* Método para buscar un usuario según su nombre de usuario
	* @param string $usuario Nombre de usuario a buscar
	*/
	function buscar_usuario($usuario){
		$sql=$this->db->query("select * from jugador
				where usuario = \"$usuario\"
				");
	
		return $sql->result_array();
	}
	
	
	function modificar_usuario($id_jugador, $datos){
		$this->db->where('idjugador', $id_jugador);
	
		if($this->db->update('jugador', $datos)){
			return true;
	
		}  else {
	
			return false;
		}
	}
	
	
	function comprobar_mail_usuario($email)
	{
		$this->db->where('email',$email);
		$consulta= $this->db->get('jugador');
		if($consulta->result())
		{
			return $consulta->row_array();
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Método para modificar el password de un usuario
	 * @param string $cod_user Código del usuario
	 * @param string $nuevo_pass Nuevo Password
	 */
	function nuevo_password($cod_user,$nuevo_pass)
	{
	
		$datos = array(
				'clave' => $nuevo_pass
		);
		$this->db->where('idjugador', $cod_user);
		$this->db->update('jugador', $datos);
	}
	
	function lista_mensajes($idjugador,$inicio = 0, $limit = 0)
	{
		
			$this->db->select('*');
			$this->db->from('notificacion_monitor');
			$this->db->limit($limit, $inicio);
			$this->db->join('jugador','notificacion_monitor.idjugador=jugador.idjugador','INNER');
			$this->db->join('monitor','notificacion_monitor.idmonitor=monitor.idmonitor','INNER');
			$this->db->where('notificacion_monitor.idjugador', $idjugador);
			$query = $this->db->get();
		
		
			return $query->result_array();
		
		
	}
	
	function mensajes_nuevos($idjugador)
	{
		$sql=$this->db->query("select count(idjugador)as total_nuevos from notificacion_monitor
				where estado=\"N\" and idjugador = \"$idjugador\"
				");
		
		return $sql->result_array();
	}
	
	
	function borrar_jugador($id)
	{
		$this->db->where('idjugador', $id);
		$this->db->delete('jugador');
	}
	
	function cambiar_equipo($idjugador,$idequipo)
	{
		$this->db->where('idjugador', $idjugador);
		$data = array(
				'idequipo' => $idequipo);
		
		$this->db->update('jugador', $data);
	}
	
	function historial()
	{
		$consulta = $this->db->get('historial_jugadores');
		// Produce: SELECT * FROM categorias
		return $consulta->result_array();
	}
	
	
	
	
	
	/**
	 * Método para logueaar el usuario
	 * @param string $usuario Nombre del usuario
	 * @param string $clave Clave del usuario
	 * @return boolean true si los datos son correctos para el logueo
	 */
	/*function login_monitor($usuario,$clave)
	{
		$sql = "select * from monitor where usuario = '".$usuario."' AND clave = '".$clave."'";
		
		$query = $this->db->query($sql);
		if($query->num_rows() == 0)
		{
			return false;
		}
		else
		{
			return true;
		}
		
	}/
	
	/**
	 
	
	/**
	 * Método para modificaar los datos de un usuario
	 * @param integer $cod_usuario Código del usuario a modificar
	 * @param array $datos Datos del usuario a modificar
	 * @return boolean
	 */
	
	
	/**
	 * Método para buscar un usuario según su nombre de usuario
	 * @param string $nombre Nombre de usuario a buscar
	 */
	function existe_nombre_user($nombre)
	{
	
		$sql="select * from usuarios where usuario = '$nombre'";
		
			$resultado = $this->db->query($sql);
		
			return $resultado->result_array();
		
	}
	
	/**
	 * Método para modificar el estado de un usuario de activo a inactivo
	 * @param string $cod Código de usuario
	 */
	function baja_user($cod)
	{
		$usuario = array(
				'activo' => false
		);
		
		$this->db->where('cod_usuario', $cod);
		$this->db->update('usuarios', $usuario);
		
	}
	
	/**
	 * Método para buscar un email en la BD
	 * @param string $email Email a buscar
	 * @return boolean true si se encuenta en la BD
	 */
	function comprobar_mail($email)
	{
		$this->db->where('correo',$email);
		$consulta= $this->db->get('usuarios');
		if($consulta->result())
		{
			return $consulta->row_array();
		}
		else
		{
			return false;
		}
	}
	
	
}