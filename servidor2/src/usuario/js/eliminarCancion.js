$(document).ready(function (){

    $(".borrarCancion").click(function () {

        const nombreCancion = $(this).attr("value");

        var confirmar = confirm("¿Estas seguro de que quieres borrar esta cancion?");

        if (confirmar == true) {

            $.ajax({

                url: "./eliminarCancion.php",
                type: "POST",
                data: {
                    nombreCancion: nombreCancion,
                },
                success: function (response) {

                    //$("#listaCompleta").html(response);
                    alert("La cancion se ha borrado");

                },
                error: function () {

                    alert("Error al borrar la cancion");
                }

            });

        }

    });
});