<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Modelo Pedidos
 * Contiene toda la funcionalidad de los pedidos
 * @author Mario Vilches Nieves
 */
class mod_equipos extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	function listar_equipos()
	{
		$consulta = $this->db->get('equipo');
		// Produce: SELECT * FROM categorias
		return $consulta->result_array();
	}
	
	function listar_tipo_equipo()
	{
		$consulta = $this->db->get('tipo_equipo');
		// Produce: SELECT * FROM categorias
		return $consulta->result_array();
	}
	
	function equipo_por_tipo($id_tipo)
	{
		$this->db->from('equipo');
		$this->db->where('tipo_equipo', $id_tipo);
		$query = $this->db->get();
		return $query->result_array();
	}
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
	function listar_equipos_cat($categoria)
	{
		$this->db->select('*');
		$this->db->from('equipo');
		$this->db->join('tipo_equipo','equipo.tipo_equipo=tipo_equipo.idtipo','INNER');
		$this->db->where('tipo_equipo', $categoria);
		$query = $this->db->get();
		
		
		return $query->result_array();
		
	}
	
	function listar_jugadores_cat($categoria)
	{
		$this->db->select('*');
		$this->db->from('jugador');
		$this->db->join('equipo','jugador.idequipo=equipo.idequipo','INNER');
		$this->db->where('equipo.tipo_equipo', $categoria);
		$query = $this->db->get();
	
	
		return $query->result_array();
	
	}
	
	function select_categorias()
	{
		$consulta = $this->db->get('tipo_equipo');
		$rs=$consulta->result();
		
		$categorias=array();
		foreach($rs as $reg)
		{
		   $categorias[$reg->idtipo]=$reg->nombre_categoria;
		}
		return $categorias;
	}
	
	function listar_categorias()
	{
		$consulta = $this->db->get('tipo_equipo');
		// Produce: SELECT * FROM categorias
		return $consulta->result_array();
	}
	
	function todos_equipos()
	{
		$consulta = $this->db->get('equipo');
		// Produce: SELECT * FROM categorias
		return $consulta->result_array();
	}
	
	function select_equipos()
	{
	
		$consulta = $this->db->get('equipo');
		$rs=$consulta->result();
	
		$equipo=array();
		foreach($rs as $reg)
		{
			$equipo[$reg->idequipo]=$reg->nombre_eq;
		}
		return $equipo;
	}
	
	function jugadores_equipo($id_equipo)
	{
		$this->db->where('idequipo',$id_equipo);
		$consulta= $this->db->get('jugador');
		
		return $consulta->result_array();
		
	}
	
	function equipo_id($id_equipo)
	{
		$this->db->where('idequipo',$id_equipo);
		$consulta= $this->db->get('equipo');
		if($consulta->result())
		{
			return $consulta->row_array();
		}
		else
		{
			return false;
		}
	}
	
	public function llena_equipos($categoria)
	{
		$this->db->where('tipo_equipo',$categoria);
		$consulta = $this->db->get('equipo');
		
		return $consulta->result_array();
		
	}
	
}


