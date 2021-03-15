<?php

namespace Demo\Controller;

use Demo\Http\Response;

/**
 * Class padre de controller
 */
class Controller
{

    protected $response;

    function __construct()
    {
        $this->response = new Response;
    }

    /**
     * Llama a la funcion json() de Response
     *
     * @param [type] $data
     * @return string
     */
    protected function json($data)
    {
        return $this->response->json($data);
    }

    /**
     * Msg de éxito
     *
     * @param [type] $request
     * @return void
     */
    protected function successMessage($request)
    {
        return $this->response->status($request, 201, "Success");
    }

    /**
     * Devuelve las vistas, en este caso solo una...
     *
     * @param [type] $view
     * @return void
     */
    public function view($view)
    {
        return $this->response->view($view);
    }

}