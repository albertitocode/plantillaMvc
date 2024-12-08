$(document).ready(function() {
  $('#formu').submit(function(event){
    event.preventDefault();
  
    let mensajes=[];
  
    $('#error').html('');
  
    let esValido= true;
  
    const nombre = $('#nombre').val().trim();
    if(nombre === ''){
      mensajes.push('El Nombre es obligatorio');
      esValido= false;
    }
    const apellido = $('#apellido').val().trim();
    if (apellido ===''){
      mensajes.push('El campo Apellido es obligatorio');
      esValido = false;
    }
    const email= $('#email').val().trim();
    if(email === ''){
      mensajes.push('El campo email es obligatorio');
      esValido = false;
    }
    const clave= $('#clave').val().trim();
    if(clave===''){
      mensajes.push('El campo clave es obligatorio');
      esValido = false;
    }

    
    // const user = $('#user').val().trim();
    // if(user ===''){
    //   mensajes.push('El campo usuario es obligatorio');
    // }
    if(esValido){
      // alert('Formulario valido. Enviando datos..')
      // $("#error").fadeout(500);
      this.submit();
    }else{
      
      $('#error').html(mensajes.map(ms=> `${ms}<br>`).join(''));
      $('#error').removeClass('d-none');
      
    }
  }); 
  $(document).on('keyup',"#buscar",function(){
    let buscar= $(this).val();
    let url= $(this).attr('data-url');
                     
    $.ajax({
      url:url,
      type: 'POST',
      data: {'buscar':buscar},
      success: function(data){
        $('tbody').html(data);
      }
    });
  });
  $(document).on('keyup',"#id_data",function(){
    let id_data= $(this).val();
    let url= $(this).attr('data-url');
    console.log("gola");
    $.ajax({
      url:url,
      type: 'POST',
      data: {'id_data':id_data},
      success: function(data){
        $('#datos').html(data);
      }
    });
  });
  $(document).on('change',"#id_solicitud",function(){
    let id_solicitud= $(this).val();
    let url= $(this).attr('data-url');
    console.log("gola");
    console.log("Valor seleccionado: " + id_solicitud);
    $.ajax({
      url:url,
      type: 'POST',
      data: {'id_solicitud':id_solicitud},
      success: function(data){
        $('#formularios').html(data);
      }
    });
  });
  $(document).on('click','#cambiar_estado',function(){
      let id = $(this).attr('data-id');
      let url = $(this).attr('data-url');
      let user = $(this).attr('data-user');

      // alert("Funciona data: "+id+" user "+user+" url "+url);
      $.ajax({
        url:url,
        data:{id,user},
        type:'POST',
        success: function(data){
          $('tbody').html(data);
        }
      })
  });
  $(document).on('click','#cambiar_estado_tar',function(){
    let id = $(this).attr('data-id');
    let url = $(this).attr('data-url');
    let tarea = $(this).attr('data-tarea');

    // alert("Funciona data: "+id+" user "+user+" url "+url);
    $.ajax({
      url:url,
      data:{id,tarea},
      type:'POST',
      success: function(data){
        $('tbody').html(data);
      }
    })
  });
  $(document).on('click','#copyList',function(){
    let listUser = $("#listUser").html();

    $("#responsables").append(
      "<div class='col md-4 form-group'>"+
      "<label>Responsable</label>"+
      "<div class='row'>"+
        "<div class='col-md-10'>"+listUser+"</div>"+
        "<div class='col-md-2'>"+
            "<button class='btn btn-danger' type='button' id='removeList'>x</button"+
          "</div>"+
        "</div>"+
      "</div>"
    )
  });
  $(document).on('click','#removeList',function(){
    $(this).parent().parent().parent().remove();
  });
});

