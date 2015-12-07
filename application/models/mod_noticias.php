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
	function listar_noticias($inicio = 0, $limit = 0)
	{
		$this->db->select('*');
		$this->db->from('equipo');
		$this->db->limit($limit, $inicio);
		$this->db->join('evento','equipo.idequipo=evento.idequipo','INNER');
		$this->db->join('tipo_evento','tipo_evento.idtipo_evento=evento.tipo_evento');
		$this->db->order_by("fecha", "desc");
		$query = $this->db->get();
		
		
		return $query->result_array();
		
	}
	
	function listar_noticias_portada()
	{
		$this->db->select('*');
		$this->db->from('equipo');
		$this->db->join('evento','equipo.idequipo=evento.idequipo','INNER');
		$this->db->join('tipo_evento','tipo_evento.idtipo_evento=evento.tipo_evento');
		$this->db->order_by("fecha", "desc");
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
	
	function nuevo_evento($datos)
	{
		$this->db->insert('evento',$datos);
	}
	
	function tipos_eventos()
	{
		$this->db->select('*');
		$this->db->from('tipo_evento');
		
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	
	function eventos_jugador($idjugador)
	{
		$this->db->select('*');
		$this->db->from ('evento');
		$this->db->join('equipo','evento.idequipo=equipo.idequipo','INNER');
		$this->db->join('tipo_evento','tipo_evento.idtipo_evento=evento.tipo_evento');
		$this->db->join('jugador','jugador.idequipo=equipo.idequipo');
		$this->db->where('idjugador', $idjugador);
		$this->db->order_by("fecha", "desc");
		
		$query = $this->db->get();
		
		
		return $query->result_array();
		
	}
	
	/**
	 * Método para calcular el total de productos de una categoría
	 * @param string $datos ID de la categoría
	 */
	function total_eventos() {
		$this->db->from('evento');
		$resultado = $this->db->get();
		return $resultado->num_rows();
	}
	
	//hacemos la búsqueda de las poblaciones en el
	//evento keyup de jquery
	public function buscador_poblacion($abuscar)
	{
		//usamos after para decir que empiece a buscar por
		//el principio de la cadena
		//ej SELECT poblacion from poblacion
		//WHERE poblacion LIKE '%$abuscar' limit 12
		$this->db->select('*');
		
		//$this->db->from ('evento');
	
		$this->db->like('descripcion_evento',$abuscar,'after');
	
		$resultados = $this->db->get('evento');
	
		//si existe algún resultado lo devolvemos
		if($resultados->num_rows() > 0)
		{
	
			return $resultados->result_array();
	
			//en otro caso devolvemos false
		}else{
	
			return FALSE;
	
		}
	
	}
	
	function buscar_evento_id($id)
	{
		$this->db->select('*');
		$this->db->from('equipo');
		$this->db->join('evento','equipo.idequipo=evento.idequipo','INNER');
		$this->db->join('tipo_evento','tipo_evento.idtipo_evento=evento.tipo_evento');
		$this->db->where('idevento', $id);
		$this->db->order_by("fecha", "desc");
		$query = $this->db->get();
	
	
		return $query->result_array();
	}
	
	//hacemos la consulta a la base de datos para
	//mostrar los datos de nuestro buscador
	public function nueva_busqueda($campos)
	{
	
		//print_r($campos);
		//definimos si descripción viene vacio o no para utilizar el operador and or
		//$and_or = $this->input->post('fecha') != '' ? ' AND ' : ' OR ';
		$sql = 'select nombre,nombre_eq,descripcion_evento,fecha,hora
				from evento
				INNER JOIN equipo ON evento.idequipo=equipo.idequipo
				INNER JOIN tipo_evento ON evento.tipo_evento=tipo_evento.idtipo_evento
				where evento.';
		
		//$campos = array();
		
		//print_r($campos);
		
		$cond='';
		
		foreach ($campos as $clave => $valor) {
			if ($cond != '')
				$cond .= ' and ';
			$cond .= $clave . ' = "' . $valor . '"';
		}
		
		$sql.=' '.$cond;
		
	
		//recorremos los campos del formulario
		//foreach($campos as $campo){
				
			//si llegan las variables y no están vacias
			//if($this->input->post($campo) && $this->input->post($campo) != '')
			//{
	
				//definimos la condición para hacer la búsqueda de los campos y de
				//esta forma podemos hacer uso del array condiciones fuera del loop
			//	$condiciones[] = "$campo=" . $this->input->post($campo);
				
				//print_r($condiciones);
	
			//}
				
		//}
			
		//la consulta base a la que concatenaremos la búsqueda
		//$sql = "SELECT * FROM evento ";
	
		//si existen condiciones entramos
		//if(count($condiciones) > 0)
		//{
				
			//aquí creamos la condición y la concatenamos a $sql
		//	$sql .= "WHERE " . implode ($and_or, $condiciones);
				
		//}
		//print_r($sql);
	
		//asignamos a $query la consulta final
		$query = $this->db->query($sql);
		
		
		//con la siguiente línea podéis ver lo que arroja la
		//consulta escogiendo varios campos, es bueno entenderlo
		//var_dump($sql); exit;
	
		//si se ha encontrado algo
		if($query->num_rows() > 0)
		{
	
			return $query->result_array();
	
		}else{
				
			return FALSE;
				
		}
	
		
	}
	
	
	/*A = id_a, name_a,...
	 B = id_b, name_b, etc
	 C = id_c, A_Id_a, B_Id_b*/
	
	/*$this->db->select('*');
	 $this->db->from('A');
	 $this->db->join(' C',  'A.id_a = C.A.Id_a', 'INNER');
	 $this->db->join('B', 'B.id_b = C.Id_b', 'INNER');
	 $result = $this->db->get();*/
}

