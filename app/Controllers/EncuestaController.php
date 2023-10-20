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
        // Cargar el modelo de la encuesta y obtener información de la encuesta
        $encuestaModel = new EncuestaModel();
        $encuesta = $encuestaModel->find($encuestaId);

        if (empty($encuesta)) {
            // Manejo de errores si la encuesta no se encuentra
            return "La encuesta no existe.";
        }

        // Cargar el modelo de preguntas y obtener las preguntas para la encuesta
        $preguntaModel = new PreguntaModel();
        $preguntas = $preguntaModel->where('encuesta_id', $encuestaId)->findAll();

        // Cargar el modelo de opciones de respuesta
        $opcionModel = new OpcionModel();

        // Cargar la vista de la encuesta y pasar los datos a la vista
        return view('encuesta/encuesta', [
            'encuesta' => $encuesta,
            'preguntas' => $preguntas,
            'opcionModel' => $opcionModel,
        ]);
    }

    public function guardarRespuestas2($encuestaId)
    {
        // Procesar las respuestas del formulario
        if ($this->request->getMethod() === 'post') {
            // Validar y guardar las respuestas en la base de datos
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
        $encuestaModel = new \App\Models\EncuestaModel();
        $encuestaModel->delete($id);
        return redirect()->to('/encuesta');
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
        // Obtener datos del formulario
        $encuestadoNombre = $this->request->getPost('encuestado_nombre');
        $respuestas = $this->request->getPost('respuesta');

        // Verificar si la encuesta existe
        $encuestaModel = new \App\Models\EncuestaModel();
        $encuesta = $encuestaModel->find($encuestaId);

        if (!$encuesta) {
            return redirect()->to('/encuesta')->with('error', 'La encuesta no existe.');
        }

        // Crear un modelo para las respuestas
        $respuestaModel = new \App\Models\RespuestaModel();

        // Guardar las respuestas en la base de datos
        foreach ($respuestas as $preguntaId => $respuesta) {
            $data = [
                'encuesta_id' => $encuestaId,
                'pregunta_id' => $preguntaId,
                'encuestado_nombre' => $encuestadoNombre,
                'respuesta' => $respuesta,
            ];

            $respuestaModel->insert($data);
        }

        return redirect()->to('/encuesta')->with('success', '¡Gracias por completar la encuesta!');
    }




}
