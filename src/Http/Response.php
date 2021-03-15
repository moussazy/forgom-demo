<?php

namespace Demo\Http;

class Response
{
    private $root;
    private $rootViews;
    private $rootAssets;
    
    function __construct()
    {
        $this->root = $_SERVER['DOCUMENT_ROOT'];
        $this->rootViews =  $this->root. "./../src/View/";
        $this->rootAssets =  $this->root;
    }
    
    /**
     * Undocumented function
     *
     * @return  string
     */
    public function status($request, $statusCode, $msg = "")
    {
        header("{$request->serverProtocol} $statusCode $msg");  
        
        echo json_encode(['code' => 201, 'body' => 'success']);             
    }

    public function json($data, $code = 200)
    {
        header('Content-Type: application/json');
        http_response_code(200);

        echo json_encode(['data' => $data[0]]);
    }

    public function view($view)
    {
        header('Content-Type: text/html');
        http_response_code(200);

        echo file_get_contents($this->rootViews .$view);
    }
    
    public function asset($asset)
    {
        header('Content-Type: text/html');
        http_response_code(200);

        echo file_get_contents($this->rootAssets .$asset);
    }



}