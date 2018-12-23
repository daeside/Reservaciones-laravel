function crearSelect(link, id)
{
  let Options='<option value="" disabled="" selected="">Punto</option>';

  $.ajax(
  {
    type: "POST",
    url: link,
    headers: 
    {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response)
    {
      $.each(JSON.parse(response), function(i, val)
      { 
        Options += "<option value='" + parseInt(val.id) +"'>" + String(val.nombre) + "</option>";
        $('#' + id).empty();
        $('#' + id).append(Options);
        $('#' + id).formSelect()
      });
    }
  }); 
}

function selectHora(link, id)
{
  let Options='<option value="" disabled="" selected="">Hora</option>';

  $.ajax(
  {
    type: "POST",
    url: link,
    headers: 
    {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response)
    {
      $.each(JSON.parse(response), function(i, val)
      { 
        Options += "<option value='" + parseInt(val.id) +"'>" + String(val.hora) + "</option>";
        $('#' + id).empty();
        $('#' + id).append(Options);
        $('#' + id).formSelect()
      });
    }
  }); 
}

function validate(clase)
{
  let control = true;
  let formulario = $("." + clase);

  for (i = 0; i < formulario.length; i++) 
  {
    if (formulario[i].value === '' || formulario[i].value === null || formulario[i].value.lenght == 0 || /^\s+$/.test(formulario[i].value)) 
    {
      alert("Faltan campos por llenar");
      $("#" + formulario[i].id).focus();
      control = false;
      break;
    }
  }

  return control;
}

function password(psw, pswconf)
{
  let campo = $('#' + psw).val();
  let campo2 = $('#' + pswconf).val();

  if(campo != campo2)
  {
    return false;
  }

  return true;
}

function login(datos, php, home)
{
  $.ajax(
  {                        
    type: "POST",                 
    url: php,
    headers: 
    {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },                     
    data: $("#" + datos).serialize(), 
    success: function(response)             
    {
      if(response == 1)
      {
        location.href = home;
      }
      else
      {
        alert(response);
      }            
    }
  });
}

function send(datos, php)
{
  $.ajax(
  {                        
    type: "POST",                 
    url: php,
    headers: 
    {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },                     
    data: $("#" + datos).serialize(), 
    success: function(response)             
    {
      alert(response);
      location.reload();            
    }
  });
}

function tabla(link, id, idioma, columnas)
{
   $('#' + id).dataTable(
    {
      "processing": true,
      "serverSide": false,
      "ajax": 
      {
        "url": link
      },
      "language": 
        {
           "url": idioma
        },
      "columns": columnas
   });
}

function calendario(datemin, datemax)
{
  $('.datepicker').datepicker(
  {
    format: 'yyyy-mm-dd',
    minDate: new Date(datemin),
    maxDate: new Date(datemax),
    i18n: 
    {
      cancel: 'cancelar',
      done: 'aceptar',
      months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
      monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
      weekdays: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
      weekdaysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
      weekdaysAbbrev: ["D", "L", "M", "M", "J", "V", "S"]
    }
  });
}

function hideshow(id)
{
  $("#" + id).removeClass("hide");
  $("#" + id).addClass("visible");
}

function showhide(id)
{
  $("#" + id).removeClass("visible");
  $("#" + id).addClass("hide");
}

function tipoReserva(dato, nombresel, folio, cuarto, nombre, cfolio, ccuarto, cnombre)
{
  switch(dato)
  {
    case '1':
    $('#' + folio).attr('value', 1);
    $('#' + cfolio).attr('style', 'visibility: hidden;');
    $('#' + cuarto).removeAttr('value');
    $('#' + ccuarto).removeAttr('style');
    $('#' + cnombre).removeAttr('style');
    $('#' + nombre).removeAttr('value');
    break;

    case '2':
    $('#' + cuarto).attr('value', 1);
    $('#' + ccuarto).attr('style', 'visibility: hidden;');
    $('#' + folio).removeAttr('value');
    $('#' + cfolio).removeAttr('style');
    $('#' + cnombre).removeAttr('style');
    $('#' + nombre).removeAttr('value');
    break;

    case '3':
    $('#' + cfolio).attr('style', 'visibility: hidden;');
    $('#' + ccuarto).attr('style', 'visibility: hidden;');
    $('#' + cnombre).attr('style', 'visibility: hidden;');
    $('#' + folio).attr('value', '0001221');
    $('#' + cuarto).attr('value', 1);
    $('#' + nombre).attr('value', nombresel);
    break;

    case '4':
    $('#' + cfolio).attr('style', 'visibility: hidden;');
    $('#' + ccuarto).attr('style', 'visibility: hidden;');
    $('#' + cnombre).attr('style', 'visibility: hidden;');
    $('#' + folio).attr('value', '0001221');
    $('#' + cuarto).attr('value', 1);
    $('#' + nombre).attr('value', nombresel);
    break;
  }
}