<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EncuestaModel;
use App\Models\PreguntaModel;
use App\Models\RespuestaModel;
use App\Models\OpcionModel;

class EncuestaController extends BaseController
{


    public function mostrarEncuesta($encuestaId)
    {
        $encuestaModel = new EncuestaModel();
        $encuesta = $encuestaModel->find($encuestaId);

        if (empty($encuesta)) {
            return "La encuesta no existe.";
        }

        $preguntaModel = new PreguntaModel();
        $preguntas = $preguntaModel->where('encuesta_id', $encuestaId)->findAll();

        $opcionModel = new OpcionModel();

        return view('encuesta/encuesta', [
            'encuesta' => $encuesta,
            'preguntas' => $preguntas,
            'opcionModel' => $opcionModel,
        ]);
    }

    public function guardarRespuestas2($encuestaId)
    {
        $this->session = \Config\Services::session();

        if ($this->request->getMethod() === 'post') {
            $respuestaModel = new RespuestaModel();
            $encuestadoNombre = $this->request->getVar('encuestado_nombre');

            foreach ($this->request->getVar('pregunta_id') as $preguntaId) {
                $respuesta = $this->request->getVar('respuesta_' . $preguntaId);
                $respuestaModel->save([
                    'encuesta_id' => $encuestaId,
                    'pregunta_id' => $preguntaId,
                    'encuestado_nombre' => $encuestadoNombre,
                    'respuesta' => $respuesta,
                ]);
            }

            return "Gracias por completar la encuesta.";
        }
    }




    public function index()
    {
        $encuestaModel = new EncuestaModel();
        $data['encuestas'] = $encuestaModel->findAll();
        return view('encuesta/index', $data);
    }

    public function create()
    {
        return view('encuesta/create');
    }

    public function store()
    {
        $encuestaModel = new \App\Models\EncuestaModel();
        $data = $this->request->getPost();
        $encuestaModel->insert($data);
        return redirect()->to('/encuesta');
    }

    public function edit($id)
    {
        $encuestaModel = new \App\Models\EncuestaModel();
        $data['encuesta'] = $encuestaModel->find($id);
        return view('encuesta/edit', $data);
    }

    public function update($id)
    {
        $encuestaModel = new \App\Models\EncuestaModel();
        $data = $this->request->getPost();
        $encuestaModel->update($id, $data);
        return redirect()->to('/encuesta');
    }

    public function delete($id)
    {
        // Crear un modelo para la tabla de encuestas
        $encuestaModel = new \App\Models\EncuestaModel();

        // Verificar si la encuesta existe
        $encuesta = $encuestaModel->find($id);

        if (!$encuesta) {
            return redirect()->back()->with('error', 'La encuesta no existe.');
        }

        // Eliminar la encuesta de la base de datos
        $encuestaModel->delete($id);

        return redirect()->back()->with('success', 'La encuesta ha sido eliminada correctamente.');
    }



    public function preguntas($encuestaId)
    {
        // Carga el modelo de preguntas
        $preguntaModel = new \App\Models\PreguntaModel();

        // Obtén las preguntas relacionadas con la encuesta específica
        $preguntas = $preguntaModel->where('encuesta_id', $encuestaId)->findAll();

        // Obtén información de la encuesta
        $encuestaModel = new \App\Models\EncuestaModel();
        $encuesta = $encuestaModel->find($encuestaId);

        return view('encuesta/preguntas', [
            'preguntas' => $preguntas,
            'encuesta' => $encuesta,
        ]);
    }




    public function aplicarEncuesta($encuestaId)
    {
        // Obtener la encuesta
        $encuestaModel = new \App\Models\EncuestaModel();
        $encuesta = $encuestaModel->find($encuestaId);

        if (!$encuesta) {
            return redirect()->to('/encuesta')->with('error', 'La encuesta no existe.');
        }

        // Obtener las preguntas asociadas a la encuesta
        $preguntaModel = new \App\Models\PreguntaModel();
        $preguntas = $preguntaModel->where('encuesta_id', $encuestaId)->findAll();

        foreach ($preguntas as &$pregunta) {
            // Si es una pregunta de opción múltiple, obtener las opciones
            if ($pregunta['tipo_pregunta'] === 'seleccion_multiple') {
                $opcionModel = new \App\Models\OpcionModel();
                $opciones = $opcionModel->where('pregunta_id', $pregunta['id'])->findAll();
                $pregunta['opciones'] = array_column($opciones, 'opcion');
            }
        }

        return view('encuesta/aplicar_encuesta', [
            'encuesta' => $encuesta,
            'preguntas' => $preguntas,
        ]);
    }





    public function guardarRespuestas($encuestaId)
    {
        $this->session = \Config\Services::session();

        // $encuestadoNombre = $this->request->getPost('encuestado_nombre');
        // $encuestadoNombre = $this->session->id;
        $respuestas = $this->request->getPost('respuesta');

        $encuestaModel = new \App\Models\EncuestaModel();
        $encuesta = $encuestaModel->find($encuestaId);

        if (!$encuesta) {
            return redirect()->to('/encuesta')->with('error', 'La encuesta no existe.');
        }

        $respuestaModel = new \App\Models\RespuestaModel();

        foreach ($respuestas as $preguntaId => $respuesta) {
            $data = [
                'encuesta_id' => $encuestaId,
                'pregunta_id' => $preguntaId,
                // 'encuestado_nombre' => $encuestadoNombre,
                'encuestado_nombre' => $this->session->id,
                'respuesta' => $respuesta,
            ];

            $respuestaModel->insert($data);
        }

        return redirect()->to('/encuesta')->with('success', '¡Gracias por completar la encuesta!');
    }




    public function asignarEncuesta()
    {
    // Obtener el rol seleccionado desde el formulario
    $rol = $this->request->getPost('rol');

    // Validar que se haya seleccionado un rol
    if (empty($rol)) {
        return redirect()->back()->with('error', 'Debes seleccionar un rol para asignar encuestas.');
    }

    // Crear un modelo para la tabla de usuarios
    $usuarioModel = new \App\Models\UsuarioModel();

    // Consultar la base de datos para encontrar usuarios con el rol seleccionado
    $usuariosConRol = $usuarioModel->where('rol', $rol)->findAll();

    // Verificar si se encontraron usuarios con el rol
    if (empty($usuariosConRol)) {
        return redirect()->back()->with('error', 'No se encontraron usuarios con el rol seleccionado.');
    }

    // Obtener el ID de la encuesta que se asignará (puedes obtenerlo de un formulario o de otra fuente)
    $encuestaId = 1; // Reemplaza con el ID de la encuesta que deseas asignar

    // Crear un modelo para la tabla de asignaciones
    $asignacionModel = new \App\Models\AsignacionModel();

    // Asignar la encuesta a los usuarios con el rol seleccionado
    foreach ($usuariosConRol as $usuario) {
        // Crear una nueva asignación
        $nuevaAsignacion = [
            'usuario_id' => $usuario['id'],
            'encuesta_id' => $encuestaId,
            // Puedes agregar más campos relevantes, como la fecha de asignación
        ];

        // Insertar la asignación en la base de datos
        $asignacionModel->insert($nuevaAsignacion);
    }

    return redirect()->back()->with('success', 'Encuesta asignada exitosamente a los usuarios con el rol: ' . $rol);
}





}
