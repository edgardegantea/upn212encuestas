<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class RegistroController extends BaseController
{
    public function new()
    {
        return view('pages/registro');
    }



    public function create()
    {
        $usuarioModel = new UsuarioModel();

        $data = [
            'rol'               => $this->request->getPost('rol'),
            'codigo'            => $this->request->getPost('codigo'),
            'nombre'            => $this->request->getPost('nombre'),
            'apaterno'          => $this->request->getPost('apaterno'),
            'amaterno'          => $this->request->getPost('amaterno'),
            'curp'              => $this->request->getPost('curp'),
            'username'          => $this->request->getPost('username'),
            'email'             => $this->request->getPost('email'),
            'telefono'          => $this->request->getPost('telefono'),
            'password'          => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'sexo'              => $this->request->getPost('sexo'),
            'fechaNacimiento'   => $this->request->getPost('fechaNacimiento'),
            'adscripcion'       => $this->request->getPost('adscripcion'),
            'carrera'           => $this->request->getPost('carrera'),
            'status'            => true
        ];

        $usuarioModel->insert($data);

        return redirect()->to('login');
    }
}
