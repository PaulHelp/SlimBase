<?php
namespace Controllers\Backend;
use App;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class Index extends \Controllers\Controllers{

	public function __invoke(Request $request, Response $response, $args){
		$args['email'] = $_SESSION['email'];
		$response = $this->ci->view->render($response, 'Backend/index.twig', ['args'=> $args] );
		return $response;
	}

	public function Login(Request $request, Response $response, $args){

		if (isset($_POST['email'])) {
			$args['email'] = trim($_POST['email']);
			$_SESSION['email'] = $args['email'];
			return $response->withRedirect('/admin');
		}
		$response = $this->ci->view->render($response, 'Backend/login.twig', ['args'=> $args] );
		return $response;
	}

	public function Salir(Request $request, Response $response, $args){

		session_destroy();
		unset($_SESSION['email']);
		return $response->withRedirect('/admin');
	}


}