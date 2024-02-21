<?php
namespace App\Models;
use CodeIgniter\Model;

class QueryByRFCEntradaModel extends Model
{

protected $table = 'APINSPECTIONS_ENTRADA';
protected $primaryKey = 'RFC_CLIENTE';
protected $allowedFields = ['nombre'];
    
    public function index()    {        
        return $this->genericResponse($this->model->findAll(), NULL, 200);    
    }    
    public function show($rfc = NULL)    {       
         return $this->genericResponse($this->model->find($rfc), NULL, 200);    
    }

}


