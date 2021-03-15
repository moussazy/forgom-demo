<?php

namespace Demo\Model;

class Cliente
{
    //Tendrá los atributos: “nombre”, “apellido” y “país”, que se añadirán en el constructor.
    protected $nombre;
    protected $apellido;
    protected $pais;

    /**
     * Constructor.
     * 
     * @param string $nombre
     * @param string $apellido
     * @param mixed $pais
     */
    public function __construct($nombre, $apellido, $pais)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->pais = $pais;
    }

    /**
     * Undocumented function
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }
}
