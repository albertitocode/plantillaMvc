$(document).ready(function() {
    $('#form').submit(function(event){
      event.preventDefault();
    
      let mensajes=[];
    
      $('#error').html('');
    
      let esValido= true;
    
      const nombre = $('#usu_nombre_1').val().trim();
      if(nombre === ''){
        mensajes.push('El Primer nombre es obligatorio');
        esValido= false;
      }
      const apellido = $('#usu_apellido_1').val().trim();
      if (apellido ===''){
        mensajes.push('El campo Primer apellido es obligatorio');
        esValido = false;
      }
      const email= $('#usu_correo').val().trim();
      if(email === ''){
        mensajes.push('El campo correo es obligatorio');
        esValido = false;
      }
      const clave= $('#usu_contrasena').val().trim();
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
  
  