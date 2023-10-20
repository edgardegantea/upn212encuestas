<?php

use CodeIgniter\Router\RouteCollection;
// $routes = Services::routes();

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->match(['get', 'post'], 'login', 'UserController::login', ["filter" => "noauth"]);



// CRUD DE ENCUESTAS
$routes->get('encuesta', 'EncuestaController::index');
$routes->get('/encuesta/create', 'EncuestaController::create');
$routes->post('/encuesta', 'EncuestaController::store');
$routes->get('/encuesta/edit/(:num)', 'EncuestaController::edit/$1');
$routes->put('/encuesta/(:num)', 'EncuestaController::update/$1');
$routes->delete('/encuesta/(:num)', 'EncuestaController::delete/$1');

$routes->get('encuesta/preguntas/(:num)', 'EncuestaController::preguntas/$1');

$routes->get('encuesta/aplicar/(:num)', 'EncuestaController::aplicarEncuesta/$1');
$routes->post('encuesta/guardar_respuestas/(:num)', 'EncuestaController::guardarRespuestas/$1');



// CRUD DE PREGUNTAS
$routes->group('pregunta', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('create/(:num)', 'PreguntaController::create/$1');
    $routes->post('store', 'PreguntaController::store');
    $routes->get('edit/(:num)', 'PreguntaController::edit/$1');
    $routes->post('update/(:num)', 'PreguntaController::update/$1');
    $routes->get('delete/(:num)', 'PreguntaController::delete/$1');
    // $routes->get('delete/(:num)', 'PreguntaController::delete/$1');

});

$routes->get('pregunta/delete/(:num)/(:num)', 'PreguntaController::delete/$1/$2');


$routes->get('pregunta/agregar_opciones/(:num)', 'PreguntaController::agregarOpciones/$1');
$routes->post('pregunta/guardar_opciones', 'PreguntaController::guardarOpciones');
$routes->get('pregunta/ver_opciones/(:num)', 'PreguntaController::verOpciones/$1');





$routes->get('pregunta/ver/(:num)', 'PreguntaController::ver/$1');




// $routes->get('/pregunta', 'PreguntaController::index');
// $routes->get('/pregunta/create', 'PreguntaController::create');
// $routes->post('/pregunta', 'PreguntaController::store');
// $routes->get('/pregunta/edit/(:num)', 'PreguntaController::edit/$1');
// $routes->put('/pregunta/(:num)', 'PreguntaController::update/$1');
// $routes->delete('/pregunta/delete/(:num)', 'PreguntaController::delete/$1');

// $routes->get('pregunta/create/(:num)', 'PreguntaController::create/$1');

// $routes->get('pregunta/edit/(:num)', 'PreguntaController::edit/$1');






$routes->group('pregunta', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('create/(:num)', 'PreguntaController::create/$1');
    $routes->post('store', 'PreguntaController::store');
});










$routes->get('encuesta/(:num)', 'EncuestaController::mostrarEncuesta/$1'); // Ruta para mostrar una encuesta
$routes->post('encuesta/(:num)/guardarRespuestas', 'EncuestaController::guardarRespuestas/$1'); // Ruta para guardar respuestas de la encuesta

// Puedes agregar más rutas aquí

// $routes->fallback('EncuestaController::notFound'); // Ruta predeterminada para manejar rutas no encontradas



$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Admin\AdminController::index');
    $routes->resource('usuarios', ['controller' => 'Admin\UsuarioController']);
});


$routes->group('asg', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Asg\AsgController::index');
});


$routes->group('docente', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Docente\DocenteController::index');
});

$routes->group('alumno', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Alumno\DocenteController::index');
});


$routes->get('logout', 'UserController::logout');