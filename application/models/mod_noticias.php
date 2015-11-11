<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Modelo Pedidos
 * Contiene toda la funcionalidad de los pedidos
 * @author Mario Vilches Nieves
 */
class mod_noticias extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	/**
	 * Método para insertar un pedido
	 * @param array $datos Datos del pedido a insertar
	 */
	/*function listar_noticias()
	{
		$this->db->from('evento');
		$this->db->where('tipo_evento', 1);
		$query = $this->db->get();
		return $query->result_array();
	}*/
	
	/*A = id_a, name_a,...
	B = id_b, name_b, etc
	C = id_c, A_Id_a, B_Id_b*/
	
	/*$this->db->select('*');
	$this->db->from('A');
	$this->db->join(' C',  'A.id_a = C.A.Id_a', 'INNER');
	$this->db->join('B', 'B.id_b = C.Id_b', 'INNER');
	$result = $this->db->get();*/
	function listar_noticias()
	{
		$this->db->select('*');
		$this->db->from('equipo');
		$this->db->join('evento','equipo.idequipo=evento.idequipo','INNER');
		$this->db->join('tipo_evento','tipo_evento.idtipo_evento=evento.tipo_evento');
		$query = $this->db->get();
		
		
		return $query->result_array();
		
	}
	
	function select_eventos()
	{

		$consulta = $this->db->get('tipo_evento');
		$rs=$consulta->result();
		
		$tipo_evento=array();
		foreach($rs as $reg)
		{
			$tipo_evento[$reg->idtipo_evento]=$reg->nombre;
		}
		return $tipo_evento;
	}
	
	
}

