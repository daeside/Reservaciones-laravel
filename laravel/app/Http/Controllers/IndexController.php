<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class IndexController extends Controller
{
    public function index()
    {
       return view('index.index');
    }

    public function login(Request $request)
    {
        $salida = '';
        $validator = Validator::make($request->all(), [
            'user' => 'required|alpha_num',
            'password' => 'required'
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
          $user = $request->user;
          $password = $request->password;

          if (Auth::attempt(['nombre' => $user, 'password' => $password]))
          {
             $request->session()->put('user', strtoupper(Auth::user()->nombre));
             $request->session()->put('id', Auth::user()->id);
             $request->session()->put('privilegios', Auth::user()->privilegios);

             if ($request->ajax())
             {
                $salida = 1;
             }
             else
             {
                $salida = redirect('/Busquedas');
             }
          }
          else
          {
              $salida = 'Usuario o contraseña invalidos';
          }
        }

        return $salida;
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect('/');
    }
}
