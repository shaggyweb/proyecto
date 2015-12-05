<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Modelo Pedidos
 * Contiene toda la funcionalidad de los pedidos
 * @author Mario Vilches Nieves
 */
class mod_mensajes extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	
	
	function anadir_mensaje($datos)
	{
		$this->db->insert('notificacion_monitor',$datos);
	}
	
	function total_mensajes($idjug) {
		$this->db->from('notificacion_monitor');
		$this->db->where('idjugador', $idjug);
		$resultado = $this->db->get();
		return $resultado->num_rows();
	}
	
	function detalle_mensaje($idnotificacion)
	{
	
		$this->db->select('*');
		$this->db->from('notificacion_monitor');
		$this->db->join('jugador','notificacion_monitor.idjugador=jugador.idjugador','INNER');
		$this->db->join('monitor','notificacion_monitor.idmonitor=monitor.idmonitor','INNER');
		$this->db->where('notificacion_monitor.idnotificacion', $idnotificacion);
		$query = $this->db->get();
	
	
		return $query->result_array();
	
	
	}
	
	function cambiar_estado_mensaje($idnotificacion)
	{
		$this->db->where('idnotificacion', $idnotificacion);
		$data = array(
				'estado' => 'L');
	
		$this->db->update('notificacion_monitor', $data);
	}
	
	
	
}


