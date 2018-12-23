<script>
  $(document).ready(function()
  {
    $('#data-table-cierre').dataTable().fnDestroy();
    var datos = [
      {"data":"reserva"}, 
      {"data":"restaurante"},
      {"data":"hora"},
      {"data":"fecha"},
      {"data":"id"},
      {"data":"capacidad"},
      {"data":"cuarto"},
      {"data":"nombre"},
      {"data":"notas"}, 
      {"data":"imprimir"}, 
      {"data":"cancelar"}
    ];
    tabla(
      "{{ url('/Busquedas/tabla') }}", 
      "data-table-buscar", 
      "{{ asset('json/Spanish.json') }}", 
      datos
      );
  });
</script>
<script>
function imprimir(id)
{
  window.open("{{ url('Ticket/')}}" + '/' + id);
}
</script>
<script>
function cancela(id)
{
  event.preventDefault();
  $('#reserva').attr('value', id);
  var mensaje = confirm("¿Esta seguro de eliminar esta reservacion?");

  if (mensaje)
  {
    send(
      "reserva",
      "{{ url('Reservar/cancelar')}}"
       );
  }
}
</script>