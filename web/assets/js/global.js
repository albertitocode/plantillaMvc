$(document).ready(function () {
  $('#formu').submit(function (event) {
    event.preventDefault();

    let mensajes = [];

    $('#error').html('');

    let esValido = true;

    const nombre = $('#nombre').val().trim();
    if (nombre === '') {
      mensajes.push('El Nombre es obligatorio');
      esValido = false;
    }
    const apellido = $('#apellido').val().trim();
    if (apellido === '') {
      mensajes.push('El campo Apellido es obligatorio');
      esValido = false;
    }
    const email = $('#email').val().trim();
    if (email === '') {
      mensajes.push('El campo email es obligatorio');
      esValido = false;
    }
    const clave = $('#clave').val().trim();
    if (clave === '') {
      mensajes.push('El campo clave es obligatorio');
      esValido = false;
    }


    // const user = $('#user').val().trim();
    // if(user ===''){
    //   mensajes.push('El campo usuario es obligatorio');
    // }
    if (esValido) {
      // alert('Formulario valido. Enviando datos..')
      // $("#error").fadeout(500);
      this.submit();
    } else {

      $('#error').html(mensajes.map(ms => `${ms}<br>`).join(''));
      $('#error').removeClass('d-none');

    }
  });

  $('#formAccidente').submit(function (event) {


    event.preventDefault();


    let mensajes = [];

    $('#errorAccidente').html('');

    let esValido = true;

    const tipo_via = $('#tipo_via').val().trim();
    if (tipo_via === '') {
      mensajes.push('El tipo de via es obligatorio');
      esValido = false;
    }
    const num_via = $('#num_via').val().trim();
    if (num_via === '') {
      mensajes.push('El campo numero de via es obligatorio');
      esValido = false;
    }
    const orientacion = $('#orientacion').val().trim();
    if (orientacion === '') {
      mensajes.push('El campo orientacion es obligatorio');
      esValido = false;
    }
    const numero2 = $('#numero2').val().trim();
    if (numero2 === '') {
      mensajes.push('El campo numero complemento 2 es obligatorio');
      esValido = false;
    }
    const numero3 = $('#numero3').val().trim();
    if (numero3 === '') {
      mensajes.push('El campo numero complemento 3 es obligatorio');
      esValido = false;
    }

    const barrio = $('#barrio').val().trim();
    if (barrio === '') {
      mensajes.push('El campo barrio es obligatorio');
      esValido = false;
    }
    const tipo_choque = $('#tipo_choque').val().trim();
    if (tipo_choque === '') {
      mensajes.push('El campo tipo de choque es obligatorio');
      document.getElementById("tipoError").textContent = "El campo email es obligatorio";
      esValido = false;

    }

    // const user = $('#user').val().trim();
    // if(user ===''){
    //   mensajes.push('El campo usuario es obligatorio');
    // }
    if (esValido) {
      alert('Formulario valido. Enviando datos..')
      // $("#error").fadeout(500);
      this.submit();
    } else {

      $('#errorAccidente').html(mensajes.map(ms => `${ms}<br>`).join(''));
      $('#errorAccidente').removeClass('d-none');

    }
  });
  $(document).on('keyup', "#buscar", function () {
    let buscar = $(this).val();
    let url = $(this).attr('data-url');

    $.ajax({
      url: url,
      type: 'POST',
      data: { 'buscar': buscar },
      success: function (data) {
        $('tbody').html(data);
      }
    });
  });
  $(document).on('keyup', "#id_data", function () {
    let id_data = $(this).val();
    let url = $(this).attr('data-url');
    console.log("gola");
    $.ajax({
      url: url,
      type: 'POST',
      data: { 'id_data': id_data },
      success: function (data) {
        $('#datos').html(data);
      }
    });
  });
  $(document).on('change', "#id_solicitud", function () {
    let id_solicitud = $(this).val();
    let url = $(this).attr('data-url');
    console.log("gola");
    console.log("Valor seleccionado: " + id_solicitud);
    $.ajax({
      url: url,
      type: 'POST',
      data: { 'id_solicitud': id_solicitud },
      success: function (data) {
        $('#formularios').html(data);
      }
    });
  });
  $(document).on('click', '#cambiar_estado', function () {
    let id = $(this).attr('data-id');
    let url = $(this).attr('data-url');
    let user = $(this).attr('data-user');

    // alert("Funciona data: "+id+" user "+user+" url "+url);
    $.ajax({
      url: url,
      data: { id, user },
      type: 'POST',
      success: function (data) {
        $('tbody').html(data);
      }
    })
  });
  $(document).on('click', '#cambiar_estado_tar', function () {
    let id = $(this).attr('data-id');
    let url = $(this).attr('data-url');
    let tarea = $(this).attr('data-tarea');

    // alert("Funciona data: "+id+" user "+user+" url "+url);
    $.ajax({
      url: url,
      data: { id, tarea },
      type: 'POST',
      success: function (data) {
        $('tbody').html(data);
      }
    })
  });
  $(document).on('click', '#copyList', function () {
    let listUser = $("#listUser").html();

    $("#responsables").append(
      "<div class='col md-4 form-group'>" +
      "<label>Responsable</label>" +
      "<div class='row'>" +
      "<div class='col-md-10'>" + listUser + "</div>" +
      "<div class='col-md-2'>" +
      "<button class='btn btn-danger' type='button' id='removeList'>x</button" +
      "</div>" +
      "</div>" +
      "</div>"
    )
  });
  $(document).on('click', '#removeList', function () {
    $(this).parent().parent().parent().remove();
  });


  $('#tipo_choque').on('change', function () {




    var url = $(this).attr('data-url');
    var tipo_choque = $(this).val();

    $.ajax({
      url: url,
      type: 'POST',
      data: { 'tipo_choque': tipo_choque },
      success: function (data) {
        // Iterar sobre los detalles del choque y agregar opciones al select
        $("#detalle_choque").html(data);

      },
      error: function () {
        alert('Error al cargar los detalles del choque.');
      }
    });

  });


  $(document).on('change', "#id_consult_solicitud", function () {
    let id_consult_solicitud = $(this).val();
    let url = $(this).attr('data-url');
    console.log("gola");
    alert("Valor seleccionado: " + id_consult_solicitud)
    $.ajax({
      url: url,
      type: 'POST',
      data: { 'id_solicitud': id_consult_solicitud },
      success: function (data) {
        $('#formularios').html(data);
      }
    });
  });

});

