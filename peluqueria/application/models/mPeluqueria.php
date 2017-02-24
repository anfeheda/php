<?php
class mPeluqueria extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	public function validarIngreso($reg)
   	{
     $this->db->select('*');
     $this->db->from('tblcliente');
     $this->db->where('email',$reg['email']);
     $this->db->where('clave',$reg['clave']);
     return $this->db->get();
	}
	function consultarclientes($tabla,$campo,$dato)
	{
	if ($campo != "mostrartodos")
	{
		$this->db->where($campo,$dato);
	}
		return $this->db->get($tabla);
	}
	function registroclientes($tabla,$registro)
	{
		$this->db->insert($tabla,$registro);
	}
	function total_clientes($tabla)
	{
		return $this->db->get($tabla)->num_rows();
	}
	function verClientes($tabla)
	{
		$datos=array('*'); //para seleccionar todos los campos
			//$sql="Select * From Usuario" en el php tradicional
		$this->db->select($datos); //Lista de campos
		$this->db->from($tabla); //nombre de la tabla
			//Retornar el resultado de la consulta
		return $this->db->get();
	}
	function eliminarcliente($tabla, $criterio)
	{
		$this->db->where($criterio);
		$this->db->delete($tabla);
	}
	public function actualizarCliente($registro,$tabla,$campo,$dato)
   	{
     $this->db->where($campo, $dato);
     $this->db->update($tabla, $registro);   
   	}

   	//------funciones para poder guardar enb la base de datos el provedor///
   	///////////////////////////////////////////////////////////////////////
   	///////////////////////////////////////////////////////////////////////

   	function verproovedor($tabla)
	{
		$datos=array('*'); //para seleccionar todos los campos
			//$sql="Select * From Usuario" en el php tradicional
		$this->db->select($datos); //Lista de campos
		$this->db->from($tabla); //nombre de la tabla
			//Retornar el resultado de la consulta
		return $this->db->get();
	}
	function registroprovedor($tabla,$registro)
	{
		$this->db->insert($tabla,$registro);
	}
	function eliminarproovedor($tabla, $criterio)
	{
		$this->db->where($criterio);
		$this->db->delete($tabla);
	}
	function consultaprovedor($tabla,$campo,$dato)
	{
	if ($campo != "mostrartodos")
	{
		$this->db->where($campo,$dato);
	}
		return $this->db->get($tabla);
	}
	function total_provedor($tabla)
	{
		return $this->db->get($tabla)->num_rows();
	}
	public function actualizarprovedor($registro,$tabla,$campo,$dato)
   	{
     $this->db->where($campo, $dato);
     $this->db->update($tabla, $registro);   
   	}
   	//funciones para realizar el guardado del producto////
   	/////////////////////////////////////////////////////
   	function verproducto($tabla)
	{
		$datos=array('*'); //para seleccionar todos los campos
			//$sql="Select * From Usuario" en el php tradicional
		$this->db->select($datos); //Lista de campos
		$this->db->from($tabla); //nombre de la tabla
			//Retornar el resultado de la consulta
		return $this->db->get();
	}
	function registroproducto($tabla,$registro)
	{
		$this->db->insert($tabla,$registro);
	}
	function eliminarproducto($tabla, $criterio)
	{
		$this->db->where($criterio);
		$this->db->delete($tabla);
	}
	function consultarproducto($tabla,$campo,$dato)
	{
	if ($campo != "mostrartodos")
	{
		$this->db->where($campo,$dato);
	}
		return $this->db->get($tabla);
	}
	function total_producto($tabla)
	{
		return $this->db->get($tabla)->num_rows();
	}
	//funciones para realizar el guardado de la cita 
	////////////////////////////////////////////////
	function vercitas($tabla)
	{
		$datos=array('*'); //para seleccionar todos los campos
			//$sql="Select * From Usuario" en el php tradicional
		$this->db->select($datos); //Lista de campos
		$this->db->from($tabla); //nombre de la tabla
			//Retornar el resultado de la consulta
		return $this->db->get();
	}
	function registrocita($tabla,$registro)
	{
		$this->db->insert($tabla,$registro);
	}
	function eliminarcita($tabla, $criterio)
	{
		$this->db->where($criterio);
		$this->db->delete($tabla);
	}
	function consultarcita($tabla,$campo,$dato)
	{
	if ($campo != "mostrartodos")
	{
		$this->db->where($campo,$dato);
	}
		return $this->db->get($tabla);
	}
	function total_citas($tabla)
	{
		return $this->db->get($tabla)->num_rows();
	}
}
?>