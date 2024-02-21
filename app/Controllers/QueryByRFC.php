<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\QueryByRFCSalidaModel;

class QueryByRFC extends ResourceController
{
    protected $modelName = 'App\Models\QueryByRFCSalidaModel';
    protected $format = 'json';

	public function index()
	{
	    return $this->genericResponse($this->model->findAll(), NULL, 200);
	}

	    public function show($id = NULL)
    {
        return $this->genericResponse($this->model->find($id), NULL, 200);
    }

     private function genericResponse($data, $msj, $code)
    {
        if ($code == 200) {
            return $this->respond(array("data" => $data, "code" => $code)); //, 404, "No hay nada"        
        } else {
            return $this->respond(array("msj" => $msj, "code" => $code));
        }
    }


    public function salida($rfc = NULL)
    {
        return $this->genericResponse($this->model->where('RFC_CLIENTE',$rfc) -> findAll(), NULL, 200);
    }

}

