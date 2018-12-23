@extends('index')
@section('content')
<br />
<div class="container">
<div class="row center">
  <div class="col s3">
  </div>
  <div class="col s12 m6">
    <div class="card grey lighten-5">
      <form id="login-content" method="post" action="{{ url('/login') }}">
      {{ csrf_field() }}
        <div class="card-content">
          <i class="large material-icons">account_circle</i>
            <div class="row">
              <div class="input-field">
                <i class="material-icons prefix">person</i>
                <input class="validate login" type="text" name="user" id="user" required="" />
                <label for="user">Usuario</label>
                <span class="helper-text" data-error="Ingrese usuario"></span>
              </div>
              <div class="input-field">
                <i class="material-icons prefix">lock</i>
                <input class="validate login" type="password" name="password" id="password" required="" />
                <label for="password">Contraseña</label>
                <span class="helper-text" data-error="Ingrese contraseña"></span>
              </div>
            </div>
            <button class="waves-effect waves-light btn btn-large blue-grey darken-3" type="submit" id="login-btn">ingresar</button>
        </div>
      </form>
    </div>
  </div>
  <div class="col s3">
  </div>
</div>
@include('index.js')
@endsection