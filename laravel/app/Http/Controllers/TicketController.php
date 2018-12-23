<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use \App\Models\Reservaciones;

class TicketController extends Controller
{
    public function index($reserva)
    {
      $id = substr($reserva, 1);
      $datos = Reservaciones::tickets($id);
      $reservaciones = [];

       foreach ($datos as $value) 
       {
         $reservaciones['id'] = $value->Id;
         $reservaciones['fecha'] = $value->Fecha;
         $reservaciones['restaurante'] = $value->Restaurante;
         $reservaciones['cuarto'] = $value->Cuarto;
         $reservaciones['nombre'] = $value->Nombre;
         $reservaciones['hora'] = $value->Hora;
         $reservaciones['mesa'] = $value->IdMesa;
         $reservaciones['notas'] = $value->Comentarios;
         $reservaciones['operador'] = $value->NombreOpe;
       }

        return view('ticket.index')
       ->with('id', $reservaciones['id'])
       ->with('fecha', $reservaciones['fecha'])
       ->with('restaurante', $reservaciones['restaurante'])
       ->with('cuarto', $reservaciones['cuarto'])
       ->with('nombre', $reservaciones['nombre'])
       ->with('hora', $reservaciones['hora'])
       ->with('mesa', $reservaciones['mesa'])
       ->with('notas', $reservaciones['notas'])
       ->with('operador', $reservaciones['operador']);
    }
}
