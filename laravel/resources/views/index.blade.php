<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Reservaciones</title>
    <link rel="stylesheet" href="{{ asset('css/materialize.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/icon.png') }}"/>
    <script src="{{ asset('js/jquery.js') }}"></script>
  </head>
  <body class="grey lighten-2">
      @yield('content')
    </div>
    <script src="{{ asset('js/materialize.js') }}"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/init.js') }}"></script>
    <script src="{{ asset('js/funciones.js') }}"></script>
  </body>
</html>