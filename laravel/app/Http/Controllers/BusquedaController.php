<?php

namespace App\Http\Controllers;

use \App\Models\Reservaciones;
use Illuminate\Http\Request;
use App\Http\Requests;

class BusquedaController extends Controller
{
  public function index()
  {
    return view('busqueda.index');
  }

  public function tickets($id)
  {
      $dato = "<button id=i" . $id . " class='waves-effect waves-light btn btn-small blue lighten-2' onclick=imprimir(this.id)><i class='material-icons'>print</i></button>";
      return $dato;  
  }

  public function opcion($id)
  {
      $dato = "";

      if(session('privilegios') != 0)
      {
          $dato = "<button id=c" . $id . " class='waves-effect waves-light btn btn-small red lighten-2' onclick=cancela(this.id)><i class='material-icons'>delete</i></button>";
      }
        
      return $dato;  
    }

  public function crearBusqueda()
  {
      $datos = Reservaciones::buscar();
      $reservaciones = [];

       foreach ($datos as $key => $value) 
       {
         $obj = new \stdClass();
         $obj->reserva = $value->Id;
         $obj->restaurante = $value->Restaurante;
         $obj->hora = $value->Hora;
         $obj->fecha = $value->Fecha;
         $obj->id = $value->Numero;
         $obj->capacidad = $value->Capacidad;
         $obj->cuarto = $value->Cuarto;
         $obj->folio = $value->Folio;
         $obj->nombre = $value->Nombre;
         $obj->notas = $value->Comentarios;
         $obj->imprimir = $this->tickets($value->Id);
         $obj->cancelar = $this->opcion($value->Id);

         array_push($reservaciones, $obj);
       }

       $salida = array('data' => $reservaciones);
       return json_encode($salida);
  }
}
