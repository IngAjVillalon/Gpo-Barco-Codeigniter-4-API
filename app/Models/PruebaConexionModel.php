<?php

namespace App\Models;
use CodeIgniter\Model;



class PruebaConexionModel extends Model {

    protected $table      = 'clientes';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

	function __construct()
	{
	  //$this->load->library('session');
	  //$this->load->database();

		
	}

public function obtenerDatosIntercambios($rfc){

$this->like('RFC_CLIENTE', $rfc);
return $builder->get()->getResultArray();


}




/*

function obtenerDatosIntercambios($rfc){
	$this->db->select('*');
    $this->db->from('clientes');
    $this->db->where('RFC_CLIENTE==', $rfc);
    return $intercambios = $this->db->get();
}




public function intercambios_lst() 
	{
	$sql= "SELECT * FROM hoja_intercambio";
	$query=$this->db->query(sql);
	$result = $query->getResult();

	if(count($result)>=1) {
		return $result;

	}else{

		return NULL;
	}


	}

*/
}

