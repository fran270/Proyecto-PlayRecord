document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formulario").addEventListener("submit", validarCampos);
    document.getElementById("usuario").focus();

});


function validarCampos(evento) {

    evento.preventDefault();

    var usuario = document.getElementById("usuario").value;
    var contraseña = document.getElementById("contraseña").value;

    //Si el campo esta en blanco salta un mensaje de error
    if (usuario.length == 0) {

        alert("El nombre de usuario no es valido");
        document.getElementById("usuario").focus();
        document.getElementById("usuario").className = "error";

        return false

    } else if (usuario.length > 100) {

        alert("El nombre de usuario no puede contener mas de 100 caracteres");
        document.getElementById("usuario").focus();
        document.getElementById("usuario").className = "error";

        return false

    } 
    
    //Si no hay error el borde del input se pone en verde
    document.getElementById("usuario").style.border = "1px solid green";
     

    //Si el campo contraseña esta en blanco salta un mensaje de error
    if (contraseña.length == 0) {

        alert("El campo contraseña esta en blanco");
        document.getElementById("contraseña").focus();
        document.getElementById("contraseña").className = "error";

        return false

    }

    //Patron campo contraseña
    var patron = /^\d?[a-z]{4}\d{4}$/;

    if (!patron.test(document.getElementById("contraseña").value || contraseña.length < 8)) {

        alert("La contraseña tiene que tener 4 letras minusculas, 4 numeros");
        document.getElementById("contraseña").focus();
        document.getElementById("contraseña").className = "error";

        return false

    }

    //Si no hay error el borde del campo se pone en verde
    document.getElementById("contraseña").style.border = "1px solid green";

    this.submit();

    iniciar();
}


//Peticion asincrona al iniciar sesion
function iniciar() {

    miXHR = new objetoXHR();

    cargarAsync();

}

function cargarAsync(parametros) {


    if (miXHR) {

        document.getElementById("indicador").innerHTML = "<img src = './img/ajax-loader.gif' style = 'margin-top:1px; width:60px; margin-left:-90%;'>";

        miXHR.open('POST', "portada.php", true);

        miXHR.onreadystatechange = estadoPeticion;

        miXHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        miXHR.send(parametros);
    }

}


function estadoPeticion() {

    if (this.readyState == 4 && this.status == 200) {

        document.getElementById("indicador").innerHTML = "";

    }


}

