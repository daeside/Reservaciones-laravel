<script>
$("#login-btn").click(function()
{ 
  event.preventDefault();
  if(validate("login"))
  {
    login(
      "login-content", 
      "{{ url('/login') }}", 
      "{{ url('/Busquedas') }}"
      );
  }
});
</script>