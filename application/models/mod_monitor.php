<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Modelo Usuarios
 * Contiene toda la funcionalidad de los usuarios
 * @author Mario Vilches Nieves
 */
class mod_monitor extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Método para insertar clientes
	 * @param array Array de datos del usuario
	 */
	function alta_usuario ($data){
		$this->db->insert('usuarios',$data);
	}
	
	/**
	 * Método para logueaar el usuario
	 * @param string $usuario Nombre del usuario
	 * @param string $clave Clave del usuario
	 * @return boolean true si los datos son correctos para el logueo
	 */
	function login_monitor($usuario,$clave)
	{
		$sql = "select * from monitor where usuario = '".$usuario."' AND clave = '".$clave."' and activo=1;";
		
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
	function alta_monitor ($data){
		$this->db->insert('monitor',$data);
	}
	
	/**
	 * Método para buscar un usuario según su nombre de usuario
	 * @param string $usuario Nombre de usuario a buscar
	 */
	function buscar_monitor($usuario){
		$sql=$this->db->query("select * from monitor
				where usuario = \"$usuario\"
				");
		
		return $sql->result_array();
	}
	
	function listar_monitores()
	{
		$this->db->from('monitor');
		$this->db->where('activo', 1);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	/**
	 * Método para modificaar los datos de un usuario
	 * @param integer $cod_usuario Código del usuario a modificar
	 * @param array $datos Datos del usuario a modificar
	 * @return boolean
	 */
	function modificar_monitor($id_monitor, $datos){
		$this->db->where('idmonitor', $id_monitor);
	
		if($this->db->update('monitor', $datos)){
			return true;
	
		}  else {
	
			return false;
		}
	}
	
	function comprobar_mail_monitor($email)
	{
		$this->db->where('email',$email);
		$consulta= $this->db->get('monitor');
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
	function nuevo_password($cod_mon,$nuevo_pass)
	{
	
		$datos = array(
				'clave' => $nuevo_pass
		);
		$this->db->where('idmonitor', $cod_mon);
		$this->db->update('monitor', $datos);
	}
	
	/**
	 * Método para buscar un usuario según su nombre de usuario
	 * @param string $usuario Nombre de usuario a buscar
	 */
	function buscar_monitor_id($id){
		$sql=$this->db->query("select * from monitor
				where idmonitor = \"$id\"
				");
	
		return $sql->result_array();
	}
	
	function borrado_monitor($id)
	{
		$monitor = array(
			'activo' => false
		);
	
		$this->db->where('idmonitor', $id);
		$this->db->update('monitor', $monitor);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
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
