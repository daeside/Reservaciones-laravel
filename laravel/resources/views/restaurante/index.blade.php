@extends('layouts.menu')
@section('content2')
<div class="row z-depth-1 grey lighten-5">
  <form class="col s12" id="restaurante-content">
    <div class="row">
      <h5 class="center-align">Cerrar o Abrir Restaurante</h5>
    </div>
    <div class="row">
      <div class="input-field col s3">
        <input type="hidden">
      </div>
      <div class="input-field col s6">
        <select name="restaurantesd" id="restaurantesd" class="browser-default cerrar-abrir crear-tabla-abrir">
          <option value="" disabled="" selected="">Punto</option>
        </select>
      </div>
      <div class="input-field col s3">
        <input type="hidden">
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <input name="cerrar" id="cerrar" type="text" class="datepicker cerrar-abrir" readonly>
        <label for="cerrar">Desde</label>
      </div> 
      <div class="input-field col s6">
        <input name="abrir" id="abrir" type="text" class="datepicker cerrar-abrir" readonly>
        <label for="abrir">Hasta</label>
      </div> 
    </div>
    <div class="row">
      <div class="input-field col s4">
        <input type="hidden">
      </div>
      <div class="input-field col s4">
        <input type="hidden" name="opcioncerrar" id="opcioncerrar">
      </div>
      <div class="input-field col s4">
        <input type="hidden">
      </div>
    </div>
    <div class="row center-align">
      <a class="waves-effect waves-light btn btn-large blue-grey darken-3" id="cerrar-btn" href="#">Cerrar</a>
    </div>
    <div id="tabla-cierres" class="table-wrapper hide">
      <div class="col s12">
        <table id="data-table-cierre" class="striped">
          <thead>
            <tr>
              <th>RESTAURANTE</th>
              <th>CERRADO DESDE</th>
              <th>ABIERTO HASTA</th>
              <th>ABRIR</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
            <tr>
              <th>RESTAURANTE</th>
              <th>CERRADO DESDE</th>
              <th>ABIERTO HASTA</th>
              <th>ABRIR</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </form>
</div>
@include('restaurante.js')
@endsection