@extends('layouts.menu')
@section('content2')
<div class="row z-depth-1 grey lighten-5">
  <form class="col s12">
    <div class="row">
      <h5 class="center-align">Generar Lista de Reservaciones</h5>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <select name="reportes-restaurante" id="reportes-restaurante" class="browser-default validar-reportes">
          <option value="" disabled="" selected="">Punto</option>
        </select>
      </div>
      <div class="input-field col s6">
        <input name="fecha-pasada" id="fecha-pasada" type="text" class="datepicker validar-reportes" readonly>
        <label for="fecha-pasada">Fecha de reporte</label>
      </div> 
    </div>
    <div class="row center-align">
      <a class="waves-effect waves-light btn btn-large blue-grey darken-3" id="reportes-generar" href="#">Lista</a>
    </div>
    <div id="tabla-reportes" class="table-wrapper hide">
      <div class="col s12">
        <table id="data-table-reportes" class="striped">
          <thead>
            <tr>
              <th>NUMERO RESERVA</th>
              <th>HORA RESERVA</th>
              <th>FECHA RESERVADA</th>
              <th>MESA</th>
              <th>CAPACIDAD</th>
              <th>HABITACION</th>
              <th>FOLIO</th>
              <th>NOMBRE HUESPED</th>
              <th>COMENTARIOS</th>
              <th>OPERADOR</th>
              <th>FECHA DE RESERVACION</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
            <tr>
              <th>NUMERO RESERVA</th>
              <th>HORA RESERVA</th>
              <th>FECHA RESERVADA</th>
              <th>MESA</th>
              <th>CAPACIDAD</th>
              <th>HABITACION</th>
              <th>FOLIO</th>
              <th>NOMBRE HUESPED</th>
              <th>COMENTARIOS</th>
              <th>OPERADOR</th>
              <th>FECHA DE RESERVACION</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="row center-align">
        <a class="waves-effect waves-light btn btn-large green darken-3" id="excel-generar" href="#">Excel</a>
      </div>
    </div>
  </form>
</div>
@include('reportes.js')
@endsection


