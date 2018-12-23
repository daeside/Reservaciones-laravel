<script>
  $("#change-password-btn").click(function()
  {
    if(validate("form-password"))
    {
      if(password("changepassword", "changepasswordconf"))
      {
        send(
            "password-content", 
            "{{ url('/Usuarios/cambiar')}}"
            );
      }
      else
      {
        alert('Las contraseñas no coinciden');
      }
    }
  });
</script>