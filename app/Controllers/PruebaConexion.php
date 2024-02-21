<?php
namespace App\Controllers;
use App\Models\PruebaConexionModel;
//App\Controllers\api;
use App\Controllers\BaseController;
//use App\Models\SearchModel;
use CodeIgniter\I18n\Time;

class PruebaConexion extends BaseController
{
	
Private $pruebaConexionModel;

	public function __construct()
	{
		$this->pruebaConexionModel = new PruebaConexionModel();
		

	}

    public function entrada($rfc){

    	$search = "\\";
    	$replace="/";

    	$db= \Config\Database::connect();
    if(isset($rfc)&&strlen($rfc)>10){
    

    	$builder =  $db->table('clientes');
    	$builder -> select('clientes.RFC_CLIENTE, hoja_intercambio.remolque AS NUMERO_CAJA, linea_transporte.razon_empresa as TRANSPORTE, hoja_intercambio.placa as PLACA_REMOLQUE, inspeccion.fecha_inspeccion, inspeccion.tipo, inspeccion.tractor, inspeccion.codigo_verificacion, ife.nombre as CHOFER, concat("https://test.barrenecheasoc.com/index.php/Consulta/Consulta_inspeccion/",inspeccion.id,"/", inspeccion.codigo_verificacion)  AS URL');
    	$builder ->join('hoja_intercambio', 'hoja_intercambio.cliente = clientes.id', 'left'); 
    	$builder -> join('linea_transporte','hoja_intercambio.linea = linea_transporte.id ','left');
    	$builder ->join('inspeccion','hoja_intercambio.inspeccion_entrada = inspeccion.id','left');
    	$builder -> join('ife','ife.inspeccion = inspeccion.id','right');
    	$builder -> where('RFC_CLIENTE', $rfc);
    	$builder -> where('hoja_intercambio.inspeccion_entrada !=', NULL);



    	//$builder -> join('');
    	//echo $rfc.'<br>';
    	//$rfc = 'PDE081208LZ5';
    	//$builder ->select('select * from clientes where RFC == CME940415L35', false);
	
    	$query = $builder -> getWhere(['RFC_CLIENTE' => $rfc]);
    	

    	//$query = $db->table('clientes')->getWhere(['id' => $id], $limit, $offset);();
    	//print_r($query);
    	$resultado= $query->getResultArray();
    	//echo $db->getLastQuery();
    	//$query = $db->table('clientes')->select('*')->where('RFC_CLIENTE', 'CME940415L35');
    	
    	//$resultado= $query->get();
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

     public function salida($rfc){
		$myTime = Time::now('America/Chicago', 'en_US');

    	$db= \Config\Database::connect();

    		if(isset($rfc)&&strlen($rfc)>10){
    

	       	$builder =  $db->table('clientes');
	    	$builder -> select('clientes.RFC_CLIENTE, hoja_intercambio.remolque AS NUMERO_CAJA, inspeccion_tanque_temperatura.temperatura as TEMPERATURA, inspeccion_tanque_temperatura.tanque as TANQUE,  transfer.razon_social as TRANSFER, hoja_intercambio.placa as PLACA_REMOLQUE, inspeccion.fecha_inspeccion,  inspeccion.tipo, inspeccion.tractor, inspeccion.codigo_verificacion, ife.nombre as CHOFER, concat("https://test.barrenecheasoc.com/index.php/Consulta/Consulta_inspeccion/",inspeccion.id,"/", inspeccion.codigo_verificacion)  AS URL');
	    	$builder -> join('hoja_intercambio', 'hoja_intercambio.cliente = clientes.id', 'left'); 
	    	$builder -> join('inspeccion','hoja_intercambio.inspeccion_salida = inspeccion.id','left');
	    	$builder -> join('inspeccion_tanque_temperatura', 'inspeccion_tanque_temperatura.id = inspeccion.inspeccion_tanque_temperatura', 'left');
	    	$builder -> join('transfer','inspeccion.transfer  = transfer.id','left');
	    	$builder -> join('ife','ife.inspeccion = inspeccion.id','right');
	    	$builder -> where('RFC_CLIENTE', $rfc);
	    	$builder -> where('hoja_intercambio.inspeccion_salida !=', NULL);
	    	//$builder -> where('inspeccion.fecha_inspeccion <=', 'LIMITE');

		
	    	$query = $builder -> getWhere(['RFC_CLIENTE' => $rfc]);
	    	

	    	
	    	$resultado= $query->getResultArray();
	    	
	    	
	    	
	    	print_r(json_encode ($resultado));
	    	


			}

    }


}