<?php
namespace App\Controllers;
use App\Models\PruebaConexionModel;
//App\Controllers\api;
use App\Controllers\BaseController;
//use App\Models\SearchModel;

class PruebaConexion extends BaseController
{
	
Private $pruebaConexionModel;

	public function __construct()
	{
		$this->pruebaConexionModel = new PruebaConexionModel();
	}

    public function index(){
    	$db= \Config\Database::connect();
    	$query = $db->table('clientes')->get();
    	//print_r($query);
    	$resultado= $query->getResultArray();
    	//echo $db->getLastQuery();

    	print_r(json_encode ($resultado));

    	//$data= ['titulo' => 'Catalogo de Clientes', 'clientes' => $resultado];
    	//return view('clientes',$data);
    	//pruebaConexionModel = new PruebaConexionModel();
    	//$instercambios = new PruebaConexion($db);
    	/*
    	$sql= "SELECT * FROM hoja_intercambio";
		$query=$this->db->query(sql);
		$result = $query->getResult();
    	$data = $this->$modelHome->intercambios_lst();
    	//return view('welcome message', $data);
*/

    	

    }
}