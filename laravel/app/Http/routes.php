<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'auth'], function() 
{
   Route::get('/Busquedas/tabla', 'BusquedaController@crearBusqueda');
   Route::get('/Reportes/reporte/{res}/{fecha}', 'ReportesController@crearRepor');
   Route::get('/Reportes/excel/{res}/{fecha}', 'ReportesController@crearExcel');
   Route::post('/Usuarios/cambiar', 'UsuariosController@changePass');
   Route::get('/logout', 'IndexController@logout');
   Route::get('/Busquedas', 'BusquedaController@index');
   Route::get('/Reportes', 'ReportesController@index');
   Route::get('/Usuarios', 'UsuariosController@index'); 
   Route::get('/Ticket/{id}', 'TicketController@index');
   Route::post('/Reservar/todos', 'ReservarController@selectAjax');

   Route::group(['middleware' => 'admin'], function()
   {
      Route::post('/Reservar/disponibles/{fecha}', 'ReservarController@selectFech');
      Route::post('/Reservar/horarios/{tipo}', 'ReservarController@horaSelect');
      Route::get('/Reservar/mesas/{idres}/{fecha}/{idhor}', 'ReservarController@crearTab');
      Route::get('/Restaurante/estatus/{idres}', 'RestauranteController@estatus');
      Route::post('/Restaurante/cerrar', 'RestauranteController@cerrar');
      Route::post('/Reservar/crear', 'ReservarController@crear');
      Route::post('/Reservar/cancelar', 'ReservarController@cancelar');
      Route::get('/Reservar', 'ReservarController@index');
      Route::get('/Restaurante', 'RestauranteController@index');
      Route::post('/Usuarios/agregar', 'UsuariosController@addUser');
   });
});

Route::get('/', 'IndexController@index');
Route::post('/login', 'IndexController@login');

