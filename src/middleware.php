<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);


$test = function ($request, $response, $next) {
	$response->getBody()->write('Antes');
	$response = $next($request, $response);
	$response->getBody()->write('Despues');
	return $response;
};

$SesionAdmin = function ($request, $response, $next) use ($app) {

	$uri = $request->getUri();
	$url_path = $uri->getPath();

	if (isset($_SESSION['email'])) {
		if ($url_path == '/admin/login') {
			return $response->withRedirect('/admin');
		}
	}else{
		if ($url_path != '/admin/login') {
			return $response->withRedirect('/admin/login');
		}
	}
	return $next($request, $response);
};