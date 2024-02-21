<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
//use App\Controllers\QueryByRFCe;
//use App\Models\QueryByRFCEntradaModel;



class QueryByRFCAll extends ResourceController
{

    protected $format = 'json';


	public function all($rfc)

	{
		$entrada = model('QueryByRFCEntradaModel');
		$respuestaentrada = $entrada->where('RFC_CLIENTE',$rfc) -> findAll();
		//print_r ($respuestaentrada);


		//echo "--------------------------------------------------------------------";

		$salida = model('QueryByRFCSalidaModel');
		$respuestasalida = $salida->where('RFC_CLIENTE',$rfc) -> findAll();
		//print_r ($respuestasalida);


		$todo = array_merge($respuestasalida, $respuestaentrada);

		//print_r($todo);

		return $this->genericResponse($todo, NULL, 200);




		//return $this -> entrada($rfc);

	}

	     private function genericResponse($data, $msj, $code)
    {
        if ($code == 200) {
            return $this->respond(array("data" => $data, "code" => $code)); //, 404, "No hay nada"        
        } else {
            return $this->respond(array("msj" => $msj, "code" => $code));
        }
    }


    


}