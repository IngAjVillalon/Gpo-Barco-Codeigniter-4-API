<?php

namespace App\Controllers;

class Home extends BaseController
{

// public $modelHome = NULL;

 public function __construct()
 {
   // $this->modelHome = model('Home')
 }

    public function index(): string
    {
        return view('welcome_message');
    }
}
