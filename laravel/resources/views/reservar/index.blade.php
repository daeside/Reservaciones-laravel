@extends('layouts.menu')
@section('content2')
<?php date_default_timezone_set("America/Cancun");?>
<div class="row z-depth-1 grey lighten-5">
  <form class="col s12" id="reservacion-content">
    <div class="row">
      <h5 class="center-align">Nueva Reservación</h5>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <input name="fecha" id="fecha" type="text" class="datepicker datos-tabla datos-formulario" readonly>
        <label for="fecha">Fecha</label>
      </div> 
      <div class="input-field col s6">
        <select name="tipo" id="tipo" class="browser-default datos-tabla datos-formulario">
          <option value="" disabled="" selected="">Tipo de Reservacion</option>
          <option value="1">Por Habitacion</option>
          <option value="2">Por Folio</option>
          <option value="3">GSH</option>
          <option value="4">Gerencia</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <select name="punto" id="punto" class="browser-default datos-tabla datos-formulario">
          <option value="" disabled="" selected="">Punto</option>
        </select>
      </div>
      <div class="input-field col s6">
        <select name="horario" id="horario" class="browser-default datos-tabla datos-formulario">
          <option value="" disabled="" selected="">Hora</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6" id="container-nombre">
        <input name="nombre" id="nombre" type="text" class="validate datos-formulario" required="">
        <label for="nombre">Nombre</label>
        <span class="helper-text" data-error="Ingrese nombre"></span>
      </div>
      <div class="input-field col s6" id="container-cuarto">
        <input name="cuarto" id="cuarto" type="number" class="validate datos-formulario" required="">
        <label for="cuarto">Habitacion</label>
        <span class="helper-text" data-error="Ingrese cuarto"></span>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6" id="container-folio">
        <input name="folio" id="folio" type="number" class="validate datos-formulario" required="">
        <label for="folio">Folio</label>
        <span class="helper-text" data-error="Ingrese folio"></span>
      </div>  
      <div class="input-field col s6">
        <textarea name="notas" id="notas" class=" validate materialize-textarea datos-formulario" required=""></textarea>
        <label for="notas">Notas</label>
        <span class="helper-text" data-error="Ingrese notas"></span>
      </div>
    </div>
    <div class="row center-align">
    <input type="hidden" name="mesa" id="mesa">
    </div>
    <div id="tabla-reservar" class="table-wrapper hide">
      <div class="col s12">
        <table id="data-table-reservar" class="striped">
          <thead>
            <tr>
              <th>MESA</th>
              <th>CAPACIDAD</th>
              <th>ESTATUS</th>
              <th>NOMBRE HUESPED</th>
              <th>COMENTARIOS</th>
              <th>RESERVAR</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
            <tr>
              <th>MESA</th>
              <th>CAPACIDAD</th>
              <th>ESTATUS</th>
              <th>NOMBRE HUESPED</th>
              <th>COMENTARIOS</th>
              <th>RESERVAR</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </form>
</div>
@include('reservar.js')
@endsection