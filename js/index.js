$(document).ready(function () {
    $.ajax({
        url:'../controlador/seguridad.php',
        type:'POST',
        data:{},
        success:function (msj) {
          $('#Modulos_user').html(msj);      
        }
    })    
});