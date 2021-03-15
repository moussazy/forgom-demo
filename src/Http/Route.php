<?php

namespace Demo\Http;

use  Demo\Http\Request;
use Demo\Http\Response;

class Route
{
    protected $request;
    protected $response;

    /**
     * Undocumented function
     *
     * @param Request $request
     */
    function __construct($request)
    {
        $this->request = $request;
        $this->response = new Response;
    }

    function __call($name, $args)
    {
        list($route, $method) = $args;
        $this->{$name}[$route] = $method;
    }

    function dispatch()
    {
        $httpMethod = $this->{strtolower($this->request->requestMethod)};
        $formatedRoute = $this->request->requestUri;
        $method = $httpMethod[$formatedRoute];

        if (is_null($method)) {
            $this->response->status($this->request, 404, "Not Found");
        }

        echo call_user_func_array($method, array($this->request));
    }

    function __destruct()
    {
        $this->dispatch();
    }
}
