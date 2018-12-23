<script>
$(document).ready(function()
  {
     $('select').formSelect();
     calendario(
         "<?php echo date('Y-m-d', strtotime(date('Y-m-d')."+ 1 days"));?>",
         ""
         );
     crearSelect(
         "{{ url('/Reservar/todos')}}" ,
         "restaurantesd"
         );
  });
</script>
<script>
$(document).ready(function()
  {
     $("#cerrar-btn").click(function()
     {
       $('#opcioncerrar').attr('value', 2);
       if(validate("cerrar-abrir"))
       {
         send(
             "restaurante-content", 
             "{{ url('/Restaurante/cerrar')}}", 
             );
       }
     });
  });
</script>
<script>
  $(document).ready(function()
  {
      $("#restaurantesd").change(function()
      {
        $('#data-table-cierre').dataTable().fnDestroy();
        var datos = [
            {"data":"nombre"},
            {"data":"cierre"},
            {"data":"apertura"},
            {"data":"abrir"}
        ];
        var restaurante = '/' + $('#restaurantesd').val();

        if(validate("crear-tabla-abrir"))
        {
          hideshow("tabla-cierres");
          tabla(
              "{{ url('/Restaurante/estatus/') }}" + restaurante, 
              "data-table-cierre", 
              "{{ asset('json/Spanish.json') }}", 
              datos
              );
        }
        else
        {
          showhide("tabla-cierres");
        }
      });
  });
</script>
<script>
function reabrir(cierre, apertura)
{
  event.preventDefault();
  $('#opcioncerrar').attr('value', 1);
  $('#cerrar').attr('value', cierre);
  $('#abrir').attr('value', apertura);
  var mensaje = confirm("¿Abrir Restaurante?");

  if (mensaje)
  {
    send("restaurante-content", 
    "{{ url('/Restaurante/cerrar')}}", 
    );
  }
}
</script>