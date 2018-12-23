<div class="row z-depth-1 grey lighten-5">
<form class="col s12" id="add-user">
    <div class="row">
      <h5 class="center-align">Agregar Usuarios</h5>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <input name="addName" id="addName" type="text" class="validate form-agregar" required="">
        <label for="addName">Nombre</label>
      </div>
      <div class="input-field col s6">
        <input name="addApe" id="addApe" type="text" class="validate form-agregar" required="">
        <label for="addApe">Apellido</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s4">
        <input type="hidden">
      </div>
      <div class="input-field col s4">
        <p>
          <label>
            <input type="checkbox" name="tipouser" id="tipouser" value="2"/>
            <span>Puede crear/cancelar reservaciones</span>
          </label>
        </p>
      </div>
      <div class="input-field col s4">
        <input type="hidden">
      </div>
    </div>
    <div class="row center-align">
      <a class="waves-effect waves-light btn btn-large blue-grey darken-3" id="usuarios-add" href="#">Agregar</a>
    </div>
  </form>
</div>
@include('usuarios.agregarjs')