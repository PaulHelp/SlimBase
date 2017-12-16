<?php
namespace Controllers\Frondend;
use App;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class Index extends \Controllers\Controllers{

	public function __invoke(Request $request, Response $response, $args){
		$response = $this->ci->view->render($response, 'Frondend/index.twig');
		return $response;
	}

	public function hola(Request $request, Response $response, $args){
		$response = $this->ci->view->render($response, 'Frondend/hola.twig', ['name' => $args['name']]);
		return $response;
	}

	public function identidad(Request $request, Response $response, $args){
		$response = $this->ci->view->render($response, 'Frondend/identidad.twig', ['id' => $args['id']]);
		return $response;
	}

	public function Json(Request $request, Response $response, $args){
		$response = $response->withJson($args);
		return $response->withHeader('Content-Type','application/json');
	}

}