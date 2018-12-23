@extends('layouts.menu')
@section('content2')
<div class="row z-depth-1 grey lighten-5">
  <form class="col s12" id="password-content">
    <div class="row">
      <h5 class="center-align">Cambiar Contraseña Para {{$usuario}}</h5>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <input name="changepassword" id="changepassword" type="password" class="validate form-password" required="">
        <label for="changepassword">Nueva contraseña</label>
        <span class="helper-text" data-error="Ingrese contraseña nueva"></span>
      </div>
      <div class="input-field col s6">
        <input name="changepasswordconf" id="changepasswordconf" type="password" class="validate form-password" required="">
        <label for="changepasswordconf">Confirmar contraseña</label>
        <span class="helper-text" data-error="Ingrese de nuevo la contraseña nueva"></span>
      </div>
    </div>
    <div class="row center-align">
      <a class="waves-effect waves-light btn btn-large blue-grey darken-3" id="change-password-btn" href="#">Cambiar</a>
    </div>
  </form>
</div>
@include('usuarios.js')
@if ($permiso == 1)
@include('usuarios.agregar')
@endif
@endsection
            