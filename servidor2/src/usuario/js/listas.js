$(document).ready(function () {

    $("#nombre").focus();

    $("#boton3").click(function (evento) {
        
        evento.preventDefault();

        var nombre = $("#nombre").val();

        if (nombre == "") {

            alert("El campo nombre esta en blanco");
            $("#nombre").css("border", "1px solid red");
            $("#nombre").css("border-radius","3px");
            $("#nombre").focus();
            
            return;

        } else {

            $.ajax({

                url:"./nombreListas.php",
                type: "POST",
                dataType: "HTML",
                data: "",
    
            }).done(function(a){

                $("#crearLista").submit(); 
                alert("La lista se ha creado");
                
            }).fail(function(a){
    
                alert(a);
            });
    
        }
     
    });
    
});
