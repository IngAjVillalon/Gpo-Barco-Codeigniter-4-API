<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\QueryByRFCEntradaModel;

class QueryByRFCe extends ResourceController
{
    protected $modelName = 'App\Models\QueryByRFCEntradaModel';
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


    public function entrada($rfc = NULL)
    {
        //return $rfc."algo";
        return $this->genericResponse($this->model->where('RFC_CLIENTE',$rfc) -> findAll(), NULL, 200);

       // return $this->model->where('RFC_CLIENTE',$rfc) -> findAll();
    }

}

