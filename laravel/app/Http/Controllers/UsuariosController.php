<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Usuarios;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class UsuariosController extends Controller
{
    public function index(Request $request)
    {
      return view('usuarios.index')
      ->with('usuario', $request->session()->get('user'))
      ->with('permiso', $request->session()->get('privilegios'));
    }

    public function changePass(Request $request)
    {
        $salida = '';
        $validator = Validator::make($request->all(), [
            'changepassword' => 'required',
            'changepasswordconf' => 'required|same:changepassword',
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
          $cambiar = Usuarios::find($request->session()->get('id'));
          $cambiar->Password = $request->changepasswordconf;

          if($cambiar->save())
          {
             $salida = 'Se cambio la contraseña correctamente';
          }
          else
          {
             $salida = 'Error al cambiar contraseña';
          }
        }

        return $salida;
    }
    
    public function addUser(Request $request)
    {
      $salida = '';
      $agregar = new Usuarios;
      $validator = Validator::make($request->all(), [
          'addName' => 'required|alpha_num',
          'addApe' => 'required|alpha_num',
          'tipouser' => 'numeric',
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
        $agregar->Nombre = $request->addName;
        $agregar->Apellido = $request->addApe;
        $agregar->Password = '12345';
        $agregar->Privilegios = $request->input('tipouser', 0);

        if($agregar->save())
        {
          $salida = 'Se creo el usuario correctamente';
        }
        else
        {
          $salida = 'Error al crear usuario';
        }
      }

      return $salida;
    }
}
