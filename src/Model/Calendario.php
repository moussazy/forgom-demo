<?php

namespace Demo\Model;

class Calendario
{

    /**
     * Tendrá un método llamado “crearCita” al que se le pasarán por parámetro 
     * una fecha y un objeto de la clase “Cliente” creada anteriormente.
     * @param   mixed     $fecha
     * @param   Cliente   $cliente
     * @return  void
     */
    public function crearCita($fecha, $cliente)
    {
        array_push($_SESSION['_citas_'], [
            'fecha' => $fecha, 'cliente' => $cliente->getNombre()
        ]);
    }

    /**
     * Tendrá un método llamado “obtenerCitas” que devolverá un array con las 
     * citas del mes actual. Sin los weekend
     *
     * @return  array
     */
    public function obtenerCitas()
    {
        $allCitas = $_SESSION['_citas_'];
        $validCitas = [];

        foreach ($allCitas as &$cita) {
            $datetime = new \DateTime($cita['fecha']);
            if ($datetime->format('N') < 6) {
                array_push($validCitas, $cita['fecha']);
            } 
        }

        return $validCitas;
    }
}
