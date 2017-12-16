<?php
namespace Controllers\Backend;
use App;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class Index extends \Controllers\Controllers{

	public function __invoke(Request $request, Response $response, $args){

		if (isset($_POST['email'])) {
			$args['email'] = trim($_POST['email']);
		}
		$response = $this->ci->view->render($response, 'Backend/index.twig', ['args'=> $args] );
		return $response;
	}

}