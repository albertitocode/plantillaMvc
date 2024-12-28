
$(document).on ('click', "#mode-color", function() {
    console.log("funca");
    const darkMode = localStorage.getItem('dark-mode');
    
    if (darkMode === 'enabled') {
        document.body.classList.add('dark');
        document.getElementById('mode-color').textContent = 'Cambiar a Modo Claro';
    } else {
        document.body.classList.remove('dark');
        
        document.getElementById('mode-color').textContent = 'Cambiar a Modo Oscuro';
    }
    console.log("funca");
    document.getElementById('mode-color').addEventListener('click', function() {
        // Alterna el modo oscuro
        document.body.classList.toggle('dark');
        
        // Actualiza el texto del botón
        if (document.body.classList.contains('dark')) {
            localStorage.setItem('dark-mode', 'enabled');
            this.textContent = 'Cambiar a Modo Claro';
        } else {
            localStorage.setItem('dark-mode', 'disabled');
            this.textContent = 'Cambiar a Modo Oscuro';
        }
    });
});



// $(document).on('change', "#id_solicitud", function () {
//     let id_solicitud = $(this).val();
//     let url = $(this).attr('data-url');
//     console.log("gola");
//     console.log("Valor seleccionado: " + id_solicitud);
//     $.ajax({
//       url: url,
//       type: 'POST',
//       data: { 'id_solicitud': id_solicitud },
//       success: function (data) {
//         $('#formularios').html(data);
//       }
//     });
//   });