$(document).ready(function () {
  const campos = {
    'usuario_nombre_1': 'Primer nombre',
    'usuario_apellido_1': 'Primer apellido',
    'usuario_correo': 'Correo electrónico',
    'usuario_direccion': 'Dirección',
    'usuario_apellido_2': 'Segundo apellido',
    'usuario_fecha_nacimiento': 'Fecha de nacimiento',
    'usuario_contrasenia': 'Contraseña',
    'usuario_telefono': 'Teléfono',
    'tipo_documento_id': 'Tipo de documento',
    'usuario_num_identificacion': 'Número de documento'
  };

  $(document).on('change', '#formUsu input, #formUsu select', function () {


    var formData = $('#formUsu').serializeArray();

    let esValido = true;

    // Limpiar los mensajes de error antes de comenzar la validación
    Object.keys(campos).forEach(campo => {
      const error = `error_${campo}`;
      document.getElementById(error).textContent = "";
    });

    // Validación de los campos
    formData.forEach(function (formData) {
      if (formData.value.trim() === '') {
        Object.keys(campos).forEach(campo => {
          if (campo === formData.name) {
            const error = `error_${formData.name}`;
            const valor = campos[campo];

            // Mostrar el mensaje de error correspondiente
            document.getElementById(error).textContent = `*El campo ${valor} es obligatorio*`;
            esValido = false;
          }
        });
      }
    });


  });


  $('#formUsu').submit(function (event) {
    event.preventDefault();


    var formData = $(this).serializeArray();




    let mensajes = [];


    let esValido = true;

    Object.keys(campos).forEach(campo => {
      const error = `error_${campo}`;
      document.getElementById(error).textContent = "";
    });


    formData.forEach(function (formData) {

      if (formData.value.trim() === '') {

        Object.keys(campos).forEach(campo => {


          if (campo === formData.name) {

            const error = `error_${formData.name}`;

            const valor = campos[campo];

            document.getElementById(error).textContent = `*El campo ${valor} es obligatorio*`;
            esValido = false;

          }
        });



      }
    });


    if (esValido) {
      alert('Formulario valido. Enviando datos..')
      this.submit();
    }
  });



  $('#form').submit(function (event) {
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
    const campos = {
      tipo_via: "Tipo de vía",
      num_via: "Número de vía",
      orientacion: "Orientación",
      numero2: "Número complemento 2",
      numero3: "Número complemento 3",
      barrio: "Barrio",
      tipo_choque: "Tipo de choque",
      detalle_choque: "Detalle de choque"
    };


    var formData = $(this).serializeArray();




    let mensajes = [];


    let esValido = true;

    Object.keys(campos).forEach(campo => {
      const error = `error_${campo}`;
      document.getElementById(error).textContent = "";
    });


    formData.forEach(function (formData) {

      if (formData.value.trim() === '') {

        Object.keys(campos).forEach(campo => {


          if (campo === formData.name) {

            const error = `error_${formData.name}`;
            const valor = campos[campo];
            if (campo === "tipo_choque" || campo === "detalle_choque") {
              document.getElementById(error).textContent = `*El campo ${valor} es obligatorio*`;



            } else {
              mensajes.push(`*El campo ${valor} es obligatorio*`);

            }
            esValido = false;

          }
        });



      }
    });


    if (esValido) {
      alert('Formulario valido. Enviando datos..')
      this.submit();
    }else{
      console.log("invalido")
    }
  });

  $(document).on('change', '#formAccidente input, #formAccidente select', function () {

    console.log("si net")

    var formData = $('#formAccidente').serializeArray();

    let esValido = true;
    let mensajes = [];
    const campos = {
      tipo_via: "Tipo de vía",
      num_via: "Número de vía",
      orientacion: "Orientación",
      numero2: "Número complemento 2",
      numero3: "Número complemento 3",
      barrio: "Barrio",
      tipo_choque: "Tipo de choque",
      detalle_choque: "Detalle de choque"
    };


    document.getElementById('error_direccion').textContent = "";
    document.getElementById('error_tipo_choque').textContent = "";

    document.getElementById('error_detalle_choque').textContent = "";



    // Validación de los campos

    formData.forEach(function (formData) {
      if (formData.value.trim() === '') {
        Object.keys(campos).forEach(campo => {
          if (campo === formData.name) {
            const error = `error_${formData.name}`;
            const valor = campos[campo];
            if (campo === "tipo_choque" || campo === "detalle_choque") {
              document.getElementById(error).textContent = `*El campo ${valor} es obligatorio*`;



            } else {
              mensajes.push(`*El campo ${valor} es obligatorio*`);

            }
            esValido = false;

          }
        });
      }
    });

    if (!esValido) {
      document.getElementById("error_direccion").innerHTML = mensajes.join('<br>');

    } else {
      console.log("datos completos")
    }

    // Aquí puedes añadir acciones adicionales si es necesario
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
        if (!data.includes("error")) {

          $("#detalle_choque").html(data);
          $('#dc').removeClass('d-none');
          console.log(data);

        } else {
          $('#dc').addClass('d-none');
        }



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

