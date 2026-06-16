$(document).ready(function () {

    $(".music-player-container").hide();

    //Boton para seleccionar las canciones y añadirlas a la lista indicada
    $(".añadirCancion").click(function () {

        $(".canciones").css("display", "block");
        $("#listaCompleta").css("display", "none");
        $("#eliminar").css("display", "none");
        $(".music-player-container").show();

        const row = this.closest('tr');
        const nombreList = row.getAttribute('data-lista-nombre');


        //Funcion para guardar en un array las canciones seleccionadas
        $(document).on("change", "#cancion", function () {

            var array = [];

            //Esto deja checkeada la primera cancion
            var cancion = $(this).data("src");

            //añade la cancion al array
            array.push(cancion);


                $("#formCanciones").on("submit", function () {
                    
                    const fila = $(".verLista").closest('tr');
                    const listaNombre = fila.data('lista-nombre');

                    $("#listaCompleta").show();
                    $(".canciones").hide();
                    
                    alert("Las canciones se han añadido a la lista "+listaNombre);
                   
                    /*$.ajax({

                        url: "./listasguardadas.php",
                        type: "POST",
                        data: {
                            
                            lista: listaNombre,
                        },
                       
                    }).done(function () {

                        alert("Las canciones se han añadido a la lista");
                        $("#listaCompleta").show();
                        $(".canciones").hide();

                    }).fail(function () {

                        alert("Error al añadir las canciones a la lista");

                    });*/

                   
                });

                $(".canciones").show();

        });

        const idLista = $(this).data("lista-id");

        $("#formCanciones").find("input[name='idLista']").val(idLista);
        $(".canciones").show();
    
    });


    //Boton verLista
    $(".verLista").click(function () {

        $("#listaCompleta").css("display", "block");
        $(".canciones").hide();
        $("#eliminar").css("display", "none");
        $(".music-player-container").show();

        const row = this.closest("tr");
        const listaNombre = row.getAttribute("data-lista-nombre");

        const idLista = $(this).attr("value"); // Obtén el ID de la lista

        $.ajax({
            
            url: "./verLista.php",
            method: "POST",
            data: {
                idLista: idLista,
            },
            success: function (response) {

                $("#listaCompleta").html(response);
                $("#listaCompleta").show();
               
                
            },
            error: function () {
                alert("Error al obtener las canciones.");
            }

           
        });

    });


    //Boton eliminarLista
    $(".eliminarLista").click(function () {

        $("#eliminar").css("display", "none");
        $(".canciones").css("display", "none");
        $("#listaCompleta").css("display", "none");
        $(".music-player-container").hide();
        $(".canciones").hide();

        const idlist = $(this).attr("value"); //Id de la lista
        const lista = $(this).data("lista-nombre");//Nombre de la lista

        var confirmacion = confirm("¿Estas seguro de que quieres borrar la lista " + lista + "?");

        if (confirmacion == true) {

            $.ajax({

                url: "./eliminarLista.php",
                method: "POST",
                data: {
                    idLista: idlist,
                },
                success: function (response) {

                    $("#eliminar").html(response);
                    alert("La lista " + lista + " se ha borrado");

                },
                error: function () {

                    alert("Error al borrar la lista");
                },

            });


        }

    });


});

