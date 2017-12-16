<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/', '\Controllers\Frondend\Index');

$app->get('/hola/{name}', '\Controllers\Frondend\Index:hola');

$app->get('/id/{id:[0-9]+}', '\Controllers\Frondend\Index:identidad');

$app->get('/prueba/{name}', function ($request, $response, $args) {
    return $this->view->render($response, 'Frondend/prueba.twig', [
        'name' => $args['name']
    ]);
});


$app->get('/json/{name}', '\Controllers\Frondend\Index:Json');

$app->group('/admin', function () use ($app) {
	$app->map(['GET', 'POST'], '', '\Controllers\Backend\Index');
	$app->map(['GET', 'POST'], '/login', '\Controllers\Backend\Index:Login');
	$app->map(['GET', 'POST'], '/salir', '\Controllers\Backend\Index:Salir');
})->add($SesionAdmin);
