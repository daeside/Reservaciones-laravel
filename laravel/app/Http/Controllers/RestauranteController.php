<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Restaurante;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class RestauranteController extends Controller
{
    public function index()
    {
        return view('restaurante.index');
    }

    public function cerrar(Request $request)
    {
        $salida = '';
        $validator = Validator::make($request->all(), [
            'restaurantesd' => 'required|numeric',
            'cerrar' => 'required|date',
            'abrir' => 'required|date',
            'opcioncerrar' => 'required|numeric',
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
          $operacion = Restaurante::abrirClosRes($request->opcioncerrar, $request->restaurantesd, $request->cerrar, $request->abrir);

          if($operacion)
          {
            if($request->opcioncerrar == 2)
            {
                $salida = 'Cerrado correctamente';
            }
            else
            {
                $salida = 'Abierto correctamente';
            }
          }
          else
          {
            $salida = 'Error al cambiar estatus';
          }
        }

        return $salida;
    }

    public function opcion($cierre, $apertura)
    {
        $dato = "";
        $dato = "<button class='waves-effect waves-light btn btn-small green lighten-2' onclick='reabrir(\"" . $cierre . "\", \"" . $apertura . "\")'><i class='material-icons'>lock_open</i></button>";
        
        return $dato;  
    }

    public function estatus($rest)
    {
        $restaurante = Restaurante::estatusRes($rest);
        $restaurantes = [];

        foreach ($restaurante as $key => $value) 
        {
            $obj = new \stdClass();
            $obj->nombre = $value->Nombre;
            $obj->cierre = $value->Cierre;
            $obj->apertura = $value->Apertura;
            $obj->abrir = $this->opcion($value->CierreOriginal, $value->AperturaOriginal);

            array_push($restaurantes, $obj);
        }

        $datos = array('data' => $restaurantes);

        return json_encode($datos);
    }
}
