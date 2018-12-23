<?php

namespace App\Http\Controllers;

date_default_timezone_set("America/Cancun");

use Illuminate\Http\Request;
use \App\Models\Restaurante;
use \App\Models\Reservaciones;
use \App\Models\Horario;
use \App\Models\Mesas;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class ReservarController extends Controller
{
    public function index()
    {
      return view('reservar.index');
    }

    public function selectAjax()
    {
        $datos = Restaurante::allRestaurantes();
        $restaurantes = [];

       foreach ($datos as $key => $value) 
        {
            $obj = new \stdClass();
            $obj->id = $value->Id;
            $obj->nombre = $value->Nombre;

            array_push($restaurantes, $obj);
        }

        return json_encode($restaurantes);
    }

    public function selectFech($fecha)
    {
        $datos = Restaurante::closeRes($fecha);
        $restaurantes = [];

       foreach ($datos as $key => $value) 
        {
            $obj = new \stdClass();
            $obj->id = $value->Id;
            $obj->nombre = $value->Nombre;

            array_push($restaurantes, $obj);
        }

        return json_encode($restaurantes);
    }

    public function horaSelect($tipo)
    {
        $datos = Horario::hoario12($tipo);
        $horarios = [];

       foreach ($datos as $key => $value) 
        {
            $obj = new \stdClass();
            $obj->id = $value->Id;
            $obj->hora = $value->Hora;

            array_push($horarios, $obj);
        }

        return json_encode($horarios);
    }

    public function estatus($status)
    {
        $dato = "<p style='color:red;'>RESERVADA</p>";

        if($status == 1)
        {
            $dato = "<p style='color:green;'>DISPONIBLE</p>";
        }
        return $dato;
    }

    public function opcion($id)
    {
        $dato = "<button id=r" . $id . " class='waves-effect waves-light btn btn-small green lighten-2' onclick=reserva(this.id)><i class='material-icons'>create</i></button>";
        return $dato;  
    }

    public function mesasDisp($idres, $fecha, $idhor)
    {
        $mesa = Mesas::disponibles($idres, $idhor, $fecha);
        $mesas = [];

       foreach ($mesa as $key => $value) 
        {
            $obj = new \stdClass();
            $obj->id = $value->Numero;
            $obj->capacidad = $value->Capacidad;
            $obj->estatus = $this->estatus(1);
            $obj->nombre = '';
            $obj->notas = '';
            $obj->opcion = $this->opcion($value->Id);

            array_push($mesas, $obj);
        }
        return $mesas;
    }

    public function mesasOcup($idres, $fecha, $idhor)
    {
        $mesa = Mesas::ocupadas($idres, $fecha, $idhor);
        $mesas = [];

       foreach ($mesa as $key => $value) 
        {
            $obj = new \stdClass();
            $obj->id = $value->Numero;
            $obj->capacidad = $value->Capacidad;
            $obj->estatus = $this->estatus(0);
            $obj->nombre = $value->Nombre;
            $obj->notas = $value->Notas;
            $obj->opcion = '';

            array_push($mesas, $obj);
        }
        return $mesas;
    }

    public function crearTab($idres, $fecha, $idhor)
    {
        $disponibles = $this->mesasDisp($idres, $fecha, $idhor);
        $ocupadas = $this->mesasOcup($idres, $fecha, $idhor);

        if(count($disponibles) == 0)
        {
            $todas = json_encode($ocupadas);
        }
        elseif(count($ocupadas) == 0)
        {
            $todas = json_encode($disponibles);
        }
        else
        {
            $todas = substr(json_encode($disponibles), 0, -1) . ',' . substr(json_encode($ocupadas), 1);
        }

        $datos = array('data' => json_decode($todas));
        return json_encode($datos);
    }

    public function crear(Request $request)
    {
        $salida = '';
        $reservacion = new Reservaciones;
        $validator = Validator::make($request->all(), [
            'fecha' => 'required|date',
            'tipo' => 'required|numeric',
            'punto' => 'required|numeric',
            'horario' => 'required|numeric',
            'nombre' => 'required',
            'cuarto' => 'required|numeric',
            'folio' => 'required|alpha_num',
            'notas' => 'required',
            'mesa' => 'required|alpha_num',
        ]);
        $errors = $validator->errors();

        if ($validator->fails()) 
        {
           foreach ($errors->all() as $message) 
           {
              $salida .= $message . ' ';
           }
       }
       else
       {
          $reservacion->Folio = $request->folio;
          $reservacion->Cuarto = $request->cuarto;
          $reservacion->Nombre = $request->nombre;
          $reservacion->IdRestaurante = $request->punto;
          $reservacion->IdMesa = $request->mesa;
          $reservacion->IdHorario = $request->horario;
          $reservacion->Fecha = $request->fecha;
          $reservacion->Comentarios = $request->notas;
          $reservacion->Estatus = 1;
          $reservacion->FechaReserva = date('Y-m-d');
          $reservacion->Operador = $request->session()->get('id');

          if($reservacion->save())
          {
            $salida = 'Se genero la reservacion correctamente';
          }
          else
          {
            $salida = 'Error al guardar reservacion';
          }
        }

        return $salida;
    }

    public function cancelar(Request $request)
    {
        $salida = '';
        $id = substr($request->reserva, 1);
        $reservacion = Reservaciones::find($id);
        $reservacion->Estatus = 0;

        if($reservacion->save())
        {
            $salida = 'Se cancelo la reservacion correctamente';
        }
        else
        {
          $salida = 'Error al cancelar reservacion';
        }

        return $salida;
    }
}
