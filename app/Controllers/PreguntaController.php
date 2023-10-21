<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PreguntaController extends BaseController
{
    public function index()
    {
        $preguntaModel = new \App\Models\PreguntaModel();
        $data['preguntas'] = $preguntaModel->findAll();
        return view('pregunta/index', $data);
    }

    public function create($encuestaId)
    {
        return view('pregunta/create', ['encuestaId' => $encuestaId]);
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'encuesta_id' => 'required|numeric',
            'pregunta' => 'required',
            'tipo_pregunta' => 'required',
            // Agrega las reglas de validación necesarias para otros campos
        ]);

        if ($validation->withRequest($this->request)->run()) {
            $preguntaModel = new \App\Models\PreguntaModel();
            $data = [
                'encuesta_id' => $this->request->getPost('encuesta_id'),
                'pregunta' => $this->request->getPost('pregunta'),
                'tipo_pregunta' => $this->request->getPost('tipo_pregunta'),
                // Agrega otros campos de pregunta según tu base de datos
            ];
            $preguntaModel->insert($data);

            // Redirige de nuevo a la vista de la encuesta o muestra un mensaje de éxito
            return redirect()->to('/encuesta/preguntas/' . $data['encuesta_id']);
        } else {
            // Si la validación falla, muestra errores y redirige de nuevo al formulario de creación
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    }

    public function edit($preguntaId)
    {
        // Recupera la pregunta de la base de datos utilizando el ID
        $preguntaModel = new \App\Models\PreguntaModel();
        $pregunta = $preguntaModel->find($preguntaId);

        return view('pregunta/edit', ['pregunta' => $pregunta]);
    }


    public function update($preguntaId)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'pregunta_id' => 'required|numeric',
            'encuesta_id' => 'required|numeric',
            'pregunta' => 'required',
            'tipo_pregunta' => 'required',
            // Agrega las reglas de validación necesarias para otros campos
        ]);

        if ($validation->withRequest($this->request)->run()) {
            $preguntaModel = new \App\Models\PreguntaModel();
            $data = [
                'id' => $preguntaId,
                'encuesta_id' => $this->request->getPost('encuesta_id'),
                'pregunta' => $this->request->getPost('pregunta'),
                'tipo_pregunta' => $this->request->getPost('tipo_pregunta'),
                // Agrega otros campos de pregunta según tu base de datos
            ];
            $preguntaModel->save($data);

            // Redirige de vuelta a la lista de preguntas o muestra un mensaje de éxito
            return redirect()->to('/encuesta/preguntas/' . $data['encuesta_id']);
        } else {
            // Si la validación falla, muestra errores y redirige de nuevo al formulario de edición
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    }


    /*public function delete($preguntaId)
    {
        // Lógica para eliminar la pregunta de la base de datos
        $preguntaModel = new \App\Models\PreguntaModel();
        $preguntaModel->delete($preguntaId);

        return redirect()->back();
    }*/





    public function delete($encuestaId, $preguntaId)
    {
        // Crear modelos necesarios
        $encuestaModel = new \App\Models\EncuestaModel();
        $preguntaModel = new \App\Models\PreguntaModel();
        $opcionModel = new \App\Models\OpcionModel();

        // Verificar si la encuesta existe
        $encuesta = $encuestaModel->find($encuestaId);
        if (!$encuesta) {
            return redirect()->to('/encuesta')->with('error', 'La encuesta no existe.');
        }

        // Verificar si la pregunta existe y pertenece a la encuesta
        $pregunta = $preguntaModel->find($preguntaId);
        if (!$pregunta || $pregunta['encuesta_id'] != $encuestaId) {
            return redirect()->to('/encuesta/preguntas/' . $encuestaId)->with('error', 'La pregunta no existe o no pertenece a la encuesta.');
        }

        // Eliminar opciones relacionadas en la tabla 'opciones'
        $opcionModel->where('pregunta_id', $preguntaId)->delete();

        // Realizar la eliminación de la pregunta en la base de datos
        $preguntaModel->delete($preguntaId);

        return redirect()->to('/encuesta/preguntas/' . $encuestaId)->with('success', 'Pregunta eliminada exitosamente.');
    }






    public function agregarOpciones($preguntaId)
    {
        // Verifica si la pregunta existe
        $preguntaModel = new \App\Models\PreguntaModel();
        $pregunta = $preguntaModel->find($preguntaId);

        if (!$pregunta) {
            return redirect()->to('/pregunta')->with('error', 'La pregunta no existe.');
        }

        // Carga la vista para agregar opciones
        return view('pregunta/agregar_opciones', [
            'pregunta_id' => $preguntaId,
        ]);
    }


    public function guardarOpciones()
    {
        $preguntaId = $this->request->getPost('pregunta_id');
        $opciones = $this->request->getPost('opciones');

        // Verifica si la pregunta existe
        $preguntaModel = new \App\Models\PreguntaModel();
        $pregunta = $preguntaModel->find($preguntaId);

        if (!$pregunta) {
            return redirect()->to('/pregunta')->with('error', 'La pregunta no existe.');
        }

        // Convierte las opciones en un array para su posterior inserción
        $opcionesArray = explode("\n", $opciones);

        // Crea un modelo para las opciones
        $opcionModel = new \App\Models\OpcionModel();

        // Guarda cada opción en la base de datos
        foreach ($opcionesArray as $opcion) {
            if (!empty(trim($opcion))) { // Evita guardar líneas vacías
                $data = [
                    'pregunta_id' => $preguntaId,
                    'opcion' => trim($opcion),
                ];
                $opcionModel->insert($data);
            }
        }

        return redirect()->to('/pregunta/ver/' . $preguntaId)->with('success', 'Opciones de respuesta guardadas exitosamente.');
    }





    public function ver($preguntaId)
    {
        $preguntaModel = new \App\Models\PreguntaModel();
        $pregunta = $preguntaModel->find($preguntaId);

        if ($pregunta) {
            return view('pregunta/ver_pregunta', [
                'pregunta' => $pregunta,
            ]);
        } else {
            // Manejar el caso en que la pregunta no existe
            return redirect()->to('/pregunta')->with('error', 'La pregunta no existe.');
        }
    }



    public function verOpciones($preguntaId)
    {
        // Obtener la pregunta
        $preguntaModel = new \App\Models\PreguntaModel();
        $pregunta = $preguntaModel->find($preguntaId);

        if (!$pregunta) {
            return redirect()->to('/pregunta')->with('error', 'La pregunta no existe.');
        }

        // Obtener las opciones de respuesta asociadas a la pregunta
        $opcionModel = new \App\Models\OpcionModel();
        $opciones = $opcionModel->where('pregunta_id', $preguntaId)->findAll();

        return view('pregunta/ver_opciones', [
            'pregunta' => $pregunta,
            'opciones' => $opciones,
        ]);
    }


}