<?php

namespace App\Controllers\Alumno;

use App\Controllers\BaseController;

class AlumnoController extends BaseController
{

    public function __construct()
    {
        if (session()->get('rol') != "alumno") {
            echo view('accesonoautorizado');
            exit;
        }
    }


    public function index()
    {
        return view('alumno/dashboard');
    }
}
