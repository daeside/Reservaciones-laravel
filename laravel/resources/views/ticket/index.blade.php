<style type="text/css">
  #container-ticket 
  { 
    position: absolute;
    width: 250px;
    max-width: 250px;
    font-size: 11.5px;
    color: #202020;
    font-family: 'Times New Roman';
  }

  #ticket-title
  {
    text-align: center;
    font-size: 12px;
  }

  @page 
  {
    size:  auto;
    margin: 5mm;
  }
</style>

<div id="container-ticket">
  <div id="ticket-title">
    <p>Crown Paradise Club - Cancun</p>
    <p>{{$restaurante}}</p>
  </div>
  <hr>
  <p># Confirm: {{$id}}</p>
  <p>Fecha/Date: {{$fecha}}</p>
  <p>Cuarto/Room: {{$cuarto}}</p>
  <p>Nombre/Name: {{$nombre}}</p>
  <p>Hora/Time: {{$hora}}</p>
  <p>Mesa/Table: {{$mesa}}</p>
  <p>Oper/User: {{$operador}}</p>
  <p>Notas: {{$notas}}</p>
  <hr>
  <p>TOLERANCIA DE ESPERA 5 MINUTOS MAXIMO</P>
  <p>CODIGO DE VESTIR CASUAL: PLAYERA TIPO POLO ZAPATO CERRADO Y BERMUDA DE VESTIR</p>
  <hr>
  <p>MAXIMUM WAITING TIME OF 5 MINUTES</p>
  <P>THE DRESS CODE IS CASUAL: WEAR A POLO TIPE SHIRT, CLOSED TOE SHOES AND DRESS BERMUDA</P> 
</div>
<script>
  window.print();
  close();
</script>