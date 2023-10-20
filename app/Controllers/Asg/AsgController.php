<?php

namespace App\Controllers\Asg;

use App\Controllers\BaseController;

class AsgController extends BaseController
{

    public function __construct()
    {
        if (session()->get('rol') != "asg") {
            echo view('accesonoautorizado');
            exit;
        }
    }


    public function index()
    {
        echo 'Index de AsgController';
    }
}
