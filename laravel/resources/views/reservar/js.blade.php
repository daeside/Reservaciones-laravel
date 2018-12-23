<script>
$(document).ready(function()
  {
    $('select').formSelect();
    calendario(
        "<?php echo date('Y-m-d', strtotime(date('Y-m-d')."+ 1 days"));?>",
        ""
        );
  });
</script>
<script>
  $(document).ready(function()
  {
    $("#fecha").change(function()
     {
       var fecha = '/' + $("#fecha").val();
       crearSelect(
          "{{ url('/Reservar/disponibles/')}}" + fecha ,
          'punto',
          );
     });
  });
</script>
<script>
  $(document).ready(function()
  {
    $("#punto").change(function()
     {
       var restaurante = '/' + $("#punto").val();
       selectHora(
           "{{ url('/Reservar/horarios/')}}" + restaurante ,
           'horario',
           );
     });
  });
</script>
<script>
 $(document).ready(function()
 {
   $("#horario").change(function()
   {
     $('#data-table-reservar').dataTable().fnDestroy();
     var punto = $('#punto').val(); 
     var fecha = $('#fecha').val();
     var hora = $('#horario').val();
     var cadena = '/' + punto + '/' + fecha + '/' + hora;
     var datos = [
         {"data":"id"},
         {"data":"capacidad"},
         {"data":"estatus"},
         {"data":"nombre"},
         {"data":"notas"},
         {"data":"opcion"}
         ];

      if(validate("datos-tabla"))
      {
        hideshow("tabla-reservar");
        tabla(
          "{{ url('Reservar/mesas/')}}" + cadena, 
          "data-table-reservar", 
          "{{ asset('json/Spanish.json') }}", 
          datos
          );
      }
     else
     {
       showhide("tabla-reservar");
     }
   });
});
</script>
<script>
$(document).ready(function()
  {
    $("#tipo").change(function()
     {
       var dato = $('#tipo').val();
       var tipo = $('select[name="tipo"] option:selected').text();

       tipoReserva(
           dato, 
           tipo, 
           'folio', 
           'cuarto', 
           'nombre', 
           'container-folio', 
           'container-cuarto', 
           'container-nombre'
           );
     });
  });
</script>
<script>
function reserva(id)
{
  event.preventDefault();
  $('#mesa').attr('value', id);
    
  if(validate("datos-formulario"))
  {
    send(
      "reservacion-content",
      "{{ url('Reservar/crear')}}"
       );
  }
}
</script>