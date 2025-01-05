$(document).ready(function () {



  // Añadir un evento para cerrar el popover cuando se haga clic fuera del área del popover
  $(document).on('click', function (e) {
    $('[data-bs-toggle="popover"]').each(function () {
      var popoverElement = $(this); // Elemento del popover

      // Verifica si el clic es fuera del popover
      if (!popoverElement.is(e.target) && popoverElement.has(e.target).length === 0) {
        var popoverInstance = bootstrap.Popover.getInstance(popoverElement[0]); // Obtiene la instancia del popover
        if (popoverInstance && popoverInstance._isShown) {
          popoverInstance.hide(); // Cierra el popover si está abierto
        }
      }
    });
  });

  const camposUsu = {
    'usuario_nombre_1': 'Primer nombre',
    'usuario_apellido_1': 'Primer apellido',
    'usuario_correo': 'Correo electrónico',
    'usuario_direccion': 'Dirección',
    'usuario_nombre_2': 'Segundo nombre',
    'usuario_apellido_2': 'Segundo apellido',
    'usuario_fecha_nacimiento': 'Fecha de nacimiento',
    'usuario_contrasenia': 'Contraseña',
    'usuario_telefono': 'Teléfono',
    'tipo_documento_id': 'Tipo de documento',
    'usuario_num_identificacion': 'Número de documento'
  };
  const camposSenialM = {
    'categoria_senial_id': 'Categoria',
    'danio_id': 'Daño',
    'tipo_senial_id': 'Tipo de señal',
    'senial_id': 'Señal'
  };
  const camposSenialN = {
    'categoria_senial_id': 'Categoria',
    'tipo_senial_id': 'Tipo de señal',
    'senial_id': 'Señal'
  };
  const camposReductorM = {
    'categoria_senial_id': 'Categoria',
    'danio_id': 'Daño',
    'tipo_senial_id': 'Tipo de señal',
    'senial_id': 'Señal'
  };
  const camposReductorN = {
    'categoria_reductor_id': 'Categoria',
    'reductor_id': 'Reductor'
  };
  //   function validarNumeros($input){
  //     $patron="/^[0-9]+$/";
  //     return preg_match($patron,$input)===1;
  // }

  function validarCampoLetras(input) {
    const patron = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u;
    return patron.test(input);
  }

  function validarNumeros(input) {
    const patron = /^[0-9]+$/;
    return patron.test(input);
  }

  function validarCorreo(input) {
    const patron = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return patron.test(input);
  }

  function validacionGeneral(input) {
    const patron = /^[a-zA-ZñÑ0-9_()$¿?"\.\s]{10,}$/u;
    return patron.test(input);
  }


  function validarContrasenia(input) {
    const errores = [];
    const longitudMinima = 8;
    const tieneMinuscula = /[a-zñ]/.test(input);
    const tieneMayuscula = /[A-ZÑ]/.test(input);
    const tieneNumero = /[0-9]/.test(input);
    const tieneEspecial = /[!@#$%^&*()_+.\-]/.test(input);

    if (input.length < longitudMinima) {
      errores.push("al menos 8 caracteres");
    }
    if (!tieneMinuscula) {
      errores.push("una letra minúscula");
    }
    if (!tieneMayuscula) {
      errores.push("una letra mayúscula");
    }
    if (!tieneNumero) {
      errores.push("un número");
    }
    if (!tieneEspecial) {
      errores.push("un carácter especial");
    }

    if (errores.length > 0) {
      document.getElementById('error_usuario_contrasenia').textContent = `*La contraseña debe contener al menos: ${errores.join(', ')}.*`;

    }
    return true;
  }
  function loadColor() {
    // Verifica el modo guardado en localStorage
    const darkMode = localStorage.getItem('dark-mode');

    if (darkMode === 'enabled') {
      const sidebar_color = document.querySelector('.sidebar');
      const header_logo_color = document.querySelector('.logo-header');
      const main_header_color = document.querySelector('.main-header');
      const footer_color = document.querySelector('.footer');
      const card_color = document.querySelector('.card');
      const userName = document.querySelector('.profile-username');
        const sidebarText = document.querySelector('.sub-item');
      const userBox = document.querySelector('.dropdown-user-scroll scrollbar-outer');
      document.body.classList.add('dark');
      sidebar_color.classList.add('dark');
      header_logo_color.classList.add('dark');
      main_header_color.classList.add('dark');
      footer_color.classList.add('dark');
      card_color.classList.add('dark');
      userName.classList.add('dark');
      userBox.classList.add('dark');
        sidebarText.classList.add('dark');
      document.getElementById('toggleButton').textContent = 'Cambiar a Modo Claro';
    } else {
      document.body.classList.remove('dark');
      document.getElementById('toggleButton').textContent = 'Cambiar a Modo Oscuro';
    }
  }

  $(document).ready(function () {
    $('#toggleButton').on('click', function () {
      // Alterna el modo oscuro
      const sidebar_color = document.querySelector('.sidebar');
      const header_logo_color = document.querySelector('.logo-header');
      const main_header_color = document.querySelector('.main-header');
      const footer_color = document.querySelector('.footer');
      const card_color = document.querySelector('.card');
      const userName = document.querySelector('.profile-username');
      const userBox = document.querySelector('.dropdown-user-scroll scrollbar-outer');
      document.body.classList.toggle('dark');
      sidebar_color.classList.toggle('dark');
      header_logo_color.classList.toggle('dark');
      main_header_color.classList.toggle('dark');
      footer_color.classList.toggle('dark');
      card_color.classList.toggle('dark');
      userName.classList.toggle('dark');
      userBox.classList.toggle('dark');
      // Actualiza el texto del botón
      if (document.body.classList.contains('dark') && header_logo_color.classList.contains('dark') && sidebar_color.classList.contains('dark') && main_header_color.classList.contains('dark')) {
        localStorage.setItem('dark-mode', 'enabled');
        this.textContent = 'Cambiar a Modo Claro';
      } else {
        localStorage.setItem('dark-mode', 'disabled');
        this.textContent = 'Cambiar a Modo Oscuro';
      }
    });
  });









  $(document).on('input', '#formUsu input, #formUsu select', function () {

    var formData = $('#formUsu').serializeArray();
    let esValido = true;

    // Limpiar los mensajes de error antes de comenzar la validación
    Object.keys(camposUsu).forEach(campoUsu => {
      const error = `error_${campoUsu}`;
      document.getElementById(error).textContent = ""; // Limpia los errores
    });

    // Validación de los campos
    formData.forEach(function (campoData) {
      const { name, value } = campoData;
      const error = `error_${name}`;
      const valor = camposUsu[name];

      // Validar campos vacíos
      if (valor && valor !== 'Segundo nombre' && value.trim() === '') {

        document.getElementById(error).textContent = `*El campo ${valor} es obligatorio*`;
        esValido = false;

      }


      if (value.trim() !== '') {
        switch (name) {
          case 'usuario_nombre_1':
          case 'usuario_nombre_2':
          case 'usuario_apellido_1':
          case 'usuario_apellido_2':
            if (!validarCampoLetras(value)) {
              document.getElementById(error).textContent = `*El campo ${camposUsu[name]} solo debe contener letras.*`;
              esValido = false;
            }
            break;

          case 'usuario_correo':
            if (!validarCorreo(value)) {
              document.getElementById(error).textContent = `*Ingrese un correo válido.*`;
              esValido = false;
            }
            break;
          case 'usuario_telefono':
            if (!validarNumeros(value)) {
              document.getElementById(error).textContent = `*El campo Teléfono debe contener solo números.*`;
              esValido = false;
            }
            break;
          case 'usuario_contrasenia':
            if (!validarContrasenia(value)) {

              esValido = false;
            }
            break;
          case 'tipo_documento_id':
            if (value === '') {
              document.getElementById(error).textContent = `*Debe seleccionar un tipo de documento.*`;
              esValido = false;
            }
            break;
          case 'usuario_num_identificacion':
            if (!validarNumeros(value)) {
              document.getElementById(error).textContent = `*El campo Número de documento debe contener solo números.*`;
              esValido = false;
            }
            break;
        }
      }
    });

    const submitButton = document.getElementById('btnSubmit');
    if (esValido) {
      console.log('Formulario válido');
      submitButton.disabled = false;
    } else {
      console.log('Formulario no válido');
      submitButton.disabled = true;
    }
  });

  //new perfil
  $(document).on('input', '#formNewUsu input, #formNewUsu select', function (event) {
    event.preventDefault();
    console.log("entraa");
    var formData = $('#formNewUsu').serializeArray();
    let esValido = true;

    // Limpiar los mensajes de error antes de comenzar la validación
    Object.keys(camposUsu).forEach(campoUsu => {
      const error = `error_${campoUsu}`;
      document.getElementById(error).textContent = ""; // Limpia los errores
    });

    // Validación de los campos
    formData.forEach(function (campoData) {
      const { name, value } = campoData;
      const error = `error_${name}`;
      const valor = camposUsu[name];

      // Validar campos vacíos
      if (value.trim() === '') {
        if (camposUsu[name]) {

          document.getElementById(error).textContent = `*El campo ${valor} es obligatorio*`;
          esValido = false;
        }
      }

      // Validar contraseña
      else if (name === 'usuario_contrasenia') {
        if (!validarContrasenia(value)) {
          esValido = false;
          document.getElementById('error_usuario_contrasenia').textContent = `*En el campo contraseña debes ingresar mínimo 8 caracteres, 
              incluyendo una mayúscula, una minúscula, un número y un carácter especial.*`;
        } else {
          document.getElementById('error_usuario_contrasenia').textContent = ""; // Borrar error
        }
      } else {
        switch (name) {
          case 'usuario_nombre_1':
          case 'usuario_nombre_2':
          case 'usuario_apellido_1':
          case 'usuario_apellido_2':
            if (!validarCampoLetras(value)) {
              document.getElementById(error).textContent = `*El campo ${camposUsu[name]} solo debe contener letras.*`;
              esValido = false;
            }
            break;

          case 'usuario_correo':
            if (!validarCorreo(value)) {
              document.getElementById(error).textContent = `*Ingrese un correo válido.*`;
              esValido = false;
            }
            break;
          case 'usuario_telefono':
            if (!validarNumeros(value)) {
              document.getElementById(error).textContent = `*El campo Teléfono debe contener solo números.*`;
              esValido = false;
            }
            break;
          case 'usuario_contrasenia':
            if (!validarContrasenia(value)) {
              document.getElementById(error).textContent = `*La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula, un número y un carácter especial.*`;
              esValido = false;
            }
            break;
          case 'tipo_documento_id':
            if (value === '') {
              document.getElementById(error).textContent = `*Debe seleccionar un tipo de documento.*`;
              esValido = false;
            }
            break;
          case 'usuario_num_identificacion':
            if (!validarNumeros(value)) {
              document.getElementById(error).textContent = `*El campo Número de documento debe contener solo números.*`;
              esValido = false;
            }
            break;
        }
      }
    });

    const submitButton = document.getElementById('btnNewUser');
    if (esValido) {
      console.log('Formulario válido');
      submitButton.disabled = false;
    } else {
      console.log('Formulario no válido');
      submitButton.disabled = true;
    }
  });


  $(document).on('input', '#formMalSenial input, #formMalSenial select', function (event) {
    event.preventDefault();
    console.log("funca esto");
    var formData = $('#formMalSenial').serializeArray();
    let esValido = true;

    // Limpiar los mensajes de error antes de comenzar la validación
    Object.keys(camposSenialM).forEach(campoSenialM => {
      const error = `error_${campoSenialM}`;
      document.getElementById(error).textContent = ""; // Limpia los errores
    });

    // Validación de los campos
    formData.forEach(function (campoData) {
      const { name, value } = campoData;
      const error = `error_${name}`;
      const valor = camposSenialM[name];

      // Validar campos vacíos
      if (value.trim() === '') {
        if (camposSenialM[name]) {

          document.getElementById(error).textContent = `*El campo ${valor} es obligatorio*`;
          esValido = false;
        }
      }
    });

    const submitButton = document.getElementById('btnSenialM');
    if (esValido) {
      console.log('Formulario válido');
      submitButton.disabled = false;
    } else {
      console.log('Formulario no válido');
      submitButton.disabled = true;
    }
  });


  $(document).on('input', '#formNuevaSenial input, #formNuevaSenial select', function (event) {
    event.preventDefault();
    //console.log("funca esto yes");
    var formData = $('#formNuevaSenial').serializeArray();
    let esValido = true;

    // Limpiar los mensajes de error antes de comenzar la validación
    Object.keys(camposSenialN).forEach(campoSenialN => {
      const error = `error_${campoSenialN}`;
      document.getElementById(error).textContent = ""; // Limpia los errores
    });

    // Validación de los campos
    formData.forEach(function (campoData) {
      const { name, value } = campoData;
      const error = `error_${name}`;
      const valor = camposSenialN[name];

      // Validar campos vacíos
      if (value.trim() === '') {
        if (camposSenialN[name]) {

          document.getElementById(error).textContent = `*El campo ${valor} es obligatorio*`;
          esValido = false;
        }
      }
    });

    const submitButton = document.getElementById('btnSenialN');
    if (esValido) {
      console.log('Formulario válido');
      submitButton.disabled = false;
    } else {
      console.log('Formulario no válido');
      submitButton.disabled = true;
    }
  });

  //nuevo reductor
  $(document).on('input', '#formNuevoReductor input, #formNuevoReductor select', function (event) {
    event.preventDefault();
    //console.log("funca esto yes");
    var formData = $('#formNuevoReductor').serializeArray();
    let esValido = true;

    // Limpiar los mensajes de error antes de comenzar la validación
    Object.keys(camposReductorN).forEach(campoReductorN => {
      const error = `error_${campoReductorN}`;
      document.getElementById(error).textContent = ""; // Limpia los errores
    });

    // Validación de los campos
    formData.forEach(function (campoData) {
      const { name, value } = campoData;
      const error = `error_${name}`;
      const valor = camposReductorN[name];

      // Validar campos vacíos
      if (value.trim() === '') {
        if (camposReductorN[name]) {

          document.getElementById(error).textContent = `*El campo ${valor} es obligatorio*`;
          esValido = false;
        }
      }
    });

    const submitButton = document.getElementById('btnReductorN');
    if (esValido) {
      console.log('Formulario válido');
      submitButton.disabled = false;
    } else {
      console.log('Formulario no válido');
      submitButton.disabled = true;
    }
  });
  // $('#formUsu').submit(function (event) {
  //   event.preventDefault();


  //   var formData = $(this).serializeArray();




  //   let mensajes = [];


  //   let esValido = true;

  //   Object.keys(campos).forEach(campo => {
  //     const error = `error_${campo}`;
  //     document.getElementById(error).textContent = "";
  //   });


  //   formData.forEach(function (formData) {

  //     if (formData.value.trim() === '') {

  //       Object.keys(campos).forEach(campo => {


  //         if (campo === formData.name) {

  //           const error = `error_${formData.name}`;

  //           const valor = campos[campo];

  //           document.getElementById(error).textContent = `*El campo ${valor} es obligatorio*`;
  //           esValido = false;

  //         }
  //       });



  //     } else if (formData.name === 'usuario_contrasenia') {
  //       if (validarNumeros(formData.name) == false) {
  //         esValido = false;
  //         document.getElementById(formData.name).textContent = `*En el campo contraseña debes ingresar minimo 8
  //          caracteres y contener al menos una mayuscula, una minuscula, 
  //          un numero y un caracter especial*`;

  //       }


  //     }
  //   });


  //   if (esValido) {
  //     alert('Formulario valido. Enviando datos..')
  //     this.submit();
  //   }
  // });



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
    } else {
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





  //filtracion
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
  //ajax cargar formulario de solicitudes
  $(document).on('change', "#id_solicitud", function () {
    let id_solicitud = $(this).val();
    let url = $(this).attr('data-url');
    console.log("gola");
    // console.log("Valor seleccionado: " + id_solicitud);
    $.ajax({
      url: url,
      type: 'POST',
      data: { 'id_solicitud': id_solicitud },
      success: function (data) {
        $('#formularios').html(data);
      }
    });
  });
  //cargar consulta de solicitudes 
  $(document).on('change', "#id_consult_solicitud", function () {
    let id_consult_solicitud = $(this).val();
    let url = $(this).attr('data-url');
    console.log("gola");
    // alert("Valor seleccionado: " + id_consult_solicitud)
    $.ajax({
      url: url,
      type: 'POST',
      data: { 'id_solicitud': id_consult_solicitud },
      success: function (data) {
        $('#formularios').html(data);
      }
    });
  });
  //ajax cargar formulario de reportes
  $(document).on('change', "#id_reporte", function () {
    let id_reporte = $(this).val();
    let url = $(this).attr('data-url');
    console.log("Helou");
    console.log("Valor seleccionado: " + id_reporte);
    $.ajax({
      url: url,
      type: 'POST',
      data: { 'id_reporte': id_reporte },
      success: function (data) {
        $('#formulariosReport').html(data);
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





  $(document).on('change', '#formSenialM select, #formSenialN select', function () {

    var url = $(this).attr('data-url');
    var categoria_senial = $('#categoria_senial_id').val();
    var tipo_senial = $('#tipo_senial_id').val();

    $.ajax({
      url: url,
      type: 'POST',
      data: {
        'tipo_senial': tipo_senial,
        'categoria_senial': categoria_senial
      },
      success: function (data) {
        if (!data.includes("error")) {

          $("#senial").html(data);
          $('#senal').removeClass('d-none');
          console.log(data);

        } else {
          $('#senal').addClass('d-none');
        }



      },
      error: function () {
        alert('Error al cargar los detalles del choque.');
      }
    });

  });


  $(document).on('change', '#formReductorM select, #formReductorN select', function () {

    var url = $(this).attr('data-url');
    var categoria_reductor = $('#categoria_reductor_id').val();

    $.ajax({
      url: url,
      type: 'POST',
      data: {
        'categoria_reductor': categoria_reductor
      },
      success: function (data) {
        if (!data.includes("error")) {

          $("#reductor_id").html(data);
          $('#reduct').removeClass('d-none');
          console.log(data);

        } else {
          $('#reduct').addClass('d-none');
        }



      },
      error: function () {
        alert('Error al cargar los detalles del choque.');
      }
    });

  });

});

