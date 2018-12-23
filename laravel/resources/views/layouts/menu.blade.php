@extends('index')
@section('content')
<nav class="blue-grey darken-3" role="navigation">
  <ul class="right hide-on-med-and-down">
    <li><a href="{{ url('/logout') }}">Salir</a></li>
  </ul>
  <ul class="right hide-on-med-and-down">
    <li><a href="{{ url('/Usuarios') }}">Usuario</a></li>
  </ul>
  <ul class="right hide-on-med-and-down">
    @if (session('privilegios') != 0)
    <li><a href="{{ url('/Restaurante') }}">Restaurante</a></li>
    @endif
  </ul>
  <ul class="right hide-on-med-and-down">
    <li><a href="{{ url('/Reportes') }}">Reportes</a></li>
  </ul>
  <ul class="right hide-on-med-and-down">
    <li><a href="{{ url('/Busquedas') }}">Buscar</a></li>
  </ul>
  <ul class="right hide-on-med-and-down">
    @if (session('privilegios') != 0)
    <li><a href="{{ url('/Reservar') }}">Reservar</a></li>
    @endif
  </ul>
  <ul id="nav-mobile" class="sidenav">
    @if (session('privilegios') != 0)
    <li><a href="{{ url('/Reservar') }}">Reservar</a></li>
    @endif
    <li><a href="{{ url('/Busquedas') }}">Buscar</a></li>
    <li><a href="{{ url('/Reportes') }}">Reportes</a></li>
    @if (session('privilegios') != 0)
    <li><a href="{{ url('/Restaurante') }}">Restaurante</a></li>
    @endif
    <li><a href="{{ url('/Usuarios') }}">Usuario</a></li>
    <li><a href="{{ url('/logout') }}">Salir</a></li>
  </ul>
  <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
</nav>
<div class="container">
<br>
@yield('content2')
@endsection
