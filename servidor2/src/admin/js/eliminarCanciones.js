$(document).ready(function () {

    $(".eliminarCancion").click(function () {

        const idCancion = $(this).attr("value");
        const id = $("#playlist").find("input[name='idCancion']").val(idCancion);
        confirm("¿Estas seguro de que quieres borrar esta cancion?");
        
        $.ajax({

            url: "./borrarCanciones.php",
            type: "POST",
            data: {
                idCancion: idCancion
            },
            success: function(response){

                $("#resultado").html(response);
                alert("La cancion se ha borrado");
            },
            error: function(){

                alert("Error al borrar la cancion");
            }
        });
    });
});