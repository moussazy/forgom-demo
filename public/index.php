<?php
require __DIR__ . "./../vendor/autoload.php";
session_start();

if (! isset ( $_SESSION ['_citas_'] )) {
    $_SESSION ['_citas_'] = array ();
}

//session_unset ( ) ;
use Demo\Http\Route;
use Demo\Http\Request;

$router = new Route(new Request);

/**
 * Ruta al home
 */
$router->get('/', function () {
    return (new Demo\Controller\Controller)->view('home.html');
});


/**
 * Ruta crear cita
 */
$router->post('/api/citar', function ($request) {
    return (new Demo\Controller\CitasController)->citar($request);
});

/**
 * Ruta citas
 */
$router->get('/api/citas', function ($request) {
    return (new Demo\Controller\CitasController)->citas($request);
});

