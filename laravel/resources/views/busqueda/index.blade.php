@extends('layouts.menu')
@section('content2')
<div class="row z-depth-1 grey lighten-5">
  <form class="col s12" id="tabla-contenido">
    <div class="row">
      <h5 class="center-align">Busquedas</h5>
    </div>
    <div class="row center-align">
      <input type="hidden" name="reserva" id="reserva">
    </div>
    <div id="tabla-buscar" class="table-wrapper">
      <div class="col s12">
        <table id="data-table-buscar" class="striped display compact">
          <thead>
            <tr>
              <th>NUMERO RESERVA</th>
              <th>RESTAURANTE</th>
              <th>HORA RESERVA</th>
              <th>FECHA RESERVADA</th>
              <th>MESA</th>
              <th>CAPACIDAD</th>
              <th>HABITACION</th>
              <th>NOMBRE HUESPED</th>
              <th>COMENTARIOS</th>
              <th>TICKET</th>
              <th>CANCELAR</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
            <tr>
              <th>NUMERO RESERVA</th>
              <th>RESTAURANTE</th>
              <th>HORA RESERVA</th>
              <th>FECHA RESERVADA</th>
              <th>MESA</th>
              <th>CAPACIDAD</th>
              <th>HABITACION</th>
              <th>NOMBRE HUESPED</th>
              <th>COMENTARIOS</th>
              <th>TICKET</th>
              <th>CANCELAR</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </form>
</div>
@include('busqueda.js')
@endsection