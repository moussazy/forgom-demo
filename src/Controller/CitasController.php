<?php

namespace Demo\Controller;

use Demo\Model\Calendario;
use Demo\Model\Cliente;

class CitasController extends Controller
{

    /**
     * Undocumented function
     *
     * @param [type] $request
     * @return Response
     */
    public function citas($request)
    {
        $cita = new Calendario;

        return $this->json([
            $cita->obtenerCitas()
        ]);
    }

    /**
     * Undocumented function
     *
     * @param [type] $request
     * @return void
     */
    public function citar($request)
    {
        $calendario = new Calendario;
        $cliente = new Cliente($request->nombre, $request->apellido, $request->pais);
        
        $calendario->crearCita($request->fecha, $cliente);

        return $this->successMessage($request);
    }
}