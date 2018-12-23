<script>
  $("#usuarios-add").click(function()
  {
    if(validate("form-agregar"))
    {
      send(
          "add-user", 
          "{{ url('/Usuarios/agregar')}}", 
          );
    }
  });
</script>