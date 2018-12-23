<script>
$(document).ready(function()
  {
    $('select').formSelect();

    crearSelect(
        "{{ url('/Reservar/todos')}}" ,
        'reportes-restaurante'
        );

        calendario(
        "",
        "<?php echo date('Y-m-d', strtotime(date('Y-m-d')."+ 1 days"));?>"
        );
  });
</script>
<script>
  $(document).ready(function()
  {
    $("#reportes-generar").click(function () 
    {
      $('#data-table-reportes').dataTable().fnDestroy();
      var resaurante = $('#reportes-restaurante').val(); 
      var fecha = $('#fecha-pasada').val();
      var cadena = '/' + resaurante + '/' + fecha;
      var datos = [
          {"data":"reserva"},
          {"data":"hora"},
          {"data":"fecha"},
          {"data":"id"},
          {"data":"capacidad"},
          {"data":"cuarto"},
          {"data":"folio"},
          {"data":"nombre"},
          {"data":"notas"},
          {"data":"operador"},
          {"data":"fechareserva"}
          ];

      if(validate("validar-reportes"))
      {
       hideshow("tabla-reportes");
       tabla(
           "{{ url('/Reportes/reporte/') }}" + cadena, 
           "data-table-reportes", 
           "{{ asset('json/Spanish.json') }}", 
           datos
           );
      }
    });
  });
</script>
<script>
  $(document).ready(function()
  {
    $("#excel-generar").click(function () 
    {
      var restaurante = $('#reportes-restaurante').val(); 
      var fecha = $('#fecha-pasada').val();
      var cadena = '/' + restaurante + '/' + fecha;

      if(validate("validar-reportes"))
      {
        location.href = "{{ url('/Reportes/excel/') }}" + cadena;
      }
    });
  });
</script>